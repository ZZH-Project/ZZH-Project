<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    //显示角色列表
    public function show() {
        //查询角色以及用户的权限
        $data = Role::select(DB::Raw('roles.*,GROUP_CONCAT(permissions.display_name) as dname'))
                        ->leftjoin('permission_role','permission_role.role_id','roles.id')
                        ->leftjoin('permissions','permissions.id','permission_role.permission_id')
                        ->groupBy('roles.id')->get();
        return view('admin.role.roleList',['data' => $data]);
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
    //修改角色
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询当前角色信息和当前用户的权限id
            $data = Role::where('id',$id)->get()[0];
            $permission_id = PermissionRole::select('permission_id')->where('role_id',$id)->get()->toArray();
            //转为一维数组
            $per_ids = array();
            foreach ($permission_id as $v) {
                $per_ids[] = $v['permission_id'];
            }
            //查询所有顶级权限
            $permissions = Permission::where('parent_id',0)->get();
            $permissions = (object)getTree($permissions);
            return view('admin.role.roleEdit', ['data' => $data, 'permissions' => $permissions, 'per_ids' => $per_ids]);
        } elseif ($request->isMethod('post')) {
            //修改角色信息
            $role = Role::find($id);
            $role->name = $request->get('name');
            $role->display_name = $request->get('display_name');
            $role->description = $request->get('description');
            $role->save();
            //修改角色的权限
            //将现有的权限删除
            PermissionRole::where('role_id',$id)->delete();
            //循环添加权限
            if ($request->get('permission_id') != null) {
                foreach ($request->get('permission_id') as $value) {
                    PermissionRole::insert(
                        [
                            'permission_id' => $value,
                            'role_id' => $id
                        ]
                    );
                }
            }
            return redirect('admin/role/show');
        }
    }
    //删除角色
    public function del(Request $request,$id) {
        //角色表的删除
        Role::where('id',$id)->delete();
        //中间表的删除
        PermissionRole::where('role_id',$id)->delete();
        return 2;
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
                $query = Role::where('name',$name)->get()->toArray();
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
