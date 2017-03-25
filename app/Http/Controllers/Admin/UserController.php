<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //用户登录
    public function login(){
        return view('admin.login.adminLogin');
    }
    //用户登录验证
    public function check(Request $request){
        dd($request);
        //return redirect('admin/user/show');
    }
    //后台主页
    public function index() {
        return view('admin.index.index');
    }
    //显示用户
    public function show() {
        return view('admin.user.userList');
    }
}
