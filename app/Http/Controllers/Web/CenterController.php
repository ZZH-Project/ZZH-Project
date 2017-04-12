<?php

namespace App\Http\Controllers\web;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    //意见反馈
    public function feedback(){
        return view('web.userCenter.feedback');
    }
    //提交意见反馈
    public function feedbackAdd(Request $request){
        $user_id = $request->user_id;
        $title = $request->title;
        $content = $request->content;

        $res = Feedback::create([
            'user_id'=>$user_id,
            'title'=>$title,
            'content'=>$content,
        ]);

        return redirect('web/center/index');
    }

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
    //我的收藏
    public function favTheme(){
        return view('web.userCenter.favTheme');
    }
}
