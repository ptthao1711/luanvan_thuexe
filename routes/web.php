<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/news', function () {
    return view('pages.news');
});

// Sửa đường dẫn trang chủ mặc định

Route::get('/user',[UserController::class,'index']);
Route::get('/home',[UserController::class,'trangchu']);
Route::post('/user_home',[UserController::class,'_trangchu']);
Route::post('/user',[UserController::class,'logout']);
//Route::post('/user',[UserController::class,'ebutton']);
////frontend
// Route::get('/','Homecontroller@index');
// Route::get('/trangchu','Homecontroller@index');

////backend
//Route::get('/user','UserController@index');
//Route::get('/home','UserController@trangchu');
//category
Route::get('/home', [CategoryController::class,'viewCategories']);
Route::get('/news', [CategoryController::class,'AllCategory']);
//Route::get('/header', [LikeController::class,'getlike']);
Route::get('/news', [LikeController::class,'getlike']);