<?php

namespace App\Http\Controllers\web;

use App\Models\ThemeCate;
use App\Models\ThemeComment;
use App\Models\ThemeList;
use App\Models\Wuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    //专题主页
    public function index(){
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
        //查询前5条专题分类
        $data = ThemeCate::orderBy('sort_id','asc')->limit(5)->get();
        return view('web.theme.index', ['data' => $data,'count' => $count,'list' => $list]);
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
        //获取评论次数
        $count = ThemeComment::select(DB::raw('count(*) as num,th_id'))
            ->groupBy('th_id')
            ->get();
        return view('web.theme.list', ['data' => $data,'list' => $list,'cate' => $cate,'count' => $count]);
    }
    //专题详情
    public function details(){
        //获取分类ID
        $cate_id = $_GET['cate_id'];
        //获取当前分类
        $cate = ThemeCate::where('id',$cate_id)->get()[0];
        //获取专题ID
        $id = $_GET['id'];
        //获取当前专题的浏览次数
        $num = ThemeList::where('id',$id)->get()[0]->good_num;
        //当前专题的浏览次数+1
        ThemeList::where('id',$id)->update([
            'good_num' => $num + 1
        ]);
        //获取专题信息
        $list = ThemeList::where('id',$id)->where('cate_id',$cate_id)->where('is_show',1)->get()[0];
        //获取次专题的评论
        $comment = ThemeComment::select('theme_comments.*','wusers.username')
            ->leftjoin('wusers','wusers.id','theme_comments.wuser_id')
            ->where('th_id',$id)
            ->limit(3)
            ->get();
        //获取评论次数
        $count = ThemeComment::where('th_id',$id)->count();
        return view('web.theme.details', ['cate' => $cate,'list' => $list,'comment' => $comment,'count' => $count]);
    }
    //专题评论
    public function comment(){
        //获取分类ID
        $cate_id = $_GET['cid'];
        //获取专题ID
        $id = $_GET['thid'];
        //获取专题信息
        $list = ThemeList::where('id',$id)->where('cate_id',$cate_id)->where('is_show',1)->get()[0];
        //获取次专题的评论
        $comment = ThemeComment::select('theme_comments.*','wusers.username')
            ->leftjoin('wusers','wusers.id','theme_comments.wuser_id')
            ->where('th_id',$id)
            ->get();
        return view('web.theme.comment',['list' => $list,'comment' => $comment]);
    }
    //提交专题评论
    public function submit(Request $request,$th_id,$cate_id){
        //获取分类ID
        $cid = $cate_id;
        //将信息插入数据库
        $theme = new ThemeComment();
        $theme->th_id = $th_id;
        $theme->wuser_id = session('wuid');
        $theme->comment_id = 0;
        $theme->content = $request->get('content');
        $theme->is_show = 1;
        $theme->save();
        return redirect("web/theme/details?id=$th_id&cate_id=$cid");
    }
}
