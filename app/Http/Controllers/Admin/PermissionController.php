<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //显示权限
    public function show() {
        //获取数据
        $fv = '';
        //查询所有权限
        $data = Permission::get();
        $data = (object)getTree($data);
        return view('admin.permission.permissionList', ['data' => $data, 'fv' => $fv]);
    }
    //添加权限
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            //查询顶级权限
            $data = Permission::where('parent_id',0)->get();
            return view('admin.permission.permissionAdd', ['data' => $data]);
        } elseif ($request->isMethod('post')) {
            $result = Permission::create($request->all());
            if ($result) {
                return redirect('admin/permission/show');
            }
        }
    }
    //修改权限
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询顶级权限
            $data = Permission::where('parent_id',0)->get();
            $pdata = Permission::where('id',$id)->get()[0];
            return view('admin.permission.permissionEdit', ['data' => $data,'pdata' => $pdata]);
        } elseif ($request->isMethod('post')) {
            $name = $request->input('name');
            $display_name = $request->input('display_name');
            $description = $request->input('description');
            $parent_id = $request->input('parent_id');
            $result = Permission::where('id',$id)
                ->update([
                    'name' => $name,
                    'display_name' => $display_name,
                    'description' => $description,
                    'parent_id' => $parent_id
                ]);
            return redirect('admin/permission/show');
        }
    }
    //删除权限
    public function del(Request $request,$id) {
        //判断当前id有没有子集
        $data = Permission::where('parent_id',$id)->get()->toArray();
        if ($data != null) {
            //有子集
            return 1;
        } elseif ($data == null) {
            //无子集，可以删除
            Permission::where('id',$id)->delete();
            return 2;
        }
    }
    //不为空验证
    public function check(Request $request) {
        //验证规则
        $roles = [
            'display_name' => 'required',
            'description' => 'required'
        ];
        //自定义的错误信息
        $msg = [
            'display_name.required' => '路由名称不能为空',
            'description.required' => '描述不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
    }
    //重名验证
    public function nameCheck(Request $request,$id = 0) {
        //验证规则
        $roles = [
            'name' => 'required',
        ];
        //自定义的错误信息
        $msg = [
            'name.required' => '路由不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        if ($id == 0) {
            //数据库验证
            $name = $_GET['name'];
            if ($name != '#') {
                $query = Permission::where('name',$name)->get()->toArray();
            } else {
                $query = '';
            }
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的路由名称
            $rname = Permission::where('id',$id)->get()[0];
            $rname = $rname->name;
            //数据库验证
            $name = $_GET['name'];
            //判断是否修改路由
            if ($rname == $name) {
                $query = '';
            } else {
                if ($name != '#') {
                    $query = Permission::where('name',$name)->get()->toArray();
                } else {
                    $query = '';
                }
            }
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        }
    }
}
