@extends('admin.layouts.Index')
@section('title','美丽联合-角色列表')
@section('title-first','角色管理')
@section('title-second','角色列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        .myinput-main {
            width: 150px;
            height: 30px;
            font-size: 14px;
            text-align: center;
            padding: 5px 10px;
            border: 2px solid #3FB5DD;
            border-radius: 10px;
            background: #fafafa;
            outline: none;
            display: inline-block;
            margin: 0;
            transition: border 0.3s linear;
        }
    </style>
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">角色列表</h3>
        <div style="padding:10px 0;">
            <div class="find">角色搜索：</div><input id="uf" class="myinput-main" type="text" value="">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            <a class="add" href="{{url('admin/role/add')}}"><i class="fa fa-plus" title="添加角色"></i></a>
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>角色标识</th>
                <th>角色名称</th>
                <th>描述</th>
                <th>拥有权限</th>
                <th style="border-right: 1px solid #3399ff;text-align: center;">角色操作</th>
            </tr>
            @foreach($data as $v)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->display_name}}</td>
                    <td>{{$v->description}}</td>
                    <td>{{$v->dname}}管理</td>
                    <td style="text-align: center">
                        <a class="active" href="{{url('admin/role/edit').'/'.$v->id}}">
                            <i class="fa fa-wrench" title="修改角色"></i>
                        </a>
                        <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                            <i class="fa fa-trash" title="删除角色"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@section('script')
    {{--删除角色--}}
    <script>
        $(".del").click(function () {
            //获取点击的id
            var id = $(this).attr("name");
            $.ajax({
                url:"{{url('admin/role/del')}}/"+id,
                type:"get",
                data:{"id":id},
                dataType:"string",
                success:function (data) {},
                error:function (msg) {
                    if (msg.responseText == 2) {
                        $(".del[name="+id+"]").parent('td').parent('tr').remove();
                        $(".alt").html("角色删除成功！").show().delay(500).fadeOut(500);
                    }
                }
            });
        });
    </script>
    {{--实现隔行换色和鼠标移动变色--}}
    <script>
        $(".ftrd").find('td').css({"background":"#faf094"});
        $(".trd").mouseover(function () {
            $(this).find('td').css({"background":"#e5e5e5"});
        });
        $(".trd").mouseout(function () {
            $(this).find('td').css({"background":"white"});
        });
    </script>
    {{--角色无刷新搜索--}}
    <script>
        $("#uf").keyup(function () {
            //获取输入的值
            var fv = $("#uf").val();
            var token = $(".token").val();
            $.ajax({
                url:"{{url('admin/role/show')}}",
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

