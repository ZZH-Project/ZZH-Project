@extends('admin.layouts.Index')
@section('title','美丽联合-权限列表')
@section('title-first','权限管理')
@section('title-second','权限列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">权限列表</h3>
        <div style="padding:10px 0;">
            <div class="find">权限搜索：</div><input id="uf" class="myinput-main" type="text" value="{{$fv}}">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            <a class="add" href="{{url('admin/permission/add')}}"><i class="fa fa-plus" title="添加权限"></i></a>
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>权限名称</th>
                <th>权限路由</th>
                <th>描述</th>
                <th>是否为菜单</th>
                <th style="border-right: 1px solid #3399ff;">权限操作</th>
            </tr>
            @foreach($data as $v)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v['id']}}</td>
                    <td>{{$v['display_name']}}</td>
                    <td>{{$v['name']}}</td>
                    <td>{{$v['description']}}</td>
                    <td>{{$v['is_menu'] == 0 ? '否' : '是'}}</td>
                    <td>
                        <a class="active" href="{{url('admin/permission/edit').'/'.$v['id']}}/{{$fv}}">
                            <i class="fa fa-user-secret" title="修改权限"></i>
                        </a>
                        <a class="active" href="{{url('admin/permission/del').'/'.$v['id']}}">
                            <i class="fa fa-user-times" title="删除权限"></i>
                        </a>
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
    {{--权限无刷新搜索--}}
    <script>
        $("#uf").keyup(function () {
            //获取输入的值
            var fv = $("#uf").val();
            var token = $(".token").val();
            $.ajax({
                url:"{{url('admin/user/find')}}",
                type:"post",
                data:{"fv":fv,"_token":token},
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

