<?php

namespace App\Http\Controllers\web;

use App\Models\ThemeCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    //专题主页
    public function index(){
        //查询前5条专题分类
        $data = ThemeCate::orderBy('sort_id','asc')->limit(5)->get();
        return view('web.theme.index', ['data' => $data]);
    }
    //专题分类列表
    public function show(){
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
