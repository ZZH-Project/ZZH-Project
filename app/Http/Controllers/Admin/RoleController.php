<?php

namespace App\Http\Controllers\Admin;

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
}
