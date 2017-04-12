<?php

namespace App\Http\Controllers\web;

use App\Models\NavCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //网站主页
    public function index(){

        //查询前5条微圈分类
        $data = NavCate::orderBy('sort_id','asc')->limit(5)->get();
        return view('web.index', ['data' => $data]);
    }
}
