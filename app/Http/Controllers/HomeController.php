<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //query main categories
    public static function categoryList(){
        return Category::where('parent_id', 0)->with('child')->get();
    }

    public function index()
    {
        $categoryList=Category::all();
        //print_r($categoryList);
        //exit();
        return view('home.index',['categoryList' => $categoryList]);//call index page inside view>home
    }


    public function login(){ // return dashboard > login page
        return view('admin.login');
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

    public function logout(Request $request){


        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }


}
