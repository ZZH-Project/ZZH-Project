<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeCate;
use App\Models\ThemeList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeListController extends Controller
{
    //显示专题内容
    public function show() {
        //查询内容
        $list = ThemeList::get();
        //查询分类
        $cate = ThemeCate::get();
        return view('admin.themeList.listList', ['list' => $list, 'cate' => $cate]);
    }
    //添加专题内容
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            //查询分类
            $cate = ThemeCate::get();
            return view('admin.themeList.listAdd', ['cate' => $cate]);
        } elseif ($request->isMethod('post')) {
            //处理图片
            $pic = $request->banner_img;
            $filename = mt_rand(100,999).time().'.'.$pic->getClientOriginalExtension();
            $pic->move('upload/images',$filename);
            //处理数据
            $lists = new ThemeList();
            $lists->cate_id = $request->get('cate_id');
            $lists->auser_id = $request->session()->get('auser')['id'];
            $lists->title = $request->get('title');
            $lists->banner_img = $filename;
            $lists->content = $request->get('content');
            $lists->save();
            return redirect('admin/themeList/show');
        }
    }
    //删除专题内容
    public function del(Request $request,$id) {
        //获取图片名称
        $pic = ThemeList::where('id',$id)->get()[0]->banner_img;
        //拼接图片路径
        $filepath = 'upload/images/'.$pic;
        unlink($filepath);
        //删除数据库数据
        ThemeList::where('id',$id)->delete();
        return 2;
    }
    //重名验证
    public function nameCheck(Request $request,$id = 0) {
        //验证规则
        $roles = [
            'title' => 'required',
        ];
        //自定义的错误信息
        $msg = [
            'title.required' => '专题标题不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        if ($id == 0) {
            //数据库验证
            $name = $_GET['title'];
            $query = ThemeList::where('title',$name)->get()->toArray();
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的角色标识
            $rname = ThemeList::where('id',$id)->get()[0];
            $rname = $rname->title;
            //数据库验证
            $name = $_GET['title'];
            //判断是否修改角色标识
            if ($rname == $name) {
                $query = '';
            } else {
                $query = ThemeList::where('title',$name)->get()->toArray();
            }
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        }
    }
    //不为空验证
    public function check(Request $request) {
        //验证规则
        $roles = [
            'banner_img' => 'required',
            'content' => 'required'
        ];
        //自定义的错误信息
        $msg = [
            'banner_img.required' => '专题大图片不能为空',
            'content.required' => '文章内容不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
    }
}
