<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeCommentController extends Controller
{
    //显示专题评论
    public function show() {
        return view('admin.themeComment.commentList');
    }
}
