<?php

namespace App\Http\Controllers\Admin;

use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台主页
    public function index() {
        return view('admin.index.index');
    }
    //实时消息
    public function info(Request $request) {
        if ($request->get('a') == 1) {
            //查询数据
            $data = Info::select('infos.*','ausers.username')
                ->leftjoin('ausers','ausers.id','infos.auser_id')
                ->get();
            return response()->view('admin.index.miniInfo', ['data' => $data]);
        }
        //查询数据
        $data = Info::select('infos.*','ausers.username')
            ->leftjoin('ausers','ausers.id','infos.auser_id')
            ->get();
        return view('admin.index.info', ['data' => $data]);
    }
    //发送消息
    public function send(Request $request) {
        $content = $request->get('content');
        //存入数据
        $info = new Info();
        $info->auser_id = session('auser')['id'];
        $info->content = $request->get('content');
        $info->save();
        return 1;
    }
}
