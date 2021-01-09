<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FrontSetting;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        //$setting=Setting::first();
        //print_r($setting);
        //exit();

        return view('home.index');//call index page inside view>home
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
        return view('home.faq',['setting'=>$setting]);
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
