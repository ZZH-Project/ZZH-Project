@extends('admin.layouts.Index')
@section('title','美丽联合-添加广告')
@section('title-first','广告内容管理')
@section('title-second','添加广告')
@section('style')
    <link href="{{ asset('umeditor1.2.3-utf8-php/themes/default/css/umeditor.css') }}" type="text/css" rel="stylesheet">
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
    <form id="af" action="{{url('admin/banner/add')}}" method="post" enctype="multipart/form-data">
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>添加广告</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/banner/show')}}' title='专题内容列表'>广告列表</a>
        </h1>
        {{csrf_field()}}

        <div id="cd" style="text-align: center;font-size: 16px;">版块分类名称</div>
        <select name="cate_id" class="myselect-main">
            @foreach($cate as $v)
            <option value="{{$v->id}}">{{$v->cate_name}}</option>
            @endforeach
        </select>

        <div id="pd" style="text-align: center;font-size: 16px;">广告图片</div>
        <input id="pt" class="myinput-main" style="cursor: pointer;" type="file" name="banner_img" placeholder="请输入专题大图片">

        <input class="mysubmit-moon" type="submit" value="添加">
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
    {{--判断--}}
    <script>
        var ut = false;
        var pt = false;
        var et = false;
        //重复验证
        $("#ut").blur(function () {
            $.ajax({
                url:"{{url('admin/banner/nameCheck')}}",
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("专题标题可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("专题标题已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.title != null) {
                        ut = false;
                        $("#ud").html(json.title+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });
        $("#ut").keyup(function () {
            $.ajax({
                url:"{{url('admin/banner/nameCheck')}}",
                type:"get",
                data:$("#ut").serialize(),
                dataType:"json",
                success:function(data) {
                    var data = data;
                    if (data.a == 1) {
                        ut = true;
                        $("#ud").html("专题标题可用！");
                        $("#ud").css({"color":"green"});
                    } else if (data.a == 2) {
                        ut = false;
                        $("#ud").html("专题标题已存在！");
                        $("#ud").css({"color":"red"});
                    }
                },
                error:function(msg){
                    var json = JSON.parse(msg.responseText);
                    if (json.title != null) {
                        ut = false;
                        $("#ud").html(json.title+'！');
                        $("#ud").css({"color":"red"});
                    }
                }
            });
        });

        //提交数据
        $("#af").submit(function () {
            var content = UM.getEditor('myEditor').getContent();
            var img = $('#pt').val();
            if (!img) {
                pt = false;
                $("#pd").html("专题大图片不能为空！");
                $("#pd").css({"color":"red"});
            } else {
                pt = true;
                $("#pd").html("专题大图片可用！");
                $("#pd").css({"color":"green"});
            }
            if (!content) {
                et = false;
                $("#ed").html("专题内容不能为空！");
                $("#ed").css({"color":"red"});
            } else {
                et = true;
                $("#ed").html("专题内容格式可用！");
                $("#ed").css({"color":"green"});
            }
            if (ut && et && pt) {

            } else {
                $(".alt").html("请确认数据验证完成后添加！").show().delay(1000).fadeOut(1000);
                return false;
            }
        });
    </script>
@endsection


