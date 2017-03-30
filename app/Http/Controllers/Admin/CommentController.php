<?php

namespace App\Http\Controllers\Admin;

use App\Models\QaCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //评论列表显示
    public function show(){
        $qalist = QaCate::get()->toArray();
        return view('admin.comment.commentList',compact('qalist'));
    }

    //添加分类
    public function  add(){
        return view('admin.comment.commentAdd');
    }
}
