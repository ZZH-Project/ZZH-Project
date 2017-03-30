<?php

namespace App\Http\Controllers\Admin;

use App\Models\QaCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //评论列表显示
    public function show(){
        $qalist = QaCate::paginate(2);
        return view('admin.comment.commentList',compact('qalist'));
    }

    //添加分类
    public function  add(){
        return view('admin.comment.commentAdd');
    }

    //验证添加分类的内容
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
}
