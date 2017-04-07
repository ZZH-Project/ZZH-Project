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
        $a = isset($_POST['a']) ? $_POST['a'] : 2;
        $fv = isset($_POST['fv']) ? $_POST['fv'] : '';
        if ($fv == null && $a == 2) {
            //查询内容
            $list = ThemeList::get();
            //查询分类
            $cate = ThemeCate::get();
            return view('admin.themeList.listList', ['list' => $list, 'cate' => $cate]);
        } else {
            //查询内容
            $list = ThemeList::where('title','like','%'.$fv.'%')->get();
            //查询分类
            $cate = ThemeCate::get();
            return response()->view('admin.themeList.miniListTable', ['list' => $list, 'cate' => $cate]);
        }
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
            $lists->is_show = 1;
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
    //修改专题内容
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询分类
            $cate = ThemeCate::get();
            //查询当前
            $data = ThemeList::where('id',$id)->get()[0];
            return view('admin.themeList.listEdit', ['cate' => $cate,'data' => $data]);
        } elseif ($request->isMethod('post')) {
            if ($request->banner_img == null) {
                //更新数据
                ThemeList::where('id',$id)->update([
                    'title' => $request->get('title'),
                    'cate_id' => $request->get('cate_id'),
                    'content' => $request->get('content')
                ]);
                return redirect('admin/themeList/show');
            } elseif ($request->banner_img != null) {
                //处理图片
                $pic = $request->banner_img;
                $filename = mt_rand(100,999).time().'.'.$pic->getClientOriginalExtension();
                //上传图片
                $pic->move('upload/images',$filename);
                //获取图片名称
                $pic = ThemeList::where('id',$id)->get()[0]->banner_img;
                //拼接图片路径
                $filepath = 'upload/images/'.$pic;
                //删除原图
                unlink($filepath);
                //更新数据
                ThemeList::where('id',$id)->update([
                    'title' => $request->get('title'),
                    'cate_id' => $request->get('cate_id'),
                    'banner_img' => $filename,
                    'content' => $request->get('content')
                ]);
                return redirect('admin/themeList/show');
            }
            return;
        }
    }
    //是否显示专题
    public function is(Request $request,$id) {
        //获取专题的上线情况
        $is_show = ThemeList::where('id',$id)->get()[0]->is_show;
        if ($is_show == 1) {
            //修改状态
            ThemeList::where('id',$id)->update([
                'is_show' => 2
            ]);
            return 2;
        } elseif ($is_show == 2) {
            //修改状态
            ThemeList::where('id',$id)->update([
                'is_show' => 1
            ]);
            return 1;
        }
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
