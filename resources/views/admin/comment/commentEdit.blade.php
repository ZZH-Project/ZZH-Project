@extends('admin.layouts.Index')
@section('title','美丽联合-修改分类')
@section('title-first','分类管理')
@section('title-second','修改分类')
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
    <form id="af" action="{{url('admin/comment/commentEdit')}}" method="post">
        <input type="hidden" name="page"  value="{{$page}}">
        <input type="hidden" name="fv"  value="{{$fv}}">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>修改分类</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/comment/show')}}' title='分类列表'>分类列表</a>
        </h1>
        {{csrf_field()}}
        <div id="qd" style="text-align: center;font-size: 16px;">分类名称</div>
        <input id="qt" class="myinput-main" type="text" name="qacate" value="{{$cate_name}}" placeholder="请输入问答分类">
        <input type="hidden" name="hidcatename" value="{{$cate_name}}">
        <div id="cd" style="text-align: center;font-size: 16px;">分类排序</div>
        <input id="ct" class="myinput-main" type="text" name="qasort" value="" placeholder="请输入排列序号">
        <input id="sub" class="mysubmit-moon" type="submit" value="修改" style="display: none;">
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
        //分类名重复验证
        $("#qt").blur(function () {
            $.ajax({
                url:"{{url('admin/comment/commentEdit')}}",
                type:"get",
                data:$("#af").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                    }else if (data.a == 2) {
                        $("#cd").html("排序已存在！");
                        $("#cd").css({"color":"red"});
                        $("#sub").css({"display":"none"});

                    } else if (data.a == 3) {
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                        $("#sub").css({"display":"none"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    console.log(json);
                    if ((json.qacate != null)) {
                        $("#qd").html(json.qacate+'！');
                        $("#qd").css({"color":"red"});
                    }else if((json.qasort != null)){
                        $("#cd").html(json.qasort+'！');
                        $("#cd").css({"color":"red"});
                    }else if(json.qacate == null){
                        $("#qd").html('分类名称');
                        $("#qd").css({"color":"black"});
                    }else if(json.qasort == null){
                        $("#qd").html('分类名称');
                        $("#qd").css({"color":"black"});
                    }
                }
            });
        });
        $("#qt").keyup(function () {
            $.ajax({
                url:"{{url('admin/comment/commentEdit')}}",
                type:"get",
                data:$("#af").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                    }else if (data.a == 2) {
                        $("#cd").html("排序已存在！");
                        $("#cd").css({"color":"red"});
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"none"});

                    } else if (data.a == 3) {
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"none"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.qacate != null) {
                        $("#qd").html(json.qacate+'！');
                        $("#qd").css({"color":"red"});
                    }else{
                        $("#qd").html('分类名称');
                        $("#qd").css({"color":"black"});
                    }
                }
            });
        });
        var ct = false;
        //分类排序验证
        $("#ct").blur(function () {
            $.ajax({
                url:"{{url('admin/comment/commentEdit')}}",
                type:"get",
                data:$("#af").serialize(),
                dataType:"json",
                success:function(data) {
//                    var data = data;
                    console.log(data);
//                    alert(data.a);
                    if (data.a == 1) {
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                    } else if (data.a == 2) {
                        $("#cd").html("排序已存在！");
                        $("#cd").css({"color":"red"});
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"none"});
                    }else if (data.a == 3) {
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"none"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    console.log(json);
                    if (json.qasort != null) {
                        $("#cd").html(json.qasort+'！');
                        $("#cd").css({"color":"red"});
                    }else{
                        $("#cd").html('分类排序');
                        $("#cd").css({"color":"black"});
                    }
                }
            });
        });
        $("#ct").keyup(function () {
            $.ajax({
                url:"{{url('admin/comment/commentEdit')}}",
                type:"get",
                data:$("#af").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    console.log(data);
                    if (data.a == 1) {
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"block"});
                    } else if (data.a == 2) {
                        $("#cd").html("排序已存在！");
                        $("#cd").css({"color":"red"});
                        $("#qd").html("分类可修改");
                        $("#qd").css({"color":"green"});
                        $("#sub").css({"display":"none"});
                    }else if (data.a == 3) {
                        $("#qd").html("分类已存在！");
                        $("#qd").css({"color":"red"});
                        $("#cd").html("排序可修改！");
                        $("#cd").css({"color":"green"});
                        $("#sub").css({"display":"none"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.qasort != null) {
                        qt = false;
                        $("#cd").html(json.qasort+'！');
                        $("#cd").css({"color":"red"});
                    }else{
                        $("#cd").html('分类排序');
                        $("#cd").css({"color":"black"});
                    }
                }
            });
        });
    </script>
@endsection
