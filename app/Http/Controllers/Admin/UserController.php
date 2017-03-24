<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //显示用户
    public function show() {
        return view('admin.user.userList');
    }
}
