@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','回答管理')
@section('title-second','回答列表')
@section('title','回答列表')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">回答列表</h3>
        <div style="padding:10px 0;">
            <div class="find">回答搜索：</div><input id="qf" class="myinput-main" value="" type="text">
            <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
            {{--<a class="add" href="##"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>--}}
            <div class="clear"></div>
        </div>
{{--        {{var_dump($qacomment)}}--}}
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;">ID</th>
                <th>问答编号</th>
                <th>用户编号</th>
                <th>评论编号</th>
                <th>评论内容</th>
                <th>点赞数</th>
                <th>发布时间</th>
                <th>是否显示</th>
            </tr>
            @foreach($qacomment as $v)
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$v->id}}</td>
                    <td>{{$v->qa_id}}</td>
                    <td>{{$v->user_id}}</td>
                    <td>{{$v->comment_id}}</td>
                    <td>{{$v->content}}</td>
                    <td>{{$v->good_num}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->issue_time)}}</td>
                    <td>{{$v->is_show}}</td>
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