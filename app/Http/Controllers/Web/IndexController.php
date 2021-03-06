<?php

namespace App\Http\Controllers\web;


use App\Models\Banner;
use App\Models\NavCate;
use App\Models\ThemeCate;
use App\Models\ThemeComment;
use App\Models\ThemeList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //网站主页
    public function index(){
        //查询前5条网站导航分类
        $data = NavCate::orderBy('sort_id','asc')->limit(5)->get();
        //获取评论次数
        $count = ThemeComment::select(DB::raw('count(*) as num,th_id'))
            ->groupBy('th_id')
            ->get();
        //查询随机专题
        $list = ThemeList::select('theme_lists.*','theme_cates.cate_name')
            ->leftjoin('theme_cates','theme_lists.cate_id','theme_cates.id')
            ->where('theme_lists.is_show',1)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        //获取导航类别ID
        $nav_id = '6';
        //获取banner
        $banner_img = Banner::select('banners.*')
            ->where('cate_id',$nav_id)
            ->get();

        return view('web.index', ['data' => $data,'count' => $count,'list' => $list,'banner_img' => $banner_img]);
    }
}
