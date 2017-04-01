<?php

namespace App\Http\Controllers\Admin;

use App\Models\QaCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //=====================评论列表显示============================
    public function show(){
        $page = isset($_GET['page'])?$_GET['page']:1;
//        var_dump($page);
        $qalist = QaCate::paginate(2);
        $fv ='';
        return view('admin.comment.commentList',compact('qalist','fv','page'));
    }

    //=======================添加分类=======================
    public function  add(){
        return view('admin.comment.commentAdd');
    }

    //====================验证添加分类的内容====================
    public function check(Request $request){
        //如果是post方式传递数据进入此分支
        if($request->isMethod('post')){
//            return 1111;
            //验证信息
            $qacate = $request->qacate;
            $role = [
                'qacate' => 'required'
            ];
            $msg = [
                'qacate.required' => '分类名称不能为空'
            ];
            $this->validate($request,$role,$msg);
            //查询分类名是否存在
            $res = QaCate::where(['cate_name'=>$qacate])->get()->toArray();
            //不存在返回1
            if(empty($res)){
                $qacate = $request->qacate;
                $qa = new QaCate();
                $qa->cate_name = $qacate;
                $res = $qa->save();
//            return var_dump($res);
                if($res){
                    return json_encode(['a'=>1]);
                }else{
                    return json_encode(['a'=>2]);
                }
                //存在返回2
            }else{
                return json_encode(['a'=>2]);
            }
        }
        //验证信息
        $qacate = $request->qacate;
        $role = [
            'qacate' => 'required'
        ];
        $msg = [
            'qacate.required' => '分类名称不能为空'
        ];
        $this->validate($request,$role,$msg);
        //查询分类名是否存在
        $res = QaCate::where(['cate_name'=>$qacate])->get()->toArray();
        //不存在返回1
        if(empty($res)){
            return json_encode(['a'=>1]);
        //存在返回2
        }else{
            return json_encode(['a'=>2]);
        }
    }

    //==================================问答分类的搜索==================================
    public function find(Request $request){
            if ($request->isMethod("post")) {
                //获取传递的值
                $fv = $_POST['fv'];
//                var_dump($fv);
                $data = QaCate::where('cate_name','like','%'.$fv.'%')->paginate(2);
//                var_dump($data);die;
                return response()->view('admin.comment.miniCommentTable', ['qalist' => $data,'fv' => $fv]);
            } elseif ($request->isMethod("get")) {
                //获取传递的值
                $fv = $_GET['fv'];
                $page = $_GET['page'];
                $data = QaCate::where('cate_name','like','%'.$fv.'%')->paginate(2);
                return view("admin.comment.commentList", ['qalist' => $data, 'fv' => $fv, 'page' => $page]);
            }
    }

    //=========================问答分类的修改=========================
    public function edit($id,$cate_name,$page,$fv=''){
        return view('admin.comment.commentEdit',compact('id','cate_name','page','fv'));
    }

    //========================验证问答分类的修改========================
    public function commentEdit(Request $request){
        //如果是post方式传递数据进入此分支
        if($request->isMethod('post')){
//            return 1111;
            //验证信息
            $qacate = $request->qacate;
            $qasort = $request->qasort;
            $page = $request->page;
            $fv = $request->fv;
            $res = QaCate::where(['cate_name'=>$qacate])
                            ->update(['sort_id'=>$qasort]);
            if($res){
                return redirect("admin/comment/find?fv=$fv&page=$page");

            }else{
                return redirect("admin/comment/find?fv=$fv&page=$page");
            }
        }

        //验证信息
        $qacate = $request->qacate;
        $qasort = $request->qasort;
        $hid = $request->hidcatename;
//        var_dump($qasort,$qacate);die;
        $role = [
            'qacate' => 'required',
            'qasort' => 'required|numeric'
        ];
        $msg = [
            'qacate.required' => '分类名称不能为空',
            'qasort.required' => '分类排序不能为空',
            'qasort.numeric' => '分类排序必须为数字'
        ];
        $this->validate($request,$role,$msg);
        //查询分类排序是否存在
        //如果输入的分类和本身的分类名相同
        if($qacate == $hid){
        // ============================
            $res = QaCate::where(['sort_id'=>$qasort])->get()->toArray();
            //不存在返回1
            if(empty($res)){
                return json_encode(['a'=>1]);
                //存在返回2
            }else{
                return json_encode(['a'=>2]);
            }
        }else{
        //=============================
            $result = QaCate::where(['cate_name'=>$qacate])->get()->toArray();
            if(empty($result)){
                $res = QaCate::where(['sort_id'=>$qasort])->get()->toArray();
                //不存在返回1
                if(empty($res)){
                    return json_encode(['a'=>1]);
                    //存在返回2
                }else{
//                    dd(222);
                    return json_encode(['a'=>2]);
                }
            }else{
                return json_encode(['a'=>3]);
            }
        }
    }

    //================删除问答分类================
    public function del($id){
        QaCate::where('id',$id)->delete();
        return redirect(url('admin/comment/show'));
    }
}
