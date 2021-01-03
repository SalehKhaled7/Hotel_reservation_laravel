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


            //image routes
            Route::prefix('{room_id}/images')->group(function () {

                Route::get('/', [App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
                Route::post('store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
                Route::get('delete/{id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
                Route::get('show', [App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
            });

        });

    });

});

Route::get('/admin/login',[HomeController::class,'login'])->name('admin_login'); // login
Route::post('/admin/loginAuth',[HomeController::class,'loginAuth'])->name('admin_loginAuth'); // login auth , use post for data sending
Route::get('/admin/logout',[HomeController::class,'logout'])->name('admin_logout'); // logout
