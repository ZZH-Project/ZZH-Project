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
@endsection
@section('main')
    <div style="padding:10px 0;">
        <form id="af" action="#" onsubmit="return false">
            <input style="display: inline-block;margin: 0;" id="uf" class="myinput-main" type="text" placeholder="想搜啥搜啥">
            <input type="hidden" id="auser_id" value="{{session('auser')['id']}}">
            <input style="display: inline-block;margin: 0 0 0 10px;height: 45px;" type="submit" class="mysubmit-box1" value="搜一搜">
        </form>
    </div>
@endsection
@section('script')
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
@endsection