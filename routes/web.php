<?php

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

Route::get('/', function () {
    return view('welcome');
});
//后台
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
     //后台首页
    Route::any('/index','IndexController@index');
    //导航栏添加视图
    Route::any('/banner','BannerController@banner');
});
