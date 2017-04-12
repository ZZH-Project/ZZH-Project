<?php

namespace App\Http\Controllers\Admin;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    //友情链接列表
    public function show(){
        $flists = Friend::get()->toArray();
        return view('admin/friend/friendList',compact('flists'));
    }

    //添加友情链接
    public function add(){
        return view('admin/friend/friendadd');
    }

    //添加友情链接验证
    public function check(Request $request){
        $role = [
            'fname' => 'required',
            'fside' => 'required'
        ];
        $msg = [
            'fname.required' => '站点名称不能为空',
            'fside.required' => '站点域名不能为空'
        ];
        $this->validate($request,$role,$msg);
        $fname = $request->fname;
        $fside = $request->fside;
        Friend::create([
            'friend_name' => $fname,
            'friend_link' => $fside
        ]);
        return redirect('admin/friend/show');
    }

    //修改友情链接
    public function edit(Request $request){
        $id = $request->id;
        $friend = Friend::where('id',$id)->get()->toArray();
        $friend = $friend[0];
        return view('admin/friend/friendEdit',compact('friend'));
    }

    //验证友情链接修改
    public function checkedit(Request $request){
        $role = [
            'fname' => 'required',
            'fside' => 'required'
        ];
        $msg = [
            'fname.required' => '站点名称不能为空',
            'fside.required' => '站点域名不能为空'
        ];
        $this->validate($request,$role,$msg);
        $fname = $request->fname;
        $fside = $request->fside;
        $id = $request->id;
        Friend::where('id',$id)
                ->update([
                    'friend_name' => $fname,
                    'friend_link' => $fside
                ]);
        return redirect('admin/friend/show');
    }

    //删除友情链接
    public function del(Request $request){
        $id = $request->id;
        Friend::where('id',$id)->delete();
        return redirect('admin/friend/show');
    }
}
