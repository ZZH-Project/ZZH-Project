<?php

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

//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    //登录
    Route::get('login','UserController@login');
    //用户组
    Route::group(['prefix' => 'user'], function () {
        Route::get('show', 'UserController@show');
    });
});

//前台路由
Route::group(['prefix' => 'web', 'namespace' => 'Web'], function (){
    //登录
    Route::get('login','UserController@login');
    //注册
    Route::get('register','UserController@register');
    //忘记密码
    Route::get('forget','UserController@forgetPass');
    //注册处理
    Route::any('check','UserController@check');
});

