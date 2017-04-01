<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QaController extends Controller
{
    //============显示问答列表============
    public function show(){
        return view('admin/qa/qaList');
    }
}
