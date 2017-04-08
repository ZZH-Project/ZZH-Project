<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeCommentController extends Controller
{
    //显示专题评论
    public function show() {
        //获取数据
        $data = ThemeComment::select('theme_comments.*','wusers.username','theme_lists.title')
            ->leftjoin('wusers','wusers.id','theme_comments.wuser_id')
            ->leftjoin('theme_lists','theme_lists.id','theme_comments.th_id')
            ->get();
        return view('admin.themeComment.commentList', ['data' => $data]);
    }
    //是否显示专题
    public function is(Request $request,$id) {
        //获取专题评论的上线情况
        $is_show = ThemeComment::where('id',$id)->get()[0]->is_show;
        if ($is_show == 1) {
            //修改状态
            ThemeComment::where('id',$id)->update([
                'is_show' => 2
            ]);
            return 2;
        } elseif ($is_show == 2) {
            //修改状态
            ThemeComment::where('id',$id)->update([
                'is_show' => 1
            ]);
            return 1;
        }
    }
}
