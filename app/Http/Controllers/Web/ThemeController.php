<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    //专题主页
    public function index(){
        return view('web.theme.index');
    }
    //专题分类列表
    public function list(){
        return view('web.theme.list');
    }
    //专题详情
    public function details(){
        return view('web.theme.details');
    }
    //专题评论
    public function comment(){
        return view('web.theme.comment');
    }
}
