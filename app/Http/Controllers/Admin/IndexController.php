<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auser;
use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //后台主页
    public function index() {
        return view('admin.index.index');
    }
    //实时消息
    public function info(Request $request) {
        if ($request->get('a') == 1) {
            //查询总条数
            $count = Info::select(DB::raw('count(*) as num'))->get()[0];
            if ($count->num == $request->get('count')) {
                return 5;
            }
            //查询数据
            $data = Info::select('infos.*','ausers.username')
                ->leftjoin('ausers','ausers.id','infos.auser_id')
                ->orderBy('infos.created_at','asc')
                ->get();
            return response()->view('admin.index.miniInfo', ['data' => $data,'count' => $count]);
        }
        //查询总条数
        $count = Info::select(DB::raw('count(*) as num'))->get()[0];
        //查询数据
        $data = Info::select('infos.*','ausers.username')
            ->leftjoin('ausers','ausers.id','infos.auser_id')
            ->orderBy('infos.created_at','asc')
            ->get();
        return view('admin.index.info', ['data' => $data,'count' => $count]);
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
    //图表数据
    public function data(Request $request) {
        if ($request->get('a') == 'auser') {
            //查询数据
            $auser = Auser::select(DB::raw('count(*) as num,roles.display_name'))
                ->leftjoin('auser_role','auser_role.auser_id','ausers.id')
                ->leftjoin('roles','roles.id','auser_role.role_id')
                ->groupBy('roles.display_name')
                ->get();
            return $auser;
        }
    }
}
