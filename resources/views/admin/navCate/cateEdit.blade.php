@extends('admin.layouts.Index')
@section('title','美丽联合-网站导航列表')
@section('title-first','网站导航管理')
@section('title-second','网站导航修改')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        #af{
            background: white;
            padding: 15px;
            width: 60%;
            margin: 0px auto;
            border-top: 5px solid #3C8DBC;
            border-radius: 10px;
            background: white;
        }
    </style>
@endsection
@section('main')
    <form id="af" action="{{url('admin/navCate/edit')}}/{{$data->id}}" method="post">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>网站导航修改</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/navCate/show')}}' title='专题分类列表'>专题分类列表</a>
        </h1>

        {{csrf_field()}}

        <input type="hidden" id="id" name="id" value="{{$data->id}}">

        <div id="ud" style="text-align: center;font-size: 16px;">分类排序编号</div>
        <input id="ut" class="myinput-main" type="text" name="sort_id" placeholder="请输入分类排序编号" value="{{$data->sort_id}}">

        <div id="pd" style="text-align: center;font-size: 16px;">分类名称</div>
        <input id="pt" class="myinput-main" type="text" name="cate_name" placeholder="请输入分类名称" value="{{$data->cate_name}}">

        <div id="ed" style="text-align: center;font-size: 16px;">分类图片</div>
        <input id="et" class="myinput-main" type="text" name="cate_img" placeholder="请输入分类图片" value="{{$data->cate_img}}">

        <div id="ed" style="text-align: center;font-size: 16px;">分类路由</div>
        <input id="rt" class="myinput-main" type="text" name="routes" placeholder="请输入分类路由" value="{{$data->routes}}">


        <input class="mysubmit-moon" type="submit" value="修改">
    </form>
@endsection
@section('script')
    {{--切换--}}
    <script>
        $("#fh span").mouseover(function () {
            $(this).css({"display":"none"});
            $("#fh a").css({"display":"inline-block"});
        });
        $("#fh a").mouseout(function () {
            $(this).css({"display":"none"});
            $("#fh span").css({"display":"inline-block"});
        });
    </script>
    <script>
        var pt = false;
        var et = false;
        //获取当前id
        var id = $("#id").val();
        //分类名称重复验证
        $("#pt").blur(function () {
            $.ajax({
                url:"{{url('admin/navCate/nameCheck')}}/"+id,
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        pt = true;
                        $("#pd").html("分类名称可用！");
                        $("#pd").css({"color":"green"});
                    } else if (data.a == 2) {
                        pt = false;
                        $("#pd").html("分类名称已存在！");
                        $("#pd").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_name != null) {
                        pt = false;
                        $("#pd").html(json.cate_name+'！');
                        $("#pd").css({"color":"red"});
                    }
                }
            });
        });
        $("#pt").keyup(function () {
            $.ajax({
                url:"{{url('admin/navCate/nameCheck')}}/"+id,
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        pt = true;
                        $("#pd").html("分类名称可用！");
                        $("#pd").css({"color":"green"});
                    } else if (data.a == 2) {
                        pt = false;
                        $("#pd").html("分类名称已存在！");
                        $("#pd").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_name != null) {
                        pt = false;
                        $("#pd").html(json.cate_name+'！');
                        $("#pd").css({"color":"red"});
                    }
                }
            });
        });
        //其他数据验证
        $("#et").blur(function () {
            $.ajax({
                url:"{{url('admin/navCate/check')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_img != null) {
                        et = false;
                        $("#ed").html(json.cate_img+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("分类图片格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        $("#et").keyup(function () {
            $.ajax({
                url:"{{url('admin/navCate/check')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_img != null) {
                        et = false;
                        $("#ed").html(json.cate_img+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("分类图片格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        //提交数据
        $("#af").submit(function () {
            $.ajax({
                url:"{{url('admin/navCate/nameCheck')}}/"+id,
                type:"get",
                data:$("#pt").serialize(),
                async:false,
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        pt = true;
                        $("#pd").html("分类名称可用！");
                        $("#pd").css({"color":"green"});
                    } else if (data.a == 2) {
                        pt = false;
                        $("#pd").html("分类名称已存在！");
                        $("#pd").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_name != null) {
                        pt = false;
                        $("#pd").html(json.cate_name+'！');
                        $("#pd").css({"color":"red"});
                    }
                }
            });
            $.ajax({
                url:"{{url('admin/navCate/check')}}",
                type:"get",
                data:$("#et").serialize(),
                async:false,
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.cate_img != null) {
                        et = false;
                        $("#ed").html(json.cate_img+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("分类图片格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
            if (pt && et) {
                return true;
            } else {
                $(".alt").html("请确认数据验证完成后添加！").show().delay(1000).fadeOut(1000);
                return false;
            }
        });
    </script>
@endsection


