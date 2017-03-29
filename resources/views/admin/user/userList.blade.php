@extends('admin.layouts.Index')
@section('title','美丽联合-用户列表')
@section('title-first','用户管理')
@section('title-second','用户列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px;padding-bottom: 25px;">
    <table class="tb">
        <caption><h3>用户列表</h3></caption>
        <caption>
            <div class="find">用户搜索：</div><input id="uf" class="myinput-main" type="text">
            <a class="add" href="{{url('admin/user/add')}}"><i class="fa fa-user-plus" title="添加用户"></i></a>
            <div class="clear"></div>
        </caption>
        <tr>
            <th style="border-left: 1px solid #3399ff;">ID</th>
            <th>用户名</th>
            <th>角色</th>
            <th>邮箱</th>
            <th style="border-right: 1px solid #3399ff;">用户操作</th>
        </tr>
        @foreach($data as $v)
        <tr class="trd">
            <td style="border-left: 1px solid #e5e5e5;">{{$v['id']}}</td>
            <td>{{$v['username']}}</td>
            <td>{{$v['role'] != null ? $v['role'] : '无'}}</td>
            <td>{{$v['email'] != null ? $v['email'] : '无'}}</td>
            <td>
                <a class="active" href="{{url('admin/user/edit').'/'.$v['id']}}/{{isset($_GET['page']) ? $_GET['page'] : 1}}">
                    <i class="fa fa-user-secret" title="修改信息"></i>
                </a>
                <a class="active" href="{{url('admin/user/del').'/'.$v['id']}}">
                    <i class="fa fa-user-times" title="删除用户"></i>
                </a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" style="border-left: 1px solid #e5e5e5;">
                {{$data->links('public.zj_page')}}
            </td>
        </tr>
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
    {{--用户搜索--}}
    <script>
        $("#uf").keyup(function () {
            //获取输入的值
            var fv = $("#uf").val();
            $.ajax({
                url:"{{url('admin/user/find')}}",
                type:"get",
                data:fv,
                dataType:"json",
                success:function(data){

                },
            });
        });
    </script>
@endsection
