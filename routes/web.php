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
    //登录验证
    Route::post('check','UserController@check');
    //登录成功
    Route::get('go','UserController@go');
    //退出登录
    Route::get('logout','UserController@logout');
    //需要验证登录才能显示的页面
    Route::group(['middleware' => 'adminLogin'], function () {
        //后台首页
        Route::get('index','IndexController@index');
        //用户组
        Route::group(['prefix' => 'user'], function () {
            //用户显示
            Route::get('show', 'UserController@show');
            //用户搜索
            Route::get('find', 'UserController@find');
            //添加用户
            Route::any('add', 'UserController@add');
            //添加用户验证，修改用户验证也用这个
            Route::get('addCheck', 'UserController@addCheck');
            //添加用户时用户名重复检测
            Route::get('userCheck', 'UserController@userCheck');
            //删除用户
            Route::get('del/{id}', 'UserController@del');
            //修改用户
            Route::any('edit/{id}/{page}', 'UserController@edit');
        });
        //评论组
        Route::group(['prefix'=>'comment'],function (){
        //评论显示
        Route::get('show','CommentController@show');
        });

    });
});

//前台路由
Route::group(['prefix' => 'web', 'namespace' => 'Web'], function (){
    //==============用户组===================
    Route::group(['prefix'=>'user'],function(){
        //登录
        Route::get('login','UserController@login');
        //注册
        Route::get('register','UserController@register');
        //忘记密码
        Route::get('forget','UserController@forgetPass');
        //注册发送信息
        Route::any('regsendSMS','UserController@regsendSMS');
        //注册验证
        Route::any('regcheck','UserController@regcheck');
        //登录验证
        Route::any('logincheck','UserController@logincheck');
        //忘记密码发送信息
        Route::get('sendSMS','UserController@sendSMS');
        //忘记密码-》重置密码
        Route::any('resetpass','UserController@resetpass');
        //==需要登录的路由,中间件分组==
        Route::group(['middleware'=>'webLogin'],function(){
        });

    });
});

