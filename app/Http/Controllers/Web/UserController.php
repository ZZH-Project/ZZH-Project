<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //前台登录
    public function login(){
        return view('web.login.login');
    }
    //前台注册
    public function register(){
        return view('web.login.register');
    }
    //前台忘记密码
    public function forgetPass(){
        return view('web.login.forgetPass');
    }
}
