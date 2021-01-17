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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function index()
    {
        $hotels_list1=Hotel::select('id','title','image','star')->limit(6)->inRandomOrder()->get();
        $hotels_list2=Hotel::select('id','title','image','star')->limit(6)->inRandomOrder()->get();
        $cities = Hotel::select('city')->distinct()->get();

        //print_r(count($cities));
        //exit();
        $data=[
            'hotel_list'=>$hotels_list1,
            'hotel_list2'=>$hotels_list2,
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
        $context = [
            'room'=>$room,
            'setting'=>$setting,
            'hotel'=>$hotel,
            'image_list'=>$image_list

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
        $check_in= $request->input('check_in');
        $check_out= $request->input('check_out');
        $people= $request->input('people');

        $available_hotels=Hotel::where('city',$city)->get();
        $setting=Setting::first();
        $data = [
            'hotel_list'=>$available_hotels,
            'setting'=>$setting,
        ];
        return view('home.hotels',$data);
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

        $check_in =$request->input('check_in');
        $month =substr($check_in,0,2);
        $day =substr($check_in,3,2);
        $year =substr($check_in,6,4);

        $data->check_in = $year.'-'.$month.'-'.$day;

        $check_out = $request->input('check_out');
        $month =substr($check_out,0,2);
        $day =substr($check_out,3,2);
        $year =substr($check_out,6,4);

        $data->check_out = $year.'-'.$month.'-'.$day;

        $data->adult = $request->input('adult');
        $data->child = $request->input('child');
        $data->save();
        return back()->with('success','Reservation done successfully . ');

    }


    public function login(){ // return dashboard > login page
        return view('admin.login');
    }
    public function user_login(){ // return dashboard > login page
        return view('home.user.user_login');
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
        return redirect('/');
    }


}
