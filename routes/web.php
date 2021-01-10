<?php

use App\Http\Controllers\Admin\FrontSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//site routes
Route::get('/',[HomeController::class,'index'])->name('home'); // call index function inside homeController
Route::get('home',[HomeController::class,'index'])->name('homepage');
Route::get('/about_us',[HomeController::class,'about_us'])->name('about_us');
Route::get('/references',[HomeController::class,'references'])->name('references');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/contact/send_message',[HomeController::class,'send_message'])->name('send_message');
Route::get('hotels',[HomeController::class,'hotels'])->name('hotel_list');
Route::get('hotel/{id}/rooms',[HomeController::class,'rooms'])->name('room_list');
Route::get('hotel/{hotel_id}/room/{room_id}',[HomeController::class,'rooms_detail'])->name('room_detail');
Route::get('category/{category_id}/hotels',[HomeController::class,'get_hotels_via_category'])->name('get_hotels_via_category');
Route::post('hotel/find',[HomeController::class,'find_hotel'])->name('find_hotel');




//admin routes
Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('/',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin'); // dashboard , middleware: the page can't be reached unless the user is auth

    //category routes
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin_category');
    Route::get('category/add',[App\Http\Controllers\Admin\CategoryController::class,'add'])->name('admin_category_add');
    Route::post('category/create',[App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin_category_create');
    Route::get('category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin_category_edit');
    Route::post('category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin_category_update');
    Route::get('category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::get('category/show',[App\Http\Controllers\Admin\CategoryController::class,'show'])->name('admin_category_show');

    //Hotel routes
    Route::prefix('hotel')->group(function (){

        Route::get('/',[App\Http\Controllers\Admin\HotelController::class,'index'])->name('hotels');
        Route::get('create',[App\Http\Controllers\Admin\HotelController::class,'create'])->name('admin_hotel_add');
        Route::post('store',[App\Http\Controllers\Admin\HotelController::class,'store'])->name('admin_hotel_store');
        Route::get('edit/{id}',[App\Http\Controllers\Admin\HotelController::class,'edit'])->name('admin_hotel_edit');
        Route::post('update/{id}',[App\Http\Controllers\Admin\HotelController::class,'update'])->name('admin_hotel_update');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\HotelController::class,'destroy'])->name('admin_hotel_delete');
        Route::get('show',[App\Http\Controllers\Admin\HotelController::class,'show'])->name('admin_hotel_show');

        //room routes
        Route::prefix('{hotel_id}/room')->group(function (){

            Route::get('/',[App\Http\Controllers\Admin\RoomController::class,'index'])->name('rooms');
            Route::get('create',[App\Http\Controllers\Admin\RoomController::class,'create'])->name('admin_room_add');
            Route::post('store',[App\Http\Controllers\Admin\RoomController::class,'store'])->name('admin_room_store');
            Route::get('edit/{id}',[App\Http\Controllers\Admin\RoomController::class,'edit'])->name('admin_room_edit');
            Route::post('update/{id}',[App\Http\Controllers\Admin\RoomController::class,'update'])->name('admin_room_update');
            Route::get('delete/{id}',[App\Http\Controllers\Admin\RoomController::class,'destroy'])->name('admin_room_delete');
            Route::get('show',[App\Http\Controllers\Admin\RoomController::class,'show'])->name('admin_room_show');


            //room images routes
            Route::prefix('{room_id}/images')->group(function () {

                Route::get('/', [App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
                Route::post('store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
                Route::get('delete/{id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
                Route::get('show', [App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
            });

        });

    });



    //setting routes
    Route::prefix('setting')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
        Route::get('update', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');
    });

    //Front setting routes
    Route::prefix('front_setting')->group(function () {

        Route::get('/', [FrontSettingController::class, 'index'])->name('admin_front_setting');
        Route::post('update/{id}', [FrontSettingController::class, 'update'])->name('admin_front_setting_update');
    });

    //message routes
    Route::prefix('messages')->group(function (){

        Route::get('/',[MessageController::class,'index'])->name('messages');
        Route::get('edit/{id}',[MessageController::class,'edit'])->name('admin_message_edit');
        Route::post('update/{id}',[MessageController::class,'update'])->name('admin_message_update');
        Route::get('delete/{id}',[MessageController::class,'destroy'])->name('admin_message_delete');
        Route::get('show',[MessageController::class,'show'])->name('admin_messages_show');
    });


});

Route::middleware('auth')->prefix('_user')->namespace('_user')->group(function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');

});
Route::get('login',[HomeController::class,'user_login'])->name('user_login'); // login
Route::post('loginAuth',[HomeController::class,'user_loginAuth'])->name('user_loginAuth'); // login auth , use post for data sending

Route::get('/admin/login',[HomeController::class,'login'])->name('admin_login'); // login
Route::post('/admin/loginAuth',[HomeController::class,'loginAuth'])->name('admin_loginAuth'); // login auth , use post for data sending
Route::get('logout',[HomeController::class,'logout'])->name('logout'); // logout
