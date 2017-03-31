@extends('admin.layouts.Index')
@section('title','美丽联合-权限列表')
@section('title-first','权限管理')
@section('title-second','权限列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
    <style>
        .tb tr th{
            text-align: left;
        }
        .tb tr td{
            text-align: left;
        }
    </style>
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
                <th style="text-align: center">菜单栏显示</th>
                <th style="border-right: 1px solid #3399ff;text-align: center;">权限操作</th>
            </tr>
            @foreach($data as $v)
                @if ($v->parent_id == 0)
                <tr class="ftrd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{$v->display_name}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->description}}</td>
                    @if($v->is_menu == 0)
                    <td style="color: red;text-align: center;">否</td>
                    @elseif($v->is_menu == 1)
                    <td style="color: green;text-align: center;">是</td>
                    @endif
                    <td style="text-align: center">
                        <a class="active" href="{{url('admin/permission/edit').'/'.$v->id}}">
                            <i class="fa fa-wrench" title="修改权限"></i>
                        </a>
                        <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                            <i class="fa fa-trash" title="删除权限"></i>
                        </a>
                    </td>
                </tr>
                @else
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{str_repeat('~', 3*$v->count).$v->display_name}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->description}}</td>
                    @if($v->is_menu == 0)
                        <td style="color: red;text-align: center;">否</td>
                    @elseif($v->is_menu == 1)
                        <td style="color: green;text-align: center;">是</td>
                    @endif
                    <td style="text-align: center">
                        <a class="active" href="{{url('admin/permission/edit').'/'.$v->id}}">
                            <i class="fa fa-wrench" title="修改权限"></i>
                        </a>
                        <a class="active del" href="javascript:void(0)" name="{{$v->id}}">
                            <i class="fa fa-trash" title="删除权限"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
@section('script')
    {{--删除权限--}}
    <script>
        $(".del").click(function () {
            //获取点击的id
            var id = $(this).attr("name");
            $.ajax({
                url:"{{url('admin/permission/del')}}/"+id,
                type:"get",
                data:{"id":id},
                dataType:"string",
                success:function (data) {},
                error:function (msg) {
                    if (msg.responseText == 1) {
                        $(".alt").html("该路由下面有子路由无法删除！").show().delay(500).fadeOut(500);
                    } else if (msg.responseText == 2) {
                        $(".del[name="+id+"]").parent('td').parent('tr').remove();
                        $(".alt").html("路由删除成功！").show().delay(500).fadeOut(500);
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

