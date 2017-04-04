<?php

namespace App\Http\Controllers\web;

use App\Models\QaCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台
class QaController extends Controller
{
    //==================问答首页==================
    public function qaList(){
        $qacates = QaCate::get()->toArray();
        return view('web.qa.index',compact('qacates'));
    }
    //===================提问页面===================
    public function qaAsk(){
        $qacates = QaCate::get()->toArray();
        return view('web.qa.ask',compact('qacates'));
    }
    //==================回答首页==================
    public function qaDetails(){
        return view('web.qa.details');
    }

    //================验证提问信息================
    public function check(Request $request){
        $role = [
            'atitle' => 'required',
            'acontent' => 'required'
        ];
        $msg =[
            'atitle.required' => '标题不能为空',
            'acontent.required' => '问答内容不能为空',
        ];
        $this->validate($request,$role,$msg);
        $title = $request->atitle;
        $content = $request->acontent;
        $wuid = $request->wuid;
        var_dump($title,$content,$wuid);
    }
}
