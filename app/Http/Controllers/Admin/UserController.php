<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auser;
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
        //验证规则
        $roles = [
            'username' => 'required|between:3,12',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ];
        //自定义的错误信息
        $msg = [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'captcha.required' => '验证码不能为空',
            'username.between' => '用户名必须在:min和:max之间',
            'captcha' => '验证码不正确',
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        //数据库验证
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $auser = new Auser();
        $query = $auser->where([
            ['username',$username],
            ['password',$password],
        ])->get()->toArray();
        //判断是否匹配到
        if ($query == null) {
            return json_encode(['a' => 1]);
        } elseif ($query != null) {
            $auser = $query[0];
            //匹配到数据，存入session
            $request->session()->put('auser',$auser);
            return json_encode(['a' => 2]);
        }
    }
    //登录成功
    public function go(){
        return redirect('admin/index');
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
