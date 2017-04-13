<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\NavCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    //显示吐槽内容
    public function show() {
        $data = Banner::orderBy('id','asc')->get();
        return view('admin.banner.listList', ['data' => $data]);
    }

    //添加广告
    public function add(Request $request) {
        if ($request->isMethod('get')) {
            //查询分类
            $cate = NavCate::get();
            return view('admin.banner.listAdd', ['cate' => $cate]);
        } elseif ($request->isMethod('post')) {
            //处理图片
            $pic = $request->banner_img;
            $filename = mt_rand(100,999).time().'.'.$pic->getClientOriginalExtension();
            $pic->move('upload/images',$filename);
            //处理数据
            $lists = new Banner();
            $lists->cate_id = $request->get('cate_id');
            $lists->banner_img = $filename;
            $lists->save();
            return redirect('admin/banner/show');
        }
    }

    //删除广告
    public function del(Request $request,$id) {
        //获取图片名称
        $pic = Banner::where('id',$id)->get()[0]->banner_img;
        //拼接图片路径
        $filepath = 'upload/images/'.$pic;
        unlink($filepath);
        //删除数据库数据
        Banner::where('id',$id)->delete();
        return 2;
    }
    //修改广告
    public function edit(Request $request,$id) {
        if ($request->isMethod('get')) {
            //查询分类
            $cate = NavCate::get();
            //查询当前
            $data = Banner::where('id',$id)->get()[0];
            return view('admin.banner.listEdit', ['cate' => $cate,'data' => $data]);
        } elseif ($request->isMethod('post')) {
            if ($request->banner_img == null) {
                //更新数据
                Banner::where('id',$id)->update([
                    'cate_id' => $request->get('cate_id'),
                ]);
                return redirect('admin/banner/show');
            } elseif ($request->banner_img != null) {
                //处理图片
                $pic = $request->banner_img;
                $filename = mt_rand(100,999).time().'.'.$pic->getClientOriginalExtension();
                //上传图片
                $pic->move('upload/images',$filename);
                //获取图片名称
                $pic = Banner::where('id',$id)->get()[0]->banner_img;
                //拼接图片路径
                $filepath = 'upload/images/'.$pic;
                //删除原图
                unlink($filepath);
                //更新数据
                Banner::where('id',$id)->update([
                    'cate_id' => $request->get('cate_id'),
                    'banner_img' => $filename,
                ]);
                return redirect('admin/banner/show');
            }
            return;
        }
    }
}
