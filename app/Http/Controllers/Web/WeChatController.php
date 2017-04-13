<?php

namespace App\Http\Controllers\web;

use App\Models\Banner;
use App\Models\wechatCate;
use App\Models\WechatComment;
use App\Models\WechatFav;
use App\Models\wechatList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WeChatController extends Controller
{
    //微圈主页
    public function index(){

        //查询随机微圈
        $list = wechatList::select('wechat_lists.*')
            ->limit(5)
            ->get();
        //查询�?条微圈分�?
        $data = wechatCate::orderBy('sort_id','asc')->limit(5)->get();

        //获取导航类别ID
        $nav_id = '4';
        //获取banner
        $banner_img = Banner::select('banners.*')
            ->where('cate_id',$nav_id)
            ->get();

        return view('web.wechat.index', ['data' => $data,'list' => $list,'banner_img' => $banner_img]);

    }
    //微圈列表�?
    public function list(){
        return view('web.wechat.list');
    }

    public function add(){
        $data = wechatCate::orderBy('sort_id','asc')->limit(5)->get();
        return view('web.wechat.add', ['data' => $data]);
    }

    //================加入微圈===============
    public function addData(Request $request){
        $user_id = $request->user_id;
        $cate_id = $request->cate_id;
        $wechat_id = $request->wechat_id;
        $wechat_name = $request->wechat_name;
        $content = $request->content;

        $res = wechatList::create([
            'user_id'=>$user_id,
            'cate_id'=>$cate_id,
            'wechat_id'=>$wechat_id,
            'wechat_name'=>$wechat_name,
            'content'=>$content,
        ]);

        return redirect('web/wechat/index');
    }

    //专题分类列表
    public function show(){
        //查询�?条专题分�?
        $data = wechatCate::orderBy('sort_id','asc')->limit(5)->get();
        //获取分类ID
        $cate_id = $_GET['id'];
        //查询此分类下的专�?
        $list = wechatList::where('cate_id',$cate_id)->get();
        //获取当前分类
        $cate = wechatCate::where('id',$cate_id)->get()[0];
        return view('web.wechat.list', ['data' => $data,'list' => $list,'cate' => $cate]);
    }

    //专题详情
    public function details(){
        //获取分类ID
        $cate_id = $_GET['cate_id'];
        //获取微圈ID
        $id = $_GET['id'];
        //获取次专题的评论
        $comment = WechatComment::select('wechat_comments.*','wusers.username')
            ->leftjoin('wusers','wusers.id','wechat_comments.wuser_id')
            ->where('is_show',1)
            ->where('th_id',$id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        //获取是否已经收藏
        $sc = WechatFav::where('th_id',$id)->where('cate_id',$cate_id)->where('wuser_id',session('wuid'))->get()->toArray();
        //获取微圈内容
        $data = wechatList::where('id',$id)->get();
        return view('web.wechat.details', ['comment' => $comment,'sc' => $sc, 'data' => $data]);
    }

    //专题评论
    public function comment(){
        //获取分类ID
        $cate_id = $_GET['cate_id'];
        //获取专题ID
        $id = $_GET['id'];
        //获取次专题的评论
        $comment = WechatComment::select('wechat_comments.*','wusers.username')
            ->leftjoin('wusers','wusers.id','wechat_comments.wuser_id')
            ->where('th_id',$id)
            ->where('is_show',1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('web.wechat.comment',['comment' => $comment]);
    }
    //提交专题评论
    public function submit(Request $request,$th_id,$cate_id){
        //获取分类ID
        $cid = $cate_id;
        //将信息插入数据库
        $wechat = new WechatComment();
        $wechat->th_id = $th_id;
        $wechat->wuser_id = session('wuid');
        $wechat->comment_id = 0;
        $wechat->content = $request->get('content');
        $wechat->is_show = 1;
        $wechat->save();
        return redirect("web/wechat/details?id=$th_id&cate_id=$cid");
    }
    //收藏专题
    public function sc(Request $request) {
        //查询当前点赞情况
        $result = WechatFav::where('th_id',$request->get('th_id'))
            ->where('cate_id',$request->get('cate_id'))
            ->where('wuser_id',session('wuid'))
            ->get()
            ->toArray();
        if ($result) {
            //删除收藏
            WechatFav::where('th_id',$request->get('th_id'))
                ->where('cate_id',$request->get('cate_id'))
                ->where('wuser_id',session('wuid'))
                ->delete();
            return 1;
        } else {
            //收藏专题
            $tsc = new WechatFav();
            $tsc->th_id = $request->get('th_id');
            $tsc->cate_id = $request->get('cate_id');
            $tsc->wuser_id = session('wuid');
            $tsc->save();
            return 2;
        }
    }

}


