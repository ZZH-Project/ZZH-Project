@extends('admin.layouts.Index')
@section('title','美丽联合-修改用户')
@section('title-first','用户管理')
@section('title-second','修改用户')
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
    <form id="af" action="{{$fv == '' ? url('admin/user/edit').'/'.$data['id'].'/'.$page : url('admin/user/edit').'/'.$data['id'].'/'.$page.'/'.$fv}}" method="post" style="text-align: center">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>修改用户</span>
            <a style="display: none;color:#ff890a;" href='{{url("admin/user/find?fv=$fv&page=$page")}}' title='用户列表'>用户列表</a>
        </h1>
        {{csrf_field()}}
        <div id="ud" style="text-align: center;display: inline-block;margin: 0 auto;border-radius: 10px;background: #D5C59F;font-size: 28px;color: black;padding: 10px;">{{$data['username']}}</div>

        <div id="ed" style="text-align: center;font-size: 16px;margin-top: 15px;">邮箱</div>
        <input id="et" class="myinput-main" type="text" name="email" placeholder="请输入邮箱" value="{{$data['email']}}">

        <input class="mysubmit-box1" type="submit" value="修改">
    </form>
@endsection
@section('script')
    {{--用户列表和修改用户的切换--}}
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
    {{--数据验证--}}
    <script>
        var et = false;
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
            $.ajax({
                url:"{{url('admin/user/addCheck')}}",
                type:"get",
                data:$("#et").serialize(),
                async:false,
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
            if (et) {
                return true;
            } else {
                $(".alt").html("请确认数据验证完成后添加！").show().delay(1000).fadeOut(1000);
                return false;
            }
        });
    </script>
@endsection
