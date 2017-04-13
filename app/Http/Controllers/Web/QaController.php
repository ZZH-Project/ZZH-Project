<?php

namespace App\Http\Controllers\web;

use App\Models\QaCate;
use App\Models\QaCollect;
use App\Models\QaComment;
use App\Models\QaList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
            $qalists = DB::table('qa_lists')
                        ->select('qa_lists.id','wusers.username','wuser_infos.wusername','wuser_infos.pic','title','content','user_id','cate_name','good_num','good_num','issue_time','is_show')
                        ->leftJoin('qa_cates','qa_cates.id','=','qa_lists.cate_id')
                        ->leftJoin('wusers','wusers.id','=','qa_lists.user_id')
                        ->leftJoin('wuser_infos','wuser_infos.wuid','=','wusers.id')
                        ->where('qa_cates.id',$cid)
                        ->get()->toArray();
            return view('web.qa.index',compact('qacates','qalists'));
        }
        $qacates = QaCate::orderBy('sort_id','asc')->get()->toArray();
        $qalists = DB::table('qa_lists')
                    ->select('qa_lists.id','wusers.username','wuser_infos.wusername','wuser_infos.pic','title','content','user_id','cate_name','good_num','good_num','issue_time','is_show')
                    ->leftJoin('qa_cates','qa_cates.id','=','qa_lists.cate_id')
                    ->leftJoin('wusers','wusers.id','=','qa_lists.user_id')
                    ->leftJoin('wuser_infos','wuser_infos.wuid','=','wusers.id')
                    ->get()->toArray();
//        var_dump($qalists);die;

        return view('web.qa.index',compact('qacates','qalists'));
    }
    //===================提问页面===================
    public function qaAsk(){
        $qacates = QaCate::get()->toArray();
        return view('web.qa.ask',compact('qacates'));
    }
    //==================回答首页==================
    public function qaDetails(Request $request){
        $wuid = session('wuid');
        $qalistid = $request->qalistid;
//        var_dump($qalistid);
        $qa = DB::table('qa_lists')
            ->select('qa_lists.id','wusers.username','wuser_infos.wusername','wuser_infos.pic','title','content','user_id','cate_name','good_num','good_num','issue_time','is_show')
            ->leftJoin('qa_cates','qa_cates.id','=','qa_lists.cate_id')
            ->leftJoin('wusers','wusers.id','=','qa_lists.user_id')
            ->leftJoin('wuser_infos','wuser_infos.wuid','=','wusers.id')
            ->where('qa_lists.id',$qalistid)
            ->get()->toArray();
        $qa = $qa[0];
//        var_dump($qa);die;
        $qacomment = DB::table('qa_comments')
                    ->select('qa_comments.id','qa_comments.qa_id','qa_comments.user_id','qa_comments.comment_id','qa_comments.content','qa_comments.good_num','qa_comments.is_show','qa_comments.issue_time','wusers.username','wuser_infos.wusername','wuser_infos.pic')
                    ->leftJoin('wusers','wusers.id','=','qa_comments.user_id')
                    ->leftJoin('wuser_infos','wuser_infos.wuid','=','qa_comments.user_id')
                    ->where('qa_id',$qalistid)->get();
//        var_dump($qacomment);die;
        $qacomment = (object)Tree($qacomment);
        $qacollect = QaCollect::where(["wuser_id"=>$wuid,"qa_id"=>$qalistid])->get()->toArray();
        if(!empty($qacollect)){
            $qacollect = $qacollect[0];
            return view('web.qa.details',compact('qa','qacomment','qacollect'));
        }else{
            $qacollect = [''];
            $qacollect = $qacollect[0];
//        var_dump($qacollect);die;
            return view('web.qa.details',compact('qa','qacomment','qacollect'));
        }

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
        $detail = $request->detail;
        $qlid = $request->qlid;
        $wuid = $request->wuid;
        $time = time();
        var_dump($detail,$qlid,$wuid);
        QaComment::create([
            'qa_id' => $qlid,
            'user_id' => $wuid,
            'content' => $detail,
            'issue_time' => $time
        ]);
    }

    //================验证子集回答信息================
    public  function checkdetailsc(Request $request){
        $role = [
            'detail2' => 'required',
        ];
        $msg =[
            'detail2.required' => '回答不能为空',
        ];
        $this->validate($request,$role,$msg);
        $detail = $request->detail2;
        $qlid = $request->qlid;
        $cmid = $request->cmid;
        $wuid = $request->wuid;
        $time = time();
//        var_dump($detail,$qlid,$wuid);die;
        QaComment::create([
            'qa_id' => $qlid,
            'comment_id' => $cmid,
            'user_id' => $wuid,
            'content' => $detail,
            'issue_time' => $time
        ]);
    }

    //=====================问答主页点赞=====================
    public function goodadd(Request $request){
        $qaid = $request->qaid;
//        var_dump($qaid);die;
        $goodnum = QaList::select('good_num')->where('id',$qaid)->get()->toArray();
        $goodnum = $goodnum[0]['good_num']+1;
        QaList::where('id',$qaid)->update(['good_num'=>$goodnum]);
//        var_dump($qaid,$goodnum);
        return $goodnum;
    }

    //=====================问答主页取消赞=====================
    public function goodmin(Request $request){
        $qaid = $request->qaid;
//        var_dump($qaid);die;
        $goodnum = QaList::select('good_num')->where('id',$qaid)->get()->toArray();
        $goodnum = $goodnum[0]['good_num']-1;
        QaList::where('id',$qaid)->update(['good_num'=>$goodnum]);
//        var_dump($qaid,$goodnum);
        return $goodnum;
    }

    //=====================回答点赞=====================
    public function cdgoodadd(Request $request){
        $qaid = $request->qaid;
//        var_dump($qaid);die;
        $goodnum = QaComment::select('good_num')->where('id',$qaid)->get()->toArray();
        $goodnum = $goodnum[0]['good_num']+1;
        QaComment::where('id',$qaid)->update(['good_num'=>$goodnum]);
//        var_dump($qaid,$goodnum);die;
        return $goodnum;
    }

    //=====================回答取消赞=====================
    public function cdgoodmin(Request $request){
        $qaid = $request->qaid;
//        var_dump($qaid);die;
        $goodnum = QaComment::select('good_num')->where('id',$qaid)->get()->toArray();
        $goodnum = $goodnum[0]['good_num']-1;
        QaComment::where('id',$qaid)->update(['good_num'=>$goodnum]);
//        var_dump($qaid,$goodnum);die;
        return $goodnum;
    }

    //=====================问答收藏=====================
    public function collectadd(Request $request){
        $qaid = $request->qaid;
        $wuid = $request->wuid;
//        var_dump($qaid,$wuid);
        $res = QaCollect::create(['qa_id'=>$qaid,'wuser_id'=>$wuid]);
        if($res){
            return json_encode(['a'=>1]);
        }
    }

    //=====================问答收藏=====================
    public function collectmin(Request $request){
        $qaid = $request->qaid;
        $wuid = $request->wuid;
//        var_dump($qaid,$wuid);
        $res = QaCollect::where(['qa_id'=>$qaid,'wuser_id'=>$wuid])->delete();
        if($res){
            return json_encode(['a'=>1]);
        }
    }
}
