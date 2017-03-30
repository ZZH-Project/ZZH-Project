@extends('admin.layouts.Index')
@section('title','美丽联合-添加权限')
@section('title-first','权限管理')
@section('title-second','添加权限')
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
    <form id="af" action="{{url('admin/user/add')}}" method="post">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>添加权限</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/permission/show')}}' title='权限列表'>权限列表</a>
        </h1>
        {{csrf_field()}}
        <div style="text-align: center;font-size: 16px;">所属组权限</div>
        <select class="myselect-main" name="parent_id">
            <option value="0">顶级权限</option>
        </select>

        <div id="ud" style="text-align: center;font-size: 16px;">权限路由</div>
        <input id="ut" class="myinput-main" type="text" name="name" placeholder="请输入路由">

        <div id="pd" style="text-align: center;font-size: 16px;">路由名称</div>
        <input id="pt" class="myinput-main" type="text" name="display_name" placeholder="请输入路由名称">

        <div id="ed" style="text-align: center;font-size: 16px;">权限描述</div>
        <textarea id="et" class="myinput-main" style="width:300px;height:100px;" type="text" name="description" placeholder="请简单描述下路由"></textarea>

        <input class="mysubmit-moon" type="submit" value="添加">
    </form>
@endsection
@section('script')
    {{--权限列表和添加权限的切换--}}
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
        var ut = false;
        var pt = false;
        var et = false;
        //用户名重复验证
        $("#ut").blur(function () {
            $.ajax({
                url:"{{url('admin/user/userCheck')}}",
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("用户名可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("用户名已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.username != null) {
                        ut = false;
                        $("#ud").html(json.username+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });
        $("#ut").keyup(function () {
            $.ajax({
                url:"{{url('admin/user/userCheck')}}",
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("用户名可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("用户名已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.username != null) {
                        ut = false;
                        $("#ud").html(json.username+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });
        //其他数据验证
        $("#pt").blur(function () {
            $.ajax({
                url:"{{url('admin/user/addCheck')}}",
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.password != null) {
                        pt = false;
                        $("#pd").html(json.password+'！');
                        $("#pd").css({"color":"red"});
                    } else {
                        pt = true;
                        $("#pd").html("密码格式可用！");
                        $("#pd").css({"color":"green"});
                    }
                }
            });
        });
        $("#pt").keyup(function () {
            $.ajax({
                url:"{{url('admin/user/addCheck')}}",
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.password != null) {
                        pt = false;
                        $("#pd").html(json.password+'！');
                        $("#pd").css({"color":"red"});
                    } else {
                        pt = true;
                        $("#pd").html("密码格式可用！");
                        $("#pd").css({"color":"green"});
                    }
                }
            });
        });
        $("#et").blur(function () {
            $.ajax({
                url:"{{url('admin/user/addCheck')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.email != null) {
                        et = false;
                        $("#ed").html(json.email+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("邮箱格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        $("#et").keyup(function () {
            $.ajax({
                url:"{{url('admin/user/addCheck')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.email != null) {
                        et = false;
                        $("#ed").html(json.email+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("邮箱格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        //提交数据
        $("#af").submit(function () {
            if (ut && pt && et) {
                return true;
            } else {
                $(".alt").html("请确认数据验证完成后添加！").show().delay(1000).fadeOut(1000);
                return false;
            }
        });
    </script>
@endsection

