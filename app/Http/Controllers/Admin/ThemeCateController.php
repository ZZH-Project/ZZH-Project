<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeCateController extends Controller
{
    //显示专题分类
    public function show() {
        //查询出所有专题分类
        $data = ThemeCate::orderBy('sort_id','asc')->get();
        return view('admin.themeCate.cateList', ['data' => $data]);
    }
    //添加专题分类
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.themeCate.cateAdd');
        } elseif ($request->isMethod('post')) {
            ThemeCate::insert([
                'sort_id' => $request->get('sort_id'),
                'cate_name' => $request->get('cate_name'),
                'cate_img' => $request->get('cate_img')
            ]);
            return redirect('admin/themeCate/show');
        }
    }
    //删除专题分类
    public function del(Request $request,$id) {
        //删除数据库的数据
        ThemeCate::where('id',$id)->delete();
        return 2;
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
            $query = ThemeCate::where('cate_name',$name)->get()->toArray();
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的角色标识
            $rname = ThemeCate::where('id',$id)->get()[0];
            $rname = $rname->cate_name;
            //数据库验证
            $name = $_GET['cate_name'];
            //判断是否修改角色标识
            if ($rname == $name) {
                $query = '';
            } else {
                $query = Role::where('cate_name',$name)->get()->toArray();
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
