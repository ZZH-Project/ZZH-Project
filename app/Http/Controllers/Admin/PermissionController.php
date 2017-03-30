<?php

namespace App\Http\Controllers\Admin;

use App\Models\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //显示权限
    public function show() {
        //获取数据
        $fv = '';
        $data = PermissionRole::get()->toArray();
        return view('admin.permission.permissionList', ['data' => $data, 'fv' => $fv]);
    }
    //添加权限
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.permission.permissionAdd');
        } elseif ($request->isMethod('post')) {

        }
    }
}
