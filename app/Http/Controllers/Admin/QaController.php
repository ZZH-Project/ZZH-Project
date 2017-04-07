<?php

namespace App\Http\Controllers\Admin;

use App\Models\QaCate;
use App\Models\QaComment;
use App\Models\QaList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//后台
class QaController extends Controller
{
    //============显示问答列表============
    public function show(Request $request){
        $qalists = DB::table('qa_lists')
                        ->select('qa_lists.id','title','user_id','cate_name','good_num','good_num','issue_time','is_show')
                        ->leftJoin('qa_cates','qa_cates.id','=','qa_lists.cate_id')
                        ->get()->toArray();
        return view('admin/qa/qaList',compact('qalists'));
    }

    //================显示问答详情================
    public function showcontent(Request $request){
        $qalistid = $request->qalistid;
//        var_dump($qalistid);
        $qacontent = QaList::where('id',$qalistid)->get()->toArray();
        $qacontent = $qacontent[0];
        return view('admin/qa/qaContent',compact('qacontent'));
    }

    //===============切换显示状态===============
    public function switchshow(Request $request){
        $show = $request->status;
        $id = $request->id;
//        var_dump($show,$id);
        QaList::where(['id'=>$id])
            ->update(['is_show'=>$show]);
        return redirect('admin/qa/showcontent'.'/'.$id);
    }

    public function find(Request $request){
        if ($request->isMethod("post")) {
            //获取传递的值
            $fv = $_POST['fv'];
//                var_dump($fv);
            $data = QaList::where('title','like','%'.$fv.'%')->get();
//                var_dump($data);die;
            return response()->view('admin.qa.miniQaTable', ['qalists' => $data,'fv' => $fv]);
        }
    }

    //================显示回答内容================
    public function showcomment(Request $request){
       $qacomment = QaComment::get();
       $qacomment = (object)Tree($qacomment);
//       var_dump($qacomment);die;
       return view('admin/qa/qaCommentList',compact('qacomment'));
    }
}
