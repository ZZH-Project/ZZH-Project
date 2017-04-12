@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','会员管理')
@section('title-second','会员列表')
@section('title','会员列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">会员列表</h3>
        <div style="padding:10px 0;">
            <div class="find">会员搜索：</div><input id="qf" class="myinput-main" value="" type="text">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            {{--<a class="add" href="##"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>--}}
            <div class="clear"></div>
        </div>
        {{--{{var_dump($qalists)}}--}}
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>手机号</th>
                <th>会员昵称</th>
                <th>性别</th>
                <th>头像</th>
                <th>是否允许登录</th>
            @foreach($users as $user)
            </tr>
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->wusername}}</td>
                    <td>{{$user->sex}}</td>
                    <td><img src="{{$user->pic == null ? '' : url($user->pic)}}" width="50px" height="50px"></td>
                    @if($user->is_load==1)
                    <td><a href="{{url('admin/member/isLoad').'/'.$user->id.'/'.$user->is_load}}"><i class="fa fa-fw fa-check"></i></a></td>
                    @else
                    <td><a href="{{url('admin/member/isLoad').'/'.$user->id.'/'.$user->is_load}}"><i class="fa fa-fw fa-close"></i></a></td>
                    @endif
                </tr>
            <tr>
            @endforeach
                <td colspan="8" style="border-left: 1px solid #e5e5e5;">
{{--                        {{$qalists->links()}}--}}
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $("#qf").keyup(function () {
            //获取输入的值
            var fv = $("#qf").val();
            var token = $(".token").val();
            $.ajax({
                url:"{{url('admin/qa/find')}}",
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