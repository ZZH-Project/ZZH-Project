<?php

namespace App\Http\Controllers\admin;

use App\models\wechatCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class wechatCateController extends Controller
{
    //显示微圈分类
    public function show(){
        $a = isset($_POST['a']) ? $_POST['a'] : 2;
        $fv = isset($_POST['fv']) ? $_POST['fv'] : '';
        if ($fv == null && $a == 2) {
            //查询出所有专题分类
            $data = wechatCate::orderBy('sort_id','asc')->get();
            return view('admin.wechatCate.cateList', ['data' => $data]);
        } else {
            $data = WechatCate::where('cate_name','like','%'.$fv.'%')->orderBy('sort_id','asc')->get();
            return response()->view('admin.wechatCate.miniCateTable', ['data' => $data]);
        }
    }

    //添加微圈分类
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.wechatCate.cateAdd');
        } elseif ($request->isMethod('post')) {
            $tc = new wechatCate();
            $tc->sort_id = $request->get('sort_id');
            $tc->cate_name = $request->get('cate_name');
            $tc->cate_img = $request->get('cate_img');
            $tc->save();
            return redirect('admin/wechatCate/show');
        }
    }

    //删除微圈分类
    public function del(Request $request,$id) {
        //删除数据库的数据
        weChatCate::where('id',$id)->delete();
        return 2;
    }
    //修改专题分类
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询当前ID的数据
            $data = wechatCate::where('id',$id)->get()[0];
            return view('admin.wechatCate.cateEdit', ['data' => $data]);
        } elseif ($request->isMethod('post')) {
            //更新数据
            wechatCate::where('id',$id)->update([
                'sort_id' => $request->get('sort_id'),
                'cate_name' => $request->get('cate_name'),
                'cate_img' => $request->get('cate_img')
            ]);
            return redirect('admin/wechatCate/show');
        }
    }

    //重名验证
    public function nameCheck(Request $request,$id = 0) {
        //验证规则
        $roles = [
            'cate_name' => 'required',
        ];
        //自定义的错误信息
        $msg = [
            'cate_name.required' => '分类名称不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        if ($id == 0) {
            //数据库验证
            $name = $_GET['cate_name'];
            $query = wechatCate::where('cate_name',$name)->get()->toArray();
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的角色标识
            $rname = wechatCate::where('id',$id)->get()[0];
            $rname = $rname->cate_name;
            //数据库验证
            $name = $_GET['cate_name'];
            //判断是否修改角色标识
            if ($rname == $name) {
                $query = '';
            } else {
                $query = wechatCate::where('cate_name',$name)->get()->toArray();
            }
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        }
    }
    //不为空验证
    public function check(Request $request) {
        //验证规则
        $roles = [
            'cate_img' => 'required',
            'description' => 'required'
        ];
        //自定义的错误信息
        $msg = [
            'cate_img.required' => '分类图片不能为空',
            'description.required' => '描述不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
    }
}
