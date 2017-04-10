<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    //个人中心主页
    public function index(){
        return view('web.userCenter.index');
    }
    //个人信息展示
    public function info(){
        return view('web.userCenter.info');
    }
    //个人信息修改
    public function infoEdit(){
        return view('web.userCenter.infoEdit');
    }
    //个人头像修改
    public function imgEdit(){
        return view('web.userCenter.imgEdit');
    }
    //密码修改
    public function passEdit(){
        return view('web.userCenter.passEdit');
    }
    //密码修改
    public function passEdit(){
        return view('web.userCenter.favTheme');
    }
}
