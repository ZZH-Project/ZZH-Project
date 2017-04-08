@extends('admin.layouts.Index')
@section('title','美丽联合-专题评论')
@section('title-first','专题评论管理')
@section('title-second','专题评论')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">专题评论列表</h3>
        <div style="padding:10px 0;">
            <div class="find">专题标题搜索：</div><input id="uf" class="myinput-main" type="text" value="">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>评论内容</th>
                <th>用户名称</th>
                <th>专题标题</th>
                <th>评论时间</th>
                <th>是否上线</th>
            </tr>
            @foreach($data as $v)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{$v->content}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->created_at}}</td>
                    <td>
                        <span class="show" style="cursor: pointer;" name="{{$v->id}}">
                            <svg class="icon icon_em_18" aria-hidden="true" style="color:{{$v->is_show == 1 ? 'green' : 'red'}};">
                                <use xlink:href="#front_icon-pinglun"></use>
                            </svg>
                        </span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@section('script')
    {{--实现隔行换色和鼠标移动变色--}}
    <script>
        $(".trd").mouseover(function () {
            $(this).find('td').css({"background":"#e5e5e5"});
        });
        $(".trd").mouseout(function () {
            $(this).find('td').css({"background":"white"});
        });
    </script>
    {{--点击显示--}}
    <script>
        $(".show").click(function () {
            var id = $(this).attr("name");
            $.ajax({
                url:"{{url('admin/themeComment/is')}}/"+id,
                type:"get",
                data:{"id":id},
                dataType:"string",
                success:function (data) {},
                error:function (msg) {
                    if (msg.responseText == 2) {
                        $(".show[name="+id+"] svg").css({'color':'red'});
                        $(".alt").html("评论已下线！").show().delay(500).fadeOut(500);
                    } else if(msg.responseText == 1) {
                        $(".show[name="+id+"] svg").css({'color':'green'});
                        $(".alt").html("评论已上线！").show().delay(500).fadeOut(500);
                    }
                }
            });
        });
    </script>
    {{--分类无刷新搜索--}}
    <script>
        $("#uf").keyup(function () {
            //获取输入的值
            var fv = $("#uf").val();
            var token = $(".token").val();
            $.ajax({
                url:"{{url('admin/themeList/show')}}",
                type:"post",
                data:{"fv":fv,"_token":token,'a':1},
                dataType:"string",
                success:function(data){},
                error:function (msg) {
                    //迷你视图
                    $tb = msg.responseText;
                    $(".tb").html($tb);
                }
            });
        });
    </script>
@endsection



