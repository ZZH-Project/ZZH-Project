<?php

namespace App\Http\Controllers\admin;

use App\Models\Discuss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussController extends Controller
{
    //显示吐槽内容
    public function show() {
        $data = Discuss::orderBy('id','asc')->get();
        return view('admin.discuss.listList', ['data' => $data]);
    }
    //删除吐槽内容
    public function del(Request $request,$id) {
        //删除数据库数据
        Discuss::where('id',$id)->delete();
        return 2;
    }
}
