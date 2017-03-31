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
    public function nameCheck(Request $request) {
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
        //数据库验证
        $name = $_GET['name'];
        $query = Permission::where('name',$name)->get()->toArray();
        //判断是否匹配到
        if ($query == null) {
            return json_encode(['a' => 1]);
        } elseif ($query != null) {
            return json_encode(['a' => 2]);
        }
    }
}
