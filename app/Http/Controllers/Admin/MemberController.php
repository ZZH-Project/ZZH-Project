<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //会员管理

    //显示会员
    public function show(Request $request){
        $users = DB::table('wusers')
            ->select('wusers.id','wusers.username','wuser_infos.sex','wuser_infos.wusername','wuser_infos.pic','wusers.is_load')
            ->leftJoin('wuser_infos','wusers.id','=','wuser_infos.wuid')->get();
//        var_dump($users);
        return view('admin/member/memberList',compact('users'));
    }

    //禁止会员登录
    public function isload(Request $request){
        $wuid = $request->wuid;
        $isload = $request->isload;
//        var_dump($wuid,$isload);
        if($isload == 1){
            Wuser::where('id',$wuid)->update(['is_load'=>0]);
            return redirect('admin/member/show');
        }elseif($isload == 0){
            Wuser::where('id',$wuid)->update(['is_load'=>1]);
            return redirect('admin/member/show');
        }

    }
}
