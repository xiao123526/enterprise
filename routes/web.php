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
    //导航栏执行添加
    Route::any('/bannerDo','BannerController@bannerDo');
    //导航栏列表展示
    Route::any('/bannerShow','BannerController@bannerShow');
    //删除导航栏
    Route::any('/bannerDel','BannerController@bannerDel');
    //展示修改的执行
    Route::any('/bannerUp/{id}','BannerController@bannerUp');
    //修改执行
    Route::any('/bannerEditDo','BannerController@EditDo');
});
