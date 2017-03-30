@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','问答管理')
@section('title-second','分类列表')
@section('title','问答管理')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">分类列表</h3>
        <div style="padding:10px 0;">
            <div class="find">分类搜索：</div><input id="uf" class="myinput-main" type="text">
            <a class="add" href="{{url('admin/comment/add')}}"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>分类名称</th>
                <th>分类排序</th>
                <th style="border-right: 1px solid #3399ff;">操作</th>
            </tr>
            @foreach($qalist as $qa)
            <tr class="trd">
                <td style="border-left: 1px solid #e5e5e5;">{{$qa['id']}}</td>
                <td>{{$qa['cate_name']}}</td>
                <td>{{$qa['sort_id']}}</td>
                <td><a href="{{url('admin/comment/edit')}}"><i class="fa fa-fw fa-pencil" title="修改"></i></a><a href="{{url('admin/comment/del')}}"><i class="fa fa-fw fa-trash" title="删除"></i></a></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" style="border-left: 1px solid #e5e5e5;">
                    {{$qalist->links('public.zj_page')}}
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
                data:{"fv":fv},
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
    {{--无刷新分页--}}
    <script>
        $(".pagination a").click(function(){
            $.ajax({
                url:"{{url('admin/comment/show?$page')}}",
                type:"get",
                data:{},
                dataType:"json",
                success:function(data){
                    console.log(data);
                    alert(1111);
                },
                error:function (msg) {
                    console.log(JSON.parse(msg));
                    alert(2222);
                }
            });
        });
    </script>
@endsection