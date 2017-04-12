<?php

namespace App\Http\Controllers\admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class feedbackController extends Controller
{
    //显示微圈内容
    public function show() {
        $data = Feedback::orderBy('id','asc')->get();
        return view('admin.feedback.listList', ['data' => $data]);
    }
    //删除微圈内容
    public function del(Request $request,$id) {
        //删除数据库数据
        Feedback::where('id',$id)->delete();
        return 2;
    }
}
