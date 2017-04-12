<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChatController extends Controller
{
    //微圈主页
    public function index(){
        return view('web.wechat.index');
    }
    //微圈列表页
    public function list(){
        return view('web.wechat.list');
    }
    //微圈详情
    public function details(){
        return view('web.wechat.details');
    }
    //微圈评论
    public function comment(){
        return view('web.wechat.comment');
    }
    //加入微圈
    public function add(){
        return view('web.wechat.add');
    }
}
