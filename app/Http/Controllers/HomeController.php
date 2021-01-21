<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\FrontSetting;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\Message;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use function Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public static function getSetting(){
        return Setting::first();
    }
    public static function getFrontSetting(){
        return FrontSetting::first();
    }
    //query main categories
    public static function categoryList(){
        return Category::where('parent_id', 0)->with('child')->get();
    }
    public static function get_all_hotel_category_id(){
        $ids=Hotel::select('category_id')->distinct()->get()->toArray();
        return $ids;
    }
    public static function get_review_avg($id){
        return Review::where('hotel_id',$id)->average('rate');
    }
    public static function get_min_room_price($id){
        return Room::where('hotel_id',$id)->min('price');

    }

    public static function stay_nights( string $in,string $out){

        $date1 = new DateTime($in);
        $date2 = new DateTime($out);
        // this calculates the diff between two dates, which is the number of nights
        $numberOfNights= $date2->diff($date1)->format("%a");
        return $numberOfNights;
    }

    public function index()
    {

        $hotels_slider=Hotel::select('id','title','image','star')->limit(3)->inRandomOrder()->get();
        $hotels_list1=Hotel::select('id','title','image','star')->limit(6)->inRandomOrder()->get();
        $hotels_list2=Hotel::select('id','title','image','star')->limit(6)->inRandomOrder()->get();
        $home_reviews=Review::select('id','review','user_id','hotel_id',)->with('hotel')->limit(2)->inRandomOrder()->get();
        $cities = Hotel::select('city')->distinct()->get();

//        print_r($our_best);
//        exit();
        $data=[
            'hotel_list'=>$hotels_list1,
            'hotel_list2'=>$hotels_list2,
            'hotels_slider'=>$hotels_slider,
            'home_reviews'=>$home_reviews,
            'cities'=>$cities,
        ];

        return view('home.index',$data);//call index page inside view>home
    }
    public function about_us(){
        $setting=Setting::first();
        return view('home.about_us',['setting'=>$setting]);
    }

    public function references(){
        $setting=Setting::first();
        return view('home.references',['setting'=>$setting]);
    }

    public function faq(){
        $setting=Setting::first();
        $faqs = Faq::all()->where('status','true')->sortBy('position');
        $data=[
            'faqs'=>$faqs,
            'setting'=>$setting,
        ];
        return view('home.faq',$data);
    }

    public function contact(){
        $setting=Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }

    public function send_message(Request $request){
        $data=new Message;
        $data->name =$request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->ip=$request->ip();
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->save();
        return back()->with('success','Message send successfully . ');

    }

    public function hotels(){
        $hotel_list=Hotel::all()->where('status','true');
        $setting=Setting::first();
        $context = [
            'hotel_list'=>$hotel_list,
            'setting'=>$setting

        ];
        return view('home.hotels',$context);
    }
    public function rooms($id){
        $room_list=Room::all()->where('hotel_id',$id);
        $hotel=Hotel::with('category')->find($id);
        $reviews=Review::all()->where('hotel_id',$id);
        //print_r($room_list);
        //exit();
        $setting=Setting::first();
        $context = [
            'room_list'=>$room_list,
            'setting'=>$setting,
            'hotel'=>$hotel,
            'reviews'=>$reviews

        ];
        return view('home.rooms',$context);
    }

    public function rooms_detail($hotel_id,$room_id){
        $image_list = Image::all()->where('room_id',$room_id);
        $room=Room::find($room_id);
        $hotel=Hotel::find($hotel_id);
        $setting=Setting::first();
        $reservations = Reservation::where('room_id',$room_id)->get();
        $arr=[];
        foreach ($reservations as $res){
            $begin = new DateTime($res->check_in);
            $end = new DateTime($res->check_out);

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                array_push($arr,$dt->format("Y-m-d"));
            }
        }



        $context = [
            'room'=>$room,
            'setting'=>$setting,
            'hotel'=>$hotel,
            'image_list'=>$image_list,
            'arr'=>$arr

        ];
        return view('home.room_detail',$context);
    }

    public function get_hotels_via_category($category_id){
        $hotel_list=Hotel::all()->where('category_id',$category_id);
        $setting=Setting::first();
        $category=Category::find($category_id);
        $context=[
            'hotel_list'=>$hotel_list,
            'setting'=>$setting,
            'category'=>$category,
        ];
        return view('home.hotel_list',$context);

    }

    public function find_hotel(Request $request){
        $city =$request->input('city');

        $data_in= $request->input('check_in');
        $year_in =substr($data_in,6,4);
        $day_in =substr($data_in,3,2);
        $month_in =substr($data_in,0,2);
        $check_in =$year_in.'-'.$month_in.'-'.$day_in;

        $data_out= $request->input('check_out');
        $year_out =substr($data_out,6,4);
        $day_out =substr($data_out,3,2);
        $month_out=substr($data_out,0,2);
        $check_out =$year_out.'-'.$month_out.'-'.$day_out;
        $people= $request->input('people');
        $hotel_list = Hotel::with('rooms')->where('city',$city)->get();
        $rooms = Room::whereNotIn('id', function($query) use ($check_in, $check_out) {
            $query->from('reservations')
                ->select('room_id')->where(function ($q) use ($check_out, $check_in) {
                    $q->where('check_in', '<', $check_in)
                        ->where('check_out', '>', $check_out);
                })->orWhere(function ($p) use ($check_out, $check_in) {
                    $p->where('check_in', '>=', $check_in)
                        ->where('check_out', '<=', $check_out);
                })->orWhere(function ($d) use ($check_out) {
                    $d->where('check_in', '<', $check_out)
                        ->where('check_out', '>', $check_out);
                })->orWhere(function ($s) use ( $check_in) {
                    $s->where('check_in', '<', $check_in)
                        ->where('check_out', '>', $check_in);
                });

        })->get();
        //$available_rooms=Hotel::with('rooms')->where('city',$city)->room;
       // print_r($check_in);
       //exit();
        //dd($rooms);
        $setting=Setting::first();
        $data = [
            'setting'=>$setting,
            'hotel_list'=>$hotel_list,
            'rooms'=>$rooms,
        ];
        return view('home.rooms_search',$data);
    }

    public function add_review(Request $request , $id){
        $data=new Review;
        $data->user_id =Auth::id();
        $data->hotel_id = $id;
        $data->rate = 5;
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->ip=$request->ip();
        $data->save();
        return back()->with('success','Message send successfully . ');

    }

    public function add_reservation(Request $request ,$hotel_id, $room_id){
        $data=new Reservation;
        $data->user_id =Auth::id();
        $data->room_id = $room_id;
        $data->hotel_id = $hotel_id;

        $check_in_out =$request->input('check_in_out');
        #check in
        $year_in =substr($check_in_out,6,4);
        $month_in =substr($check_in_out,3,2);
        $day_in =substr($check_in_out,0,2);
        $data->check_in = $year_in.'-'.$month_in.'-'.$day_in;
        $in = $year_in.'-'.$month_in.'-'.$day_in;

        #check out
        $year_out =substr($check_in_out,19,4);
        $month_out =substr($check_in_out,16,2);
        $day_out =substr($check_in_out,13,2);
        $data->check_out = $year_out.'-'.$month_out.'-'.$day_out;
        $out = $year_out.'-'.$month_out.'-'.$day_out;


        $data->adult = $request->input('adult');
        $data->child = $request->input('child');
        $data->save();
        return back()->with('success','Reservation done successfully . ');

    }



    #admin login
    public function login(){ // return dashboard > login page
        return view('admin.login');
    }

    public function register(){ // return dashboard > login page
        return view('admin.register');
    }
    public function register_create(Request $request)
    {
        $data = new User;
        $data->name =$request->input('name');
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        $data ->save();
        return redirect(route('admin_login'))->with('success',' Registration done successfully . ');

    }
    #user login
    public function user_login(){ // return dashboard > login page
        return view('home.user.user_login');
    }
    public function user_register(){ // return dashboard > login page
        return view('home.user.user_register');
    }
    public function user_register_create(Request $request)
    {
        $data = new User;
        $data->name =$request->input('name');
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        $data ->save();
        return redirect(route('user_login'))->with('success',' Registration done successfully . ');

    }
    public function user_logout(Request $request){


        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }



    public function loginAuth(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else{
            return view('admin.login');
        }

    }
    public function user_loginAuth(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else{
            return view('home.user.user_login');
        }

    }

    public function logout(Request $request){


        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }


}
