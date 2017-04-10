<?php

namespace App\Http\Controllers\web;

use App\Models\WuserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    //个人中心主页
    public function index(){
        $wuinfo = WuserInfo::get()->toArray();
        $wuinfo = $wuinfo[0];
        return view('web.userCenter.index',compact('wuinfo'));
    }
    //个人信息展示
    public function info(){
        $wuinfo = DB::table('wuser_infos')
                    ->select('wuser_infos.id','wuser_infos.pic','wuser_infos.sex','wuser_infos.wuid','wuser_infos.wusername','wusers.username')
                    ->leftJoin('wusers','wusers.id','=','wuser_infos.wuid')->get()->toArray();
        $wuinfo = $wuinfo[0];
//        var_dump($wuinfo);
        return view('web.userCenter.info',compact('wuinfo'));
    }
    //个人信息修改
    public function infoEdit(Request $request){
        $wuid = $request->wuid;
        $wuinfo = WuserInfo::select('wusername','sex')->where('wuid',$wuid)->get()->toArray();
        $wuinfo = $wuinfo[0];
        return view('web.userCenter.infoEdit',compact('wuinfo'));
    }
    //个人头像修改
    public function imgEdit(){
        return view('web.userCenter.imgEdit');
    }
    //密码修改
    public function passEdit(){
        return view('web.userCenter.passEdit');
    }
    //我的收藏
    public function favTheme(){
        return view('web.userCenter.favTheme');
    }

    //个人信息修改验证
    public function infoEditval(Request $request)
    {
        $this->validate($request, ['wusername' => 'required'], ['wusername.required' => '用昵称不能为空']);
        $wusername = $request->wusername;
        $sex = $request->sex;
        $wuid = session('wuid');
        $res = WuserInfo::where('wuid', $wuid)->get()->toArray();
        if (empty($res)) {
            $res = WuserInfo::create(['wusername' => $wusername, 'sex' => $sex, 'wuid' => $wuid]);
            if ($res) {
                return redirect('web/center/info');
            }
        } else {
            $ress = WuserInfo::where('wuid', $wuid)->update(['wusername' => $wusername, 'sex' => $sex]);
            if ($ress) {
                return redirect('web/center/info');
            }
        }
    }

        //个人信息修改验证
        public function imgEditval(Request $request)
        {
            $this->validate($request, ['pic' => 'required'], ['pic.required' => '图片不能为空']);
            $pic = $request->pic->move(public_path().'\wuserupload','headimg.jpg');
            $path = url('wuserupload/headimg.jpg');
            $wuid = session('wuid');
//            var_dump($pics);die;
            WuserInfo::where('wuid',$wuid)->update(['pic' => $path]);
            return redirect('web/center/index');
        }

    //密码修改信息验证
    public function passEditval(){
        return 111;
//        return view('web.user.login');
    }

}
