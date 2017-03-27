<?php

namespace App\Http\Controllers\Web;

use App\Models\Wuser;
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
    //前台注册处理
    public function check(Request $request){
        //验证规则
        $roles = [
            'username' => 'required|between:6,12|alpha_dash',
            'password' => 'required|between:6,12|alpha_dash',
            'captcha' => 'required|captcha',
        ];
        //自定义的错误信息
        $msg = [
            'required' => '* :Attribute不能为空',
            'between' => '* :Attribute必须在:min和:max之间',
            'captcha' => '* 验证码不正确',
            'alpha_dash' => '* :Attribute必须是字母数字下划线'
        ];
        //验证数据
        $this->validate($request,$roles,$msg);
        $username = $request->username;
        $password = $request->password;
        $captcha = $request->captcha;
//        var_dump($username,$password,$captcha);
        $wuser = new Wuser();
        $wuser->username = $username;
        $wuser->password = md5($password);
        $result = $wuser::select('username')->get()->toArray();
        //如果用户名存在
        if($result){
            return json_encode(['a' => 1]);
        }else{
            $res = $wuser->save();
            return json_encode(['a'=>2]);
        }
//        var_dump($result);
    }
}
