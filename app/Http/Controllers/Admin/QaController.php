<?php

namespace App\Http\Controllers\Admin;

use App\Models\QaList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//后台
class QaController extends Controller
{
    //============显示问答列表============
    public function show(Request $request){
        $qalists = QaList::get()->toArray();
        return view('admin/qa/qaList',compact('qalists'));
    }

    //================显示问答详情================
    public function showcontent(Request $request){
        $qalistid = $request->qalistid;
        var_dump($qalistid);
        $qacontent = QaList::where('id',$qalistid)->get()->toArray();
        $qacontent = $qacontent[0];
        return view('admin/qa/qaContent',compact('qacontent'));
    }
}
