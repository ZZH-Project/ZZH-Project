<?php

namespace App\Http\Controllers\Web;

use App\Models\RTResule;
use App\Models\Wuser;
use App\Tool\SMS\SendTemplateSMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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

    //注册手机发送验证码
    public function regsendSMS(Request $request){
        $rt_mess = new RTResule();
        //实例化返回信息类
        $phone = $request->phone;
        //验证手机号格式
        //判断手机号是否是为空
//        var_dump($phone);die;
        if (!preg_match('/^1[34578]\d{9}$/',$phone)) {
            $rt_mess->status = 1;
            $rt_mess->message = '手机号格式不正确';
            return $rt_mess->toJson();
        }
        $sms = new SendTemplateSMS();
        //定义随机因子
        $str = '1234567890abcdefghijklmnopqrstuvwxyz';
        //随机得到随机因子
        $code = '';
        //获取长度
        $len = strlen($str);
//        var_dump($len);
        for ($i = 0; $i < 4; $i++){
            //取出字符串的随机下标
            $code .= $str{mt_rand(0,$len-1)};
        }
//        dd($code);
        //发送短信验证
        $sms->sendTemplateSMS($phone,array($code,5),1);
//        echo 1111;die;
        //将验证码存到数据库
        $res = Wuser::insert([
                'username'=>$phone,
                'captcha'=>$code,
                'deadline'=>5*60+time(),
                'password'=>md5('132165465498416546asdfasdf'),
            ]);
//        var_dump($res);
        $rt_mess->status = 0;
        $rt_mess->message = '发送成功';
        return $rt_mess->toJson();
    }

    //前台注册验证
    public function regcheck(Request $request){
        $phone = $request->username;
        $captcha = $request->captcha;
        $password = $request->password;
        //如果手机号与验证码不匹配
        $res = Wuser::where('captcha',$captcha)
            ->where('username',$phone)
            ->get()->toArray();
//        var_dump($res);
        //如果手机号与验证码不匹配
        if(!$res){
            return json_encode(['e'=> 0]);
        }
        $dead = $res[0]['deadline'];
        //如果验证码超过5分钟需要重新发送验证码
        if(time()>$dead){
            return json_encode(['a'=> 1]);
        }else{
            $res = Wuser::where('captcha',$captcha)
                ->where('username',$phone)
                ->update(['password'=>md5($password)]);
            return json_encode(['a'=> 0]);
        }
        //===============验证规则=============
//        $roles = [
//            'username' => 'required|between:6,12|alpha_dash',
//            'password' => 'required|between:6,12|alpha_dash',
//            'captcha' => 'required|captcha',
//        ];
//        //自定义的错误信息
//        $msg = [
//            'required' => '* :Attribute不能为空',
//            'between' => '* :Attribute必须在:min和:max之间',
//            'captcha' => '* 验证码不正确',
//            'alpha_dash' => '* :Attribute必须是字母数字下划线'
//        ];
//        //验证数据
//        $this->validate($request,$roles,$msg);
//        $username = $request->username;
//        $password = $request->password;
//        $captcha = $request->captcha;
////        var_dump($username,$password,$captcha);
//        $wuser = new Wuser();
//        $wuser->username = $username;
//        $wuser->password = md5($password);
//        $result = $wuser::where('username',$username)->get()->toArray();
//        //如果用户名存在
//        if($result){
//            return json_encode(['a' => 1]);
//        }else{
//            $res = $wuser->save();
//            return json_encode(['a'=>2]);
//        }
//        var_dump($result);
    }

    //前台登录处理
    public function logincheck(Request $request){
        //验证规则
        $roles = [
            'username' => 'required|digits_between:11,11',
            'password' => 'required|between:6,12|alpha_dash',
            'captcha' => 'required|captcha',
        ];
        //自定义的错误信息
        $msg = [
            'required' => '* :Attribute不能为空',
            'digits_between'=>'* :Attribute必须是数字并且在:min和:max之间',
            'between' => '* :Attribute必须在:min和:max之间',
            'captcha' => '* 验证码不正确',
            'alpha_dash' => '* :Attribute必须是字母数字下划线'
        ];
        //验证数据
        $this->validate($request,$roles,$msg);
        $username = $request->username;
        $password = $request->password;
        $captcha = $request->captcha;
        $is_save = $request->is_save;
        $session = session('weblogin');
        $Cache = Cache::get('username');
//        var_dump($Cache);die;
        var_dump($session);
//        var_dump($username,$password,$captcha,$is_save);die();
        //实例化前台用木模型对象
        $wuser = new Wuser();
        $result = $wuser::where('username',$username)
                ->where('password',md5($password))
                ->get()
                ->toArray();
//        var_dump($result);
        //如果账号密码正确返回1
        if($result){
            //如果多选框选中
            if($is_save == 1){
                //将用户存进缓存中
                Cache::forever('savewuser',['username'=>$username,'password'=>$password]);
                session(['weblogin' => 1]);
            //否则清除缓存
            }else{
                Cache::forget('savewuser');
                session(['weblogin' => 1]);
            }
            return json_encode(['a'=>1]);
        //如果账号密码不正确返回2
        }else{
            return json_encode(['a'=>2]);
        }
    }


    //忘记密码手机发送验证码
    public function sendSMS(Request $request){
        $rt_mess = new RTResule();
        //实例化返回信息类
        $phone = $request->phone;
        //验证手机号格式
        //判断手机号是否是为空
//        var_dump($phone);die;
        if (!preg_match('/^1[34578]\d{9}$/',$phone)) {
            $rt_mess->status = 1;
            $rt_mess->message = '手机号格式不正确';
            return $rt_mess->toJson();
        }
        $sms = new SendTemplateSMS();
        //定义随机因子
        $str = '1234567890abcdefghijklmnopqrstuvwxyz';
        //随机得到随机因子
        $code = '';
        //获取长度
        $len = strlen($str);
//        var_dump($len);
        for ($i = 0; $i < 4; $i++){
            //取出字符串的随机下标
            $code .= $str{mt_rand(0,$len-1)};
        }
//        dd($code);
        //发送短信验证
        $sms->sendTemplateSMS($phone,array($code,5),1);
//        echo 1111;die;
       //将验证码存到数据库
        $res = Wuser::where('username',$phone)
            ->update([
//            'username'=>$phone,
            'captcha'=>$code,
            'deadline'=>5*60+time(),
            'password'=>md5('132165465498416546asdfasdf'),
        ]);
//        var_dump($res);
        $rt_mess->status = 0;
        $rt_mess->message = '发送成功';
        return $rt_mess->toJson();
    }

    //重置密码
    public function resetpass(Request $request){
        $phone = $request->username;
        $captcha = $request->captcha;
        $password = $request->password;
//        var_dump($phone);
        $res = Wuser::where('captcha',$captcha)
                    ->where('username',$phone)
                    ->get()->toArray();
        //如果没找到验证码不正确
        if(!$res){
            return json_encode(['e'=> 0]);
        }
        $dead = $res[0]['deadline'];
        //如果验证码超过5分钟需要重新发送验证码
        if(time()>$dead){
            return json_encode(['a'=> 1]);
        }else{
            $res = Wuser::where('captcha',$captcha)
                        ->where('username',$phone)
                        ->update(['password'=>md5($password)]);
            return json_encode(['a'=> 0]);
        }
    }
}
