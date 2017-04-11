<?php

namespace App\Http\Controllers\web;

use App\Models\QaList;
use App\Models\ThemeComment;
use App\Models\ThemeList;
use App\Models\WuserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    //个人中心主页
    public function index(){
        $wuid = session('wuid');
        $wuinfo = WuserInfo::where('wuid',$wuid)->get()->toArray();
//        var_dump($wuinfo);die;
        if(empty($wuinfo)){
            $wuinfo = ['pic'=>'','wuid'=>$wuid,'wusername'=>'','username'=>'','sex'=>''];
            return view('web.userCenter.index',compact('wuinfo'));
        }else{
            $wuinfo = $wuinfo[0];
//            var_dump($wuinfo);die;
            return view('web.userCenter.index',compact('wuinfo'));
        }

    }
    //个人信息展示
    public function info(Request $request){
        $wuid = $request->wuid;
//        var_dump($wuid);die;
        $wuinfo = DB::table('wuser_infos')
                    ->where('wuid',$wuid)
                    ->select('wuser_infos.id','wuser_infos.pic','wuser_infos.sex','wuser_infos.wuid','wuser_infos.wusername','wusers.username')
                    ->leftJoin('wusers','wusers.id','=','wuser_infos.wuid')->get()->toArray();
//        var_dump($wuinfo);
        if(empty($wuinfo)){
            $wuinfo = ['pic'=>'','wuid'=>$wuid,'wusername'=>'','username'=>'','sex'=>''];
//        var_dump($wuinfo);
            $wuinfo = (object)$wuinfo;
            return view('web.userCenter.info',compact('wuinfo'));
        }else{
            $wuinfo = $wuinfo[0];
//        var_dump($wuinfo);
            return view('web.userCenter.info',compact('wuinfo'));
        }

    }
    //个人信息修改
    public function infoEdit(Request $request){
        $wuid = $request->wuid;
        $wuinfo = WuserInfo::select('wusername','sex')->where('wuid',$wuid)->get()->toArray();
        if(empty($wuinfo)){
            $wuinfo = ['pic'=>'','wuid'=>$wuid,'wusername'=>'','username'=>'','sex'=>''];
//        var_dump($wuinfo);
            return view('web.userCenter.infoEdit',compact('wuinfo'));
        }else{
            $wuinfo = $wuinfo[0];
            return view('web.userCenter.infoEdit',compact('wuinfo'));
        }

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
        $wuid = session('wuid');
        $list = ThemeList::select('theme_lists.*','theme_cates.cate_name')
            ->leftjoin('theme_scs','theme_scs.th_id','theme_lists.id')
            ->leftjoin('theme_cates','theme_cates.id','theme_lists.cate_id')
            ->where('theme_scs.wuser_id',$wuid)
            ->get();
        //获取评论次数
        $count = ThemeComment::select(DB::raw('count(*) as num,th_id'))
            ->groupBy('th_id')
            ->get();
        $status = 'tm';
        return view('web.userCenter.favTheme',compact('list','status','count'));
    }

    //个人信息修改验证
    public function infoEditval(Request $request)
    {
        $this->validate($request, ['wusername' => 'required'], ['wusername.required' => '用昵称不能为空']);
        $wusername = $request->wusername;
        $sex = $request->sex;
        $wuid = session('wuid');
//        var_dump($wusername);die;
        $res = WuserInfo::where('wuid', $wuid)->get()->toArray();
        if (empty($res)) {
            $res = WuserInfo::create(['wusername' => $wusername, 'sex' => $sex, 'wuid' => $wuid]);
            if ($res) {
                return redirect('web/center/info'.'/'.$wuid);
            }
        } else {
            $ress = WuserInfo::where('wuid', $wuid)->update(['wusername' => $wusername, 'sex' => $sex]);
                return redirect('web/center/info'.'/'.$wuid);
        }
    }

        //头像修改信息验证
        public function imgEditval(Request $request)
        {
            $this->validate($request, ['pic' => 'required'], ['pic.required' => '图片不能为空']);
            $pic = $request->pic->move(public_path().'\wuserupload','headimg.jpg');
            $path = 'wuserupload/headimg.jpg';
//            var_dump($path);die;
            $wuid = session('wuid');
//            var_dump($pics);die;
           $res = WuserInfo::where('wuid', $wuid)->get()->toArray();
//           var_dump($res);die;
            if (empty($res)) {
                $res = WuserInfo::create(['pic' => $path,'wuid' => $wuid]);
                return redirect('web/center/info'.'/'.$wuid);
            } else {
                $ress = WuserInfo::where('wuid', $wuid)->update(['pic' => $path]);
//                var_dump($ress);
                return redirect('web/center/info'.'/'.$wuid);
            }
        }

    //密码修改信息验证
    public function passEditval(){
        return 111;
//        return view('web.user.login');
    }

    //问答收藏
    public function myfav(){
        $wuid = session('wuid');
        $favqas = DB::table('qa_collects')
            ->select('qa_lists.id','qa_lists.title','qa_lists.content','qa_lists.user_id','qa_lists.cate_id','good_num','qa_lists.issue_time','qa_cates.cate_name','wuser_infos.wusername')
            ->leftJoin('qa_lists','qa_collects.qa_id','=','qa_lists.id')
            ->leftJoin('qa_cates','qa_cates.id','=','qa_lists.cate_id')
            ->leftJoin('wuser_infos','wuser_infos.wuid','=','qa_collects.wuser_id')
            ->where('qa_collects.wuser_id',$wuid)
            ->get();

        $status = 'qa';
        return view('web.userCenter.favTheme',compact('favqas','status'));
    }
    //专题收藏
    public function tmsc() {
        $wuid = session('wuid');
        $list = ThemeList::select('theme_lists.*','theme_cates.cate_name')
            ->leftjoin('theme_scs','theme_scs.th_id','theme_lists.id')
            ->leftjoin('theme_cates','theme_cates.id','theme_lists.cate_id')
            ->where('theme_scs.wuser_id',$wuid)
            ->get();
        //获取评论次数
        $count = ThemeComment::select(DB::raw('count(*) as num,th_id'))
            ->groupBy('th_id')
            ->get();
        $status = 'tm';
        return view('web.userCenter.favTheme',compact('list','status','count'));
    }

        //退出登录
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('web/user/login');
    }
}
