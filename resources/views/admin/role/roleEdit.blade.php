@extends('admin.layouts.Index')
@section('title','美丽联合-修改权限')
@section('title-first','权限管理')
@section('title-second','修改权限')
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
    <form id="af" action="{{url('admin/role/edit')}}/{{$data->id}}" method="post">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>修改权限</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/role/show')}}' title='权限列表'>权限列表</a>
        </h1>
        {{csrf_field()}}

        <input type="hidden" id="id" name="id" value="{{$data->id}}">

        <div id="ud" style="text-align: center;font-size: 16px;">角色标识</div>
        <input id="ut" class="myinput-main" type="text" name="name" placeholder="请输入角色标识" value="{{$data->name}}">

        <div id="pd" style="text-align: center;font-size: 16px;">角色名称</div>
        <input id="pt" class="myinput-main" type="text" name="display_name" placeholder="请输入角色名称" value="{{$data->display_name}}">

        <div id="ed" style="text-align: center;font-size: 16px;">描述</div>
        <textarea id="et" class="myinput-main" style="width:300px;height:100px;" type="text" name="description" placeholder="请简单描述下角色">{{$data->description}}</textarea>

        <div style="text-align: center;font-size: 16px;">权限</div>
        @foreach($permissions as $v)
            <p style="margin:5px;font-size: 14px; color: #2ca02c;text-align: center;">
                <lable>
                    <input style="cursor: pointer;" type="checkbox" name="permission_id[]" value="{{$v->id}}" {{in_array($v->id, $per_ids)? 'checked' :''}} >{{$v->display_name}}
                </lable>
            </p>
        @endforeach

        <input class="mysubmit-moon" type="submit" value="添加">
    </form>
@endsection
@section('script')
    {{--角色列表和修改角色的切换--}}
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
        //获取当前id
        var id = $("#id").val();
        //角色重复验证
        $("#ut").blur(function () {
            $.ajax({
                url:"{{url('admin/role/nameCheck')}}/"+id,
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("角色可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("角色已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.name != null) {
                        ut = false;
                        $("#ud").html(json.name+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });
        $("#ut").keyup(function () {
            $.ajax({
                url:"{{url('admin/role/nameCheck')}}/"+id,
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("角色可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("角色已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.name != null) {
                        ut = false;
                        $("#ud").html(json.name+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });
        //其他数据验证
        $("#pt").blur(function () {
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.display_name != null) {
                        pt = false;
                        $("#pd").html(json.display_name+'！');
                        $("#pd").css({"color":"red"});
                    } else {
                        pt = true;
                        $("#pd").html("角色名称格式可用！");
                        $("#pd").css({"color":"green"});
                    }
                }
            });
        });
        $("#pt").keyup(function () {
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#pt").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.display_name != null) {
                        pt = false;
                        $("#pd").html(json.display_name+'！');
                        $("#pd").css({"color":"red"});
                    } else {
                        pt = true;
                        $("#pd").html("角色名称格式可用！");
                        $("#pd").css({"color":"green"});
                    }
                }
            });
        });
        $("#et").blur(function () {
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.description != null) {
                        et = false;
                        $("#ed").html(json.description+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("描述格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        $("#et").keyup(function () {
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#et").serialize(),
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.description != null) {
                        et = false;
                        $("#ed").html(json.description+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("描述格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
        });
        //提交数据
        $("#af").submit(function () {
            $.ajax({
                url:"{{url('admin/role/nameCheck')}}/"+id,
                type:"get",
                data:$("#ut").serialize(),
                async: false,
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("角色可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("角色已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.name != null) {
                        ut = false;
                        $("#ud").html(json.name+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#pt").serialize(),
                async: false,
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.display_name != null) {
                        pt = false;
                        $("#pd").html(json.display_name+'！');
                        $("#pd").css({"color":"red"});
                    } else {
                        pt = true;
                        $("#pd").html("角色名称格式可用！");
                        $("#pd").css({"color":"green"});
                    }
                }
            });
            $.ajax({
                url:"{{url('admin/role/check')}}",
                type:"get",
                data:$("#et").serialize(),
                async: false,
                dataType:"json",
                success:function(data) {},
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.description != null) {
                        et = false;
                        $("#ed").html(json.description+'！');
                        $("#ed").css({"color":"red"});
                    } else {
                        et = true;
                        $("#ed").html("描述格式可用！");
                        $("#ed").css({"color":"green"});
                    }
                }
            });
            if (ut && pt && et) {
                return true;
            } else {
                $(".alt").html("请确认数据验证完成后添加！").show().delay(1000).fadeOut(1000);
                return false;
            }
        });
    </script>
@endsection
