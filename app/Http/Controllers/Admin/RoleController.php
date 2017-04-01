<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //显示角色列表
    public function show() {
        //查询角色以及用户的权限

        return view('admin.role.roleList');
    }
    //添加角色
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            //查询所有顶级权限
            $permissions = Permission::where('parent_id',0)->get();
            $permissions = (object)getTree($permissions);
            return view('admin.role.roleAdd', ['permissions' => $permissions]);
        } elseif ($request->isMethod('post')) {
            $id = Role::insertGetId([
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name'),
                'description' => $request->get('description')
            ]);
            //给角色和权限中间表添加值
            if ($request->get('permission_id') != null) {
                foreach ($request->get('permission_id') as $value) {
                    PermissionRole::insert([
                        'permission_id' => $value,
                        'role_id' => $id
                    ]);
                }
            }
            return redirect('admin/role/show');
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
            'display_name.required' => '角色名称不能为空',
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
            'name.required' => '角色不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        if ($id == 0) {
            //数据库验证
            $name = $_GET['name'];
            $query = Role::where('name',$name)->get()->toArray();
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的角色标识
            $rname = Role::where('id',$id)->get()[0];
            $rname = $rname->name;
            //数据库验证
            $name = $_GET['name'];
            //判断是否修改角色标识
            if ($rname == $name) {
                $query = '';
            } else {
                if ($name != '#') {
                    $query = Role::where('name',$name)->get()->toArray();
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
