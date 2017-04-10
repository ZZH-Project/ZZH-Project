@extends('admin.layouts.Index')
@section('title','美丽联合-实时消息')
@section('title-first','消息')
@section('title-second','实时消息')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        #info{
            padding:10px;
            border: 2px dashed pink;
            border-radius: 5px;
        }
        #say{
            overflow-y:auto;
            max-height:400px;
            padding:10px;
            margin:5px 0px;
            border:1px solid orange;
        }
        #top{
            font-size: 16px;
        }
        #aname{
            color: #3399ff;
        }
        #atime{
            color:#b0b0b0;
        }
        #bottom{
            font-size: 18px;
            text-indent: 20px;
            border-bottom: 1px dotted purple;
            padding:5px 0;
        }
    </style>
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <div style="font-size: 24px;text-align: center;color: black;">实时消息</div>
        <div id="info">
            <div id="say">
                @foreach($data as $v)
                    <div id="top" style="overflow: hidden;">
                        <div id="aname" style="float: left;">{{$v->username}}</div>
                        <div id="atime" style="float: right;">{{$v->created_at}}</div>
                    </div>
                    <div id="bottom">{{$v->content}}</div>
                @endforeach
            </div>
            <div>
                <form id="iff" action="#" style="position: relative;overflow: hidden">
                    <input id="uf" class="myinput-main" type="text" name="content" style="display: inline-block;width: 90%;float: left;;margin:0;" placeholder="请输入消息">
                    <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="mysubmit-circle" value="发送" style="display: inline-block;float: right;margin:0;height: 45px;width: 45px;font-size: 14px;">
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--遍历消息--}}
    <script>
        //保持滚动条在最低端
        $('#say').scrollTop($('#say')[0].scrollHeight);
        function infos() {
            $.ajax({
                url:"{{url("admin/info")}}",
                type:"get",
                data:{'a':1},
                success:function (data) {
                    //获取mini视图
                    var infos = data;
                    $("#say").html(infos);
                }
            });
        }
        setInterval(infos,1000);
    </script>
    {{--发送消息--}}
    <script>
        $("#iff").submit(function () {
            //获取表单内容
            var content = $("#uf").val();
            if (!content) {
                $(".alt").html("消息不能为空！").show().delay(500).fadeOut(500);
                return false;
            }
            $.ajax({
                url:"{{url("admin/send")}}",
                type:"get",
                ansyc:false,
                data:{'content':content},
                success:function (data) {
                    if (data == 1) {
                        //清空消息
                        $("#uf").val('');
                    }
                },
                error:function (msg) {

                },
            });
            return false;
        });
    </script>
@endsection
