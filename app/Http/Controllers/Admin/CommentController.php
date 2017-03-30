<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //评论列表显示
    public function show(){
        return view('admin.comment.commentList');
    }
}
