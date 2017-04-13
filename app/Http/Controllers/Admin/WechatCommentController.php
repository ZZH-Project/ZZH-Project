<?php

namespace App\Http\Controllers\Admin;

use App\Models\WechatComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatCommentController extends Controller
{
    //显示专题评论
    public function show() {
        //获取数据
        $data = WechatComment::select('wechat_comments.*','wusers.username')
            ->leftjoin('wusers','wusers.id','wechat_comments.wuser_id')
            ->leftjoin('wechat_lists','wechat_lists.id','wechat_comments.th_id')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('admin.wechatComment.commentList', ['data' => $data]);
    }
    //是否显示专题
    public function is(Request $request,$id) {
        //获取专题评论的上线情况
        $is_show = WechatComment::where('id',$id)->get()[0]->is_show;
        if ($is_show == 1) {
            //修改状态
            WechatComment::where('id',$id)->update([
                'is_show' => 2
            ]);
            return 2;
        } elseif ($is_show == 2) {
            //修改状态
            WechatComment::where('id',$id)->update([
                'is_show' => 1
            ]);
            return 1;
        }
    }

}
