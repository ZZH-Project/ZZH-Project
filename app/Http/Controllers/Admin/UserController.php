<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //用户登录
    public function login(Request $request){
        if (!$request->session()->get('auser')) {
            return view('admin.login.adminLogin');
        } elseif ($request->session()->get('auser')) {
            return redirect('admin/index');
        }
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
            'username.between' => '用户名必须在:min到:max位之间',
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
    //退出登录
    public function logout(Request $request){
        $request->session()->forget('auser');
        return redirect('admin/login');
    }
    //后台主页
    public function index() {
        return view('admin.index.index');
    }
    //显示用户
    public function show() {
        $auser = new Auser();
        $data = $auser->paginate(2);
        return view("admin.user.userList", ['data' => $data]);
    }
    //添加用户表单页
    public function add(Request $request) {
        if ($request->isMethod("post")) {
            //获取数据
            $username = $request->input('username');
            $password = md5($request->input('password'));
            $email = $request->input('email');
            //将数据库存入
            $auser = new Auser();
            $auser->username = $username;
            $auser->password = $password;
            $auser->email = $email;
            $result = $auser->save();
            if ($result) {
                return redirect('admin/user/show');
            } else {
                return view('admin.user.userAdd');
            }
        } else if($request->isMethod("get")) {
            return view('admin.user.userAdd');
        }
    }
    //验证添加用户其他数据
    public function addCheck(Request $request) {
        //验证规则
        $roles = [
            'password' => 'required',
            'email' => 'required|email'
        ];
        //自定义的错误信息
        $msg = [
            'password.required' => '密码不能为空',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
    }
    //用户重复验证
    public function userCheck(Request $request){
        //验证规则
        $roles = [
            'username' => 'required|between:3,12',
        ];
        //自定义的错误信息
        $msg = [
            'username.required' => '用户名不能为空',
            'username.between' => '用户名必须在:min到:max位之间'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        //数据库验证
        $username = $_GET['username'];
        $query = Auser::where('username',$username)->get()->toArray();
        //判断是否匹配到
        if ($query == null) {
            return json_encode(['a' => 1]);
        } elseif ($query != null) {
            return json_encode(['a' => 2]);
        }
    }
    //用户删除
    public function del($id){
        //删除数据
        Auser::where('id',$id)->delete();
        return redirect("admin/user/show");
    }
    //用户修改
    public function edit(Request $request,$id,$page){
        //判断是提交修改还是显示修改页面
        if ($request->isMethod("post")) {
            //获取修改的数据
            $email = $request->input('email');
            //修改数据
            Auser::where('id',$id)->update(['email'=>$email]);
            return redirect("admin/user/show?page=$page");
        } else if ($request->isMethod("get")) {
            //获取修改用户的数据
            $data = Auser::where('id',$id)->get()->toArray()[0];
            return view('admin.user.userEdit',["data"=>$data,"page"=>$page]);
        }
    }
}
