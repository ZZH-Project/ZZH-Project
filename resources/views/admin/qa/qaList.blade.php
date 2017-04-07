@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','问答管理')
@section('title-second','问答列表')
@section('title','问答列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">问答列表</h3>
        <div style="padding:10px 0;">
            <div class="find">问题搜索：</div><input id="qf" class="myinput-main" value="" type="text">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            {{--<a class="add" href="##"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>--}}
            <div class="clear"></div>
        </div>
        {{--{{var_dump($qalists)}}--}}
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>问答标题</th>
                <th>用户名</th>
                <th>问答分类</th>
                <th>点赞数</th>
                <th>发布时间</th>
                <th>是否显示</th>
                <th>问答详情</th>
            </tr>
            @foreach($qalists as $qalist)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$qalist->id}}</td>
                    <td>{{$qalist->title}}</td>
                    <td>{{$qalist->user_id}}</td>
                    <td>{{$qalist->cate_name}}</td>
                    <td>{{$qalist->good_num}}</td>
                    <td>{{date('Y-m-d H:m:s',$qalist->issue_time)}}</td>
                    <td>{{$qalist->is_show}}</td>
                    <td><a href="{{url("admin/qa/showcontent").'/'.$qalist->id}}"><i class="fa fa-fw fa-align-justify"></i></a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="8" style="border-left: 1px solid #e5e5e5;">
{{--                        {{$qalist->appends(['fv'=>$fv])->links('public.zj_page')}}--}}
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