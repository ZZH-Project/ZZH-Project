@extends('admin.layouts.Index')
@section('title','美丽联合-添加分类')
@section('title-first','分类管理')
@section('title-second','添加分类')
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
    <form id="af" action="{{url('admin/comment/commentCheck')}}" method="post">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>添加分类</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/comment/show')}}' title='分类列表'>分类列表</a>
        </h1>
        {{csrf_field()}}
        <div id="qd" style="text-align: center;font-size: 16px;">分类名称</div>
        <input id="qt" class="myinput-main" type="text" name="qacate" placeholder="请输入问答分类">
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
        var qt = false;
        //用户名重复验证
        $("#qt").blur(function () {
            $.ajax({
                url:"{{url('admin/comment/commentCheck')}}",
                type:"get",
                data:$("#qt").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        qt = true;
                        $("#qd").html("分类可添加！");
                        $("#qd").css({"color":"green"});
                    } else if (data.a == 2) {
                        qt = false;
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.qacate != null) {
                        qt = false;
                        $("#qd").html(json.qacate+'！');
                        $("#qd").css({"color":"red"});
                    }
                }
            });
        });
        $("#qt").keyup(function () {
            $.ajax({
                url:"{{url('admin/comment/commentCheck')}}",
                type:"get",
                data:$("#qt").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        qt = true;
                        $("#qd").html("分类可添加");
                        $("#qd").css({"color":"green"});
                    } else if (data.a == 2) {
                        qt = false;
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.qacate != null) {
                        qt = false;
                        $("#qd").html(json.qacate+'！');
                        $("#qd").css({"color":"red"});
                    }
                }
            });
        });
        //提交数据
        $("#af").submit(function () {
            $.ajax({
                url:"{{url('admin/comment/commentCheck')}}",
                type:"post",
                data:$("#af").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        alert("添加成功！");
                        location.href = "{{url('admin/comment/show')}}";
                    } else if (data.a == 2) {
                        alert("添加失败！");
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.qacate != null) {
                        qt = false;
                        $("#qd").html(json.qacate+'！');
                        $("#qd").css({"color":"red"});
                    }
                }
            });
            return false;
        });
    </script>
@endsection
