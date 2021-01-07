<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function getSetting(){
        return Setting::first();
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
        return view('home.about_us');
    }

    public function references(){
       //
    }

    public function faq(){
        //
    }

    public function contact(){
        //
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
