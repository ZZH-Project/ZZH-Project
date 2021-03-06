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
    Route::group(['middleware' => ['adminLogin','rbac']], function () {
        //后台首页
        Route::get('index','IndexController@index');
        //后台实时消息
        Route::get('info', 'IndexController@info');
        //发送实时消息
        Route::get('send', 'IndexController@send');
        //图表数据
        Route::get('data', 'IndexController@data');
        //用户组
        Route::group(['prefix' => 'user'], function () {
            //用户显示
            Route::get('show', 'UserController@show');
            //用户搜索
            Route::any('find', 'UserController@find');
            //添加用户
            Route::any('add', 'UserController@add');
            //添加用户验证，修改用户验证也用这个
            Route::get('addCheck', 'UserController@addCheck');
            //添加用户时用户名重复检测
            Route::get('userCheck', 'UserController@userCheck');
            //删除用户
            Route::get('del/{id}', 'UserController@del');
            //修改用户
            Route::any('edit/{id}/{page}/{fv?}', 'UserController@edit');
        });
        //角色组
        Route::group(['prefix' => 'role'], function () {
            //显示角色
            Route::any('show', 'RoleController@show');
            //添加角色
            Route::any('add', 'RoleController@add');
            //修改角色
            Route::any('edit/{id}', 'RoleController@edit');
            //删除角色
            Route::get('del/{id}', 'RoleController@del');
            //验证不为空
            Route::get('check', 'RoleController@check');
            //角色重名验证
            Route::get('nameCheck/{id?}', 'RoleController@nameCheck');
        });
        //权限组
        Route::group(['prefix' => 'permission'], function () {
            //显示权限
            Route::any('show', 'PermissionController@show');
            //添加权限
            Route::any('add', 'PermissionController@add');
            //修改权限
            Route::any('edit/{id}', 'PermissionController@edit');
            //删除权限
            Route::get('del/{id}', 'PermissionController@del');
            //验证不为空
            Route::get('check', 'PermissionController@check');
            //路由重名验证
            Route::get('nameCheck/{id?}', 'PermissionController@nameCheck');
            //显示权限
            Route::get('is/{id}', 'PermissionController@is');
        });
        //专题分类组
        Route::group(['prefix' => 'themeCate'], function () {
            //显示专题分类
            Route::any('show', 'ThemeCateController@show');
            //添加专题分类
            Route::any('add', 'ThemeCateController@add');
            //删除专题分类
            Route::get('del/{id}', 'ThemeCateController@del');
            //修改专题分类
            Route::any('edit/{id}', 'ThemeCateController@edit');
            //不为空验证
            Route::get('check', 'ThemeCateController@check');
            //重名验证
            Route::get('nameCheck/{id?}', 'ThemeCateController@nameCheck');
        });
        //专题组
        Route::group(['prefix' => 'themeList'], function () {
            //显示专题
            Route::any('show', 'ThemeListController@show');
            //添加专题
            Route::any('add', 'ThemeListController@add');
            //删除专题
            Route::get('del/{id}', 'ThemeListController@del');
            //修改专题
            Route::any('edit/{id}', 'ThemeListController@edit');
            //是否显示专题
            Route::get('is/{id}', 'ThemeListController@is');
            //不为空验证
            Route::get('check', 'ThemeListController@check');
            //重名验证
            Route::get('nameCheck/{id?}', 'ThemeListController@nameCheck');
        });
        //专题评论组
        Route::group(['prefix' => 'themeComment'], function () {
            //显示专题评论
            Route::any('show', 'ThemeCommentController@show');
            //专题评论是否下线
            Route::get('is/{id}', 'ThemeCommentController@is');
        });
        //会员管理组
        Route::group(['prefix' => 'member'],function(){
            //显示会员列表
            Route::any('show','MemberController@show');
            //禁止会员登录
            Route::any('isLoad/{wuid}/{isload}','MemberController@isload');
        });
        //问答分类组
        Route::group(['prefix'=>'comment'],function (){
             //问答分类显示
            Route::get('show','CommentController@show');
            //添加问答分类
            Route::get('add','CommentController@add');
            //添加问答分类数据验证
            Route::any('commentCheck','CommentController@check');
            //问答分类搜索
            Route::any('find','CommentController@find');
            //修改问答分类
            Route::any('edit/{id}/{cate_name}/{page}/{fv?}','CommentController@edit');
            //修改问答分类验证
            Route::any('commentEdit','CommentController@commentEdit');
            //删除问答分类
            Route::get('del/{id}','CommentController@del');
        });
        //问答内容管理组
        Route::group(['prefix'=>'qa'],function (){
            //===============显示问答列表===============
            Route::get('show','QaController@show');
            //================查看问答详情================
            Route::get('showcontent/{qalistid?}','QaController@showcontent');
            //===============切换显示状态===============
            Route::get('switch/{id}/{status}','QaController@switchshow');
            //================搜索问题================
            Route::any('find','QaController@find');
        });
        //问答回复管理
        Route::group(['prefix'=>'qacomment'],function(){
            //==============显示回答列表==============
            Route::get('show','QaController@showcomment');
            //==============显示回复内容==============
            Route::get('showcomment/{qacommentid?}','QaController@showcomments');
            //===============切换显示状态===============
            Route::get('switch/{id}/{status}','QaController@switchshows');
            //================搜索回答================
            Route::any('find','QaController@finds');
        });
        //友情链接
        Route::group(['prefix'=>'friend'],function (){
            //友情链接列表
            Route::get('show','FriendController@show');
            //添加友情链接
            Route::get('add','FriendController@add');
            //验证友情链接添加
            Route::any('check','FriendController@check');
            //修改友情链接
            Route::any('edit/{id?}','FriendController@edit');
            //修改友情链接
            Route::any('checkedit','FriendController@checkedit');
            //删除友情链接
            Route::any('del/{id?}','FriendController@del');

        });
        //微圈分类列表
        Route::group(['prefix' => 'wechatCate'], function () {
            //显示微圈分类
            Route::any('show', 'WechatCateController@show');
            //添加微圈分类
            Route::any('add', 'WechatCateController@add');
            //删除微圈分类
            Route::get('del/{id}', 'WechatCateController@del');
            //修改微圈分类
            Route::any('edit/{id}', 'WechatCateController@edit');
            //不为空验证
            Route::get('check', 'WechatCateController@check');
            //重名验证
            Route::get('nameCheck/{id?}', 'WechatCateController@nameCheck');
        });

        //微圈内容列表
        Route::group(['prefix' => 'wechatList'], function () {
            //显示微圈内容列表
            Route::any('show', 'WechatListController@show');
            //删除微圈内容
            Route::get('del/{id}', 'WechatListController@del');
        });

        //微圈评论组
        Route::group(['prefix' => 'wechatComment'], function () {
            //显示微圈评论
            Route::any('show', 'WechatCommentController@show');
            //专题评论是否下线
            Route::get('is/{id}', 'WechatCommentController@is');
        });

        //意见反馈列表
        Route::group(['prefix' => 'feedback'], function () {
            //显示微圈内容列表
            Route::any('show', 'feedbackController@show');
            //删除微圈内容
            Route::get('del/{id}', 'feedbackController@del');
        });

        //网站导航列表
        Route::group(['prefix' => 'navCate'], function () {
            //显示微圈分类
            Route::any('show', 'NavCateController@show');
            //添加微圈分类
            Route::any('add', 'NavCateController@add');
            //删除微圈分类
            Route::get('del/{id}', 'NavCateController@del');
            //修改微圈分类
            Route::any('edit/{id}', 'NavCateController@edit');
            //不为空验证
            Route::get('check', 'NavCateController@check');
            //重名验证
            Route::get('nameCheck/{id?}', 'NavCateController@nameCheck');
        });

        //吐槽内容列表
        Route::group(['prefix' => 'discuss'], function () {
            //显示吐槽内容列表
            Route::any('show', 'DiscussController@show');
            //删除吐槽内容
            Route::get('del/{id}', 'DiscussController@del');
        });

        //广告内容列表
        Route::group(['prefix' => 'banner'], function () {
            //显示吐槽内容列表
            Route::any('show', 'BannerController@show');
            //删除吐槽内容
            Route::get('del/{id}', 'BannerController@del');
            //添加微圈分类
            Route::any('add', 'BannerController@add');
            //修改广告
            Route::any('edit/{id}', 'BannerController@edit');
        });

    });
});

//前台路由
Route::group(['prefix' => 'web', 'namespace' => 'Web'], function (){
    //==============主页===================
    Route::get('index','IndexController@index');

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
        //密码问题找回密码
        Route::any('question','UserController@question');
        //获取问题
        Route::any('getquestion','UserController@getquestion');
        //回答验证
        Route::any('answerval','UserController@answerval');
        //
    });

    //==============个人中心===================
    Route::group(['prefix'=>'center'],function(){
        //个人中心主页
        Route::get('index','CenterController@index');
        ///==需要登录的路由,中间件分组==
        Route::group(['middleware'=>'webLogin'],function(){
            //个人信息
            Route::get('info/{wuid?}','CenterController@info');
            //个人信息修改
            Route::get('infoEdit/{wuid?}','CenterController@infoEdit');
            //个人头像修改
            Route::get('imgEdit/{wuid?}','CenterController@imgEdit');
            //密码修改
            Route::get('passEdit','CenterController@passEdit');
            //我的收藏
            Route::get('favTheme','CenterController@favTheme');
            //个人信息修改验证
            Route::get('infoEditval','CenterController@infoEditval');
            //个人头像修改验证
            Route::any('imgEditval','CenterController@imgEditval');
            //修改密码验证
            Route::get('passEditval','CenterController@passEditval');
            //问答收藏
            Route::get('myfav','CenterController@myfav');
            //专题收藏
            Route::get('tmsc', 'CenterController@tmsc');
            //微圈收藏
            Route::get('wechatfav', 'CenterController@wechatfav');
            //退出登录
            Route::get('logout','CenterController@logout');
            //密保问题
            Route::any('qaforget/{uid?}','CenterController@qaforgetPass');
            //验证密保问题
            Route::any('checkqa','CenterController@checkqa');
            //我的问题
            Route::get('myquestion/{uid}','CenterController@myquestion');
        });
    });


    Route::group(['middleware'=>'webLogin'],function(){
        //==============意见反馈===================
        Route::group(['prefix'=>'center'],function(){
            //意见反馈
            Route::get('feedback','CenterController@feedback');
            //提交意见反馈
            Route::post('feedbackAdd','CenterController@feedbackAdd');
        });
    });

    //问答列表
    Route::get('qa/index/{catename?}','QaController@qaList');
//    ==需要登录的路由,中间件分组==
    Route::group(['middleware'=>'webLogin'],function(){
        //==============问答===================
        Route::group(['prefix'=>'qa'],function(){
            //问答提问
            Route::get('ask','QaController@qaAsk');
            //问答详情
            Route::any('details/{qalistid?}','QaController@qaDetails');
            //验证提问答内容
            Route::any('check','QaController@check');
            //验证回答内容
            Route::any('checkdetails','QaController@checkdetails');
            //验证子集回答内容
            Route::any('checkdetailsc','QaController@checkdetailsc');
            //问题主页点赞
            Route::any('goodadd','QaController@goodadd');
            //问题主页取消赞
            Route::any('goodmin','QaController@goodmin');
            //子回答点赞
            Route::any('cdgoodadd','QaController@cdgoodadd');
            //子回答取消赞
            Route::any('cdgoodmin','QaController@cdgoodmin');
            //问答收藏
            Route::any('collectadd','QaController@collectadd');
            //取消问答收藏
            Route::any('collectmin','QaController@collectmin');
        });

        //==============微圈===================
        Route::group(['prefix'=>'wechat'],function(){
            //加入微圈
            Route::any('add','WeChatController@add');
        });
    });
    //==============专题===================
    Route::group(['prefix'=>'theme'],function(){
        //专题主页
        Route::get('index','ThemeController@index');
        //专题分类列表
        Route::get('show','ThemeController@show');
        //专题详情
        Route::get('details','ThemeController@details');
        //专题评论
        Route::any('comment','ThemeController@comment');
        //提交评论
        Route::get('submit/{th_id}/{cate_id}', 'ThemeController@submit');
        //收藏专题
        Route::get('sc', 'ThemeController@sc');
    });


    //==============微圈===================

    Route::group(['prefix'=>'wechat'],function(){
        //微圈主页
        Route::get('index','WeChatController@index');
        //微圈分类列表
        Route::get('show','WeChatController@show');
        //微圈详情
        Route::any('details','WeChatController@details');
        //微圈评论
        Route::any('comment','WeChatController@comment');
        //提交评论
        Route::get('submit/{th_id}/{cate_id}', 'WeChatController@submit');
        //收藏专题
        Route::get('sc', 'WeChatController@sc');

    });

    Route::group(['middleware'=>'webLogin'],function(){
        //==============微圈===================
        Route::group(['prefix'=>'wechat'],function(){
            //加入微圈
            Route::get('add','WeChatController@add');
            //加入微圈
            Route::post('addData','WeChatController@addData');
        });
    });


    //==============吐槽===================

    Route::group(['prefix'=>'discuss'],function(){
        //吐槽主页
        Route::get('index','DiscussController@index');
    });

    Route::group(['middleware'=>'webLogin'],function(){
        //==============吐槽===================
        Route::group(['prefix'=>'discuss'],function(){
            //添加吐槽
            Route::get('add','DiscussController@add');
            //提交吐槽
            Route::post('addData','DiscussController@addData');
        });
    });

    //==============地图===================
    Route::get('map',function(){
        return view('web.map');
    });
});

