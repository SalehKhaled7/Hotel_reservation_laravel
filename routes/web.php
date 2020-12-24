<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home2', function () {
    return view('welcome');
})->name("login");

//call the page directly without controller
Route::get('/', function () {
    return view('home.index');
})->name("home");

Route::get('/home',[HomeController::class,'index']); // call index function inside homeController

Route::get('/test/{id}',[HomeController::class,'test'])->where('id','[0-9]+')->name("test"); // get id from url to the function

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//admin routes
Route::get('/admin',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin')->middleware('auth'); // dashboard , middleware: the page can't be reached unless the user is auth

Route::get('/admin/login',[HomeController::class,'login'])->name('admin_login'); // login
Route::post('/admin/loginAuth',[HomeController::class,'loginAuth'])->name('admin_loginAuth'); // login check , use post for data sending
Route::get('/admin/logout',[HomeController::class,'logout'])->name('admin_logout'); // logout
