@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','专题分类管理')
@section('title-second','分类列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">专题分类列表</h3>
        <div style="padding:10px 0;">
            <div class="find">分类名称搜索：</div><input id="uf" class="myinput-main" type="text" value="">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            <a class="add" href="{{url('admin/themeCate/add')}}"><i class="fa fa-user-plus" title="添加分类"></i></a>
            <div class="clear"></div>
        </div>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>分类排序编号</th>
                <th>分类名称</th>
                <th>分类图片</th>
                <th style="border-right: 1px solid #3399ff;">操作</th>
            </tr>
            @foreach($data as $v)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{$v->sort_id}}</td>
                    <td>{{$v->cate_name}}</td>
                    <td>{{$v->cate_img}}</td>
                    <td>
                        <a class="active" href="{{url('admin/themeCate/edit').'/'.$v['id']}}">
                            <i class="fa fa-user-secret" title="修改分类"></i>
                        </a>
                        <a class="active" href="{{url('admin/themeCate/del').'/'.$v['id']}}">
                            <i class="fa fa-user-times" title="删除分类"></i>
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
    {{--用户无刷新搜索--}}
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

