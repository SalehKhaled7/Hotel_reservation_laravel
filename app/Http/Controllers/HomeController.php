<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        return view('home.index');//call index page inside view>home
    }

    public function test($id){

        echo "the id is :",$id;

    }
}
