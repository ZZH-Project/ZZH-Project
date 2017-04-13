<?php

namespace App\Http\Controllers\admin;

use App\Models\wechatList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class wechatListController extends Controller
{
    //显示微圈内容
    public function show() {
        $data = wechatList::orderBy('id','asc')->get();
        return view('admin.wechatList.listList', ['data' => $data]);
    }
    //删除微圈内容
    public function del(Request $request,$id) {
        //删除数据库数据
        wechatList::where('id',$id)->delete();
        return 2;
    }
}
