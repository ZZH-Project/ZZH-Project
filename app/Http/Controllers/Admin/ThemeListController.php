<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeListController extends Controller
{
    //显示专题内容
    public function show() {
        return view('admin.themeList.listList');
    }
    //添加专题内容
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.themeList.listAdd');
        } elseif ($request->isMethod('post')) {

        }
    }
}
