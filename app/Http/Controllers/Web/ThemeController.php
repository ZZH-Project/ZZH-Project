<?php

namespace App\Http\Controllers\web;

use App\Models\ThemeCate;
use App\Models\ThemeList;
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
        //查询前5条专题分类
        $data = ThemeCate::orderBy('sort_id','asc')->limit(5)->get();
        //获取分类ID
        $cate_id = $_GET['id'];
        //查询此分类下的专题
        $list = ThemeList::where('cate_id',$cate_id)->where('is_show',1)->get();
        //获取当前分类
        $cate = ThemeCate::where('id',$cate_id)->get()[0];
        return view('web.theme.list', ['data' => $data,'list' => $list,'cate' => $cate]);
    }
    //专题详情
    public function details(){
        //获取分类ID
        $cate_id = $_GET['cate_id'];
        //获取当前分类
        $cate = ThemeCate::where('id',$cate_id)->get()[0];
        //获取专题ID
        $id = $_GET['id'];
        //获取专题信息
        $list = ThemeList::where('id',$id)->where('cate_id',$cate_id)->where('is_show',1)->get()[0];
        return view('web.theme.details', ['cate' => $cate,'list' => $list]);
    }
    //专题评论
    public function comment(){
        return view('web.theme.comment');
    }
}
