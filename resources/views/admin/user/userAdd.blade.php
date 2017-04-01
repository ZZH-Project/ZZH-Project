@extends('admin.layouts.Index')
@section('title','美丽联合-添加用户')
@section('title-first','用户管理')
@section('title-second','添加用户')
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
            <span>添加用户</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/user/show')}}' title='用户列表'>用户列表</a>
        </h1>
        {{csrf_field()}}
        <div id="ud" style="text-align: center;font-size: 16px;">用户名</div>
        <input id="ut" class="myinput-main" type="text" name="username" placeholder="请输入3到12位用户名">

        <div id="pd" style="text-align: center;font-size: 16px;">密码</div>
        <input id="pt" class="myinput-main" type="password" name="password" placeholder="请输入密码">

        <div id="ed" style="text-align: center;font-size: 16px;">邮箱</div>
        <input id="et" class="myinput-main" type="text" name="email" placeholder="请输入邮箱">

        <div id="rd" style="text-align: center;font-size: 16px;">角色</div>
        @foreach($roles as $v)
        <p style="margin:5px;font-size: 14px; color: #2ca02c;text-align: center;">
            <lable><input style="cursor: pointer;" type="checkbox" name="role_id[]" value="{{$v['id']}}">{{$v['display_name']}}</lable>
        </p>
        @endforeach

        <input class="mysubmit-moon" type="submit" value="添加">
    </form>
@endsection
@section('script')
    {{--用户列表和添加用户的切换--}}
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
