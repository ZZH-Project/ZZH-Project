@extends('admin.layouts.Index')
@section('title','美丽联合-后台首页')
@section('title-first','后台')
@section('title-second','后台首页')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        .myinput-main:hover {
            border: 2px solid #8CD352;
        }

        .myinput-main:focus {
            border: 2px solid #ff6700;
        }
        #af{
            padding-bottom:10px;
            text-align: center;
            border-bottom: 1px dashed #9cbf91;
            overflow: hidden;
        }
    </style>
    <script src="{{asset('js/Chart.js-1.1.1/Chart.js')}}" type="text/javascript"></script>
@endsection
@section('main')
    <div style="padding:10px 0;">
        <form id="af" action="#" onsubmit="return false">
            <input style="display: inline-block;margin: 0;" id="uf" class="myinput-main" type="text" placeholder="想搜啥搜啥">
            <input type="hidden" id="auser_id" value="{{session('auser')['id']}}">
            <input style="display: inline-block;margin: 0 0 0 10px;height: 45px;" type="submit" class="mysubmit-box1" value="搜一搜">
        </form>
    </div>
    <div style="text-align: center;padding: 10px 0;font-size: 16px;">用户角色统计</div>
    <canvas id="auser" height="300" width="1089" style="margin: 0 auto;display: block;"></canvas>
    <div style="text-align: center;padding: 10px 0;font-size: 16px;">专题统计</div>
    <canvas id="theme" height="300" width="1089" style="margin: 0 auto;display: block;"></canvas>
@endsection
@section('script')
    {{--图灵机器人--}}
    <script>
        $("#af").submit(function () {
            //获取ID
            var id = $("#auser_id").val();
            //获取内容
            var content = $("#uf").val();
            $.ajax({
                url:"http://www.tuling123.com/openapi/api",
                type:"post",
                data:{
                    "key":"c543b72111054c729744fee412b9260b",
                    "info":content,
                    "userid":id,
                },
                success:function (data) {
                    if (data.url == null) {
                        $("#show").html(data.text).show(1000);
                    } else {
                        location.href=data.url;
                    }
                },
            });
        });
    </script>
    <script>
        $(window).click(function () {
            $("#show").click(function () {
                return false;
            });
            $("#show").hide();
        });
    </script>
    {{--图表--}}
    <script>
        //请求用户数据
        var acount = new Array;
        var adname = new Array;
        $.ajax({
            url:"{{url('admin/data')}}",
            type:"get",
            data:{'a':"auser"},
            dataType:"json",
            async:false,
            success:function (data) {
                for (i = 0;i < data.length;i ++) {
                    acount.push(data[i].num);
                    (data[i].display_name == null) ? adname.push('无角色') :adname.push(data[i].display_name);
                }
            },
        });
        var data = {
            labels : adname,
            datasets : [
                {
                    fillColor : "rgba(207,232,204,0.8)",
                    strokeColor : "#b0b0b0",
                    pointColor : "#3399ff",
                    pointStrokeColor : "#fff",
                    data : acount
                }
            ]
        }
        //Get the context of the canvas element we want to select
        var ctx = document.getElementById("auser").getContext("2d");
        new Chart(ctx).Line(data);


        //请求专题数据
        var tcount = new Array;
        var tdname = new Array;
        $.ajax({
            url:"{{url('admin/data')}}",
            type:"get",
            data:{'a':"theme"},
            dataType:"json",
            async:false,
            success:function (data) {
                for (i = 0;i < data.length;i ++) {
                    (data[i].good_num == null) ? tcount.push(0) :tcount.push(data[i].good_num);
                    tdname.push(data[i].title);
                }
            },
        });
        var data = {
            labels : tdname,
            datasets : [
                {
                    fillColor : "rgba(207,232,204,0.8)",
                    strokeColor : "#b0b0b0",
                    pointColor : "#3399ff",
                    pointStrokeColor : "#fff",
                    data : tcount
                }
            ]
        }
        //Get the context of the canvas element we want to select
        var ctx = document.getElementById("theme").getContext("2d");
        new Chart(ctx).Bar(data);
    </script>
@endsection