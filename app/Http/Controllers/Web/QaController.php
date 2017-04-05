<?php

namespace App\Http\Controllers\web;

use App\Models\QaCate;
use App\Models\QaList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//前台
class QaController extends Controller
{
    //==================问答首页==================
    public function qaList(Request $request){
        $catename = isset($request->catename)?$request->catename:'';
        if($catename != ''){
//            var_dump($catename);die;
            $qacates = QaCate::orderBy('sort_id','asc')->get()->toArray();
            $cid = Qacate::select('id')->where(['cate_name'=>$catename])->get()->toArray();
//            var_dump($cid[0]['id']);
            $qalists = QaList::where('cate_id',$cid)->get()->toArray();
//            var_dump($qalists);
            return view('web.qa.index',compact('qacates','qalists'));
        }
        $qacates = QaCate::orderBy('sort_id','asc')->get()->toArray();
        $qalists = QaList::get()->toArray();
        return view('web.qa.index',compact('qacates','qalists'));
    }
    //===================提问页面===================
    public function qaAsk(){
        $qacates = QaCate::get()->toArray();
        return view('web.qa.ask',compact('qacates'));
    }
    //==================回答首页==================
    public function qaDetails(Request $request){
        $qalistid = $request->qalistid;
//        var_dump($qalistid);
        $qa = QaList::where('id',$qalistid)->get()->toArray();
        $qa = $qa[0];
//        var_dump($qa);
        return view('web.qa.details',compact('qa'));
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
        $ctid = $request->ctid;
        $time = time();
//        var_dump($title,$content,$wuid,$ctid,$time);
        $res = QaList::create([
            'title'=>$title,
            'content'=>$content,
            'user_id'=>$wuid,
            'cate_id'=>$ctid,
            'issue_time'=>$time
        ]);
        if($res){
            return json_encode(['a'=>1]);
        }else{
            return json_encode(['a'=>2]);
        }
    }

    //================验证回答信息================
    public  function checkdetails(Request $request){
        $role = [
            'detail' => 'required',
        ];
        $msg =[
            'detail.required' => '回答不能为空',
        ];
        $this->validate($request,$role,$msg);
    }
}
