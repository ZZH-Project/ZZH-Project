<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class wechatListController extends Controller
{
    //显示专题内容
    public function show() {
        return view('admin.wechatList.listList');
    }
}
