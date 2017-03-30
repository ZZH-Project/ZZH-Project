<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QaController extends Controller
{
    public function qaList(){
        return view('web.qa.index');
    }
    public function qaAsk(){
        return view('web.qa.ask');
    }
    public function qaDetails(){
        return view('web.qa.details');
    }
}
