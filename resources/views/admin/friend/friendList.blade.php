@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','友情链接管理')
@section('title-second','友情链接列表')
@section('title','友情链接列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">友情链接列表</h3>
        <div style="padding:10px 0;">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            {{--<a class="add" href="##"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>--}}
            <div class="clear"></div>
        </div>
        {{--{{var_dump($qalists)}}--}}
        <a class="add" href="{{url('admin/friend/add')}}"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>站点名称</th>
                <th>站点链接</th>
                <th>操作</th>
            </tr>
            @foreach($flists as $flist)
            <tr class="trd">
                <td style="border-left: 1px solid #e5e5e5;">{{$flist['id']}}</td>
                <td>{{$flist['friend_name']}}</td>
                <td>{{$flist['friend_link']}}</td>
                <td>
                    <a href="{{url('admin/friend/edit').'/'.$flist['id']}}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                    <a href="{{url('admin/friend/del').'/'.$flist['id']}}"><i class="fa fa-fw fa-trash" title="删除"></i></a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="border-left: 1px solid #e5e5e5;">
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