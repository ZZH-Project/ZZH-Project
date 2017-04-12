<?php

namespace App\Http\Controllers\admin;

use App\Models\NavCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavCateController extends Controller
{
    //显示网站导航分类
    public function show(){
        $a = isset($_POST['a']) ? $_POST['a'] : 2;
        $fv = isset($_POST['fv']) ? $_POST['fv'] : '';
        if ($fv == null && $a == 2) {
            //查询出所有网站导航分类
            $data = NavCate::orderBy('sort_id','asc')->get();
            return view('admin.navCate.cateList', ['data' => $data]);
        } else {
            $data = NavCate::where('cate_name','like','%'.$fv.'%')->orderBy('sort_id','asc')->get();
            return response()->view('admin.navCate.miniCateTable', ['data' => $data]);
        }
    }

    //添加网站导航分类
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.navCate.cateAdd');
        } elseif ($request->isMethod('post')) {
            $tc = new navCate();
            $tc->sort_id = $request->get('sort_id');
            $tc->cate_name = $request->get('cate_name');
            $tc->cate_img = $request->get('cate_img');
            $tc->routes = $request->get('routes');
            $tc->save();
            return redirect('admin/navCate/show');
        }
    }

    //删除网站导航分类
    public function del(Request $request,$id) {
        //删除数据库的数据
        NavCate::where('id',$id)->delete();
        return 2;
    }
    //修改网站导航分类
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询当前ID的数据
            $data = NavCate::where('id',$id)->get()[0];
            return view('admin.navCate.cateEdit', ['data' => $data]);
        } elseif ($request->isMethod('post')) {
            //更新数据
            NavCate::where('id',$id)->update([
                'sort_id' => $request->get('sort_id'),
                'cate_name' => $request->get('cate_name'),
                'cate_img' => $request->get('cate_img'),
                'routes' => $request->get('routes')
            ]);
            return redirect('admin/navCate/show');
        }
    }

    //重名验证
    public function nameCheck(Request $request,$id = 0) {
        //验证规则
        $roles = [
            'cate_name' => 'required',
        ];
        //自定义的错误信息
        $msg = [
            'cate_name.required' => '分类名称不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
        if ($id == 0) {
            //数据库验证
            $name = $_GET['cate_name'];
            $query = NavCate::where('cate_name',$name)->get()->toArray();
            //判断是否匹配到
            if ($query == null) {
                return json_encode(['a' => 1]);
            } elseif ($query != null) {
                return json_encode(['a' => 2]);
            }
        } else {
            //查询当前id的角色标识
            $rname = NavCate::where('id',$id)->get()[0];
            $rname = $rname->cate_name;
            //数据库验证
            $name = $_GET['cate_name'];
            //判断是否修改角色标识
            if ($rname == $name) {
                $query = '';
            } else {
                $query = NavCate::where('cate_name',$name)->get()->toArray();
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
            'cate_img' => 'required',
            'description' => 'required'
        ];
        //自定义的错误信息
        $msg = [
            'cate_img.required' => '分类图片不能为空',
            'description.required' => '描述不能为空'
        ];
        //进行验证
        $this->validate($request,$roles,$msg);
    }
}
