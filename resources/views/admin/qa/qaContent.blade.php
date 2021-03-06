@extends('admin.layouts.Index')
@section('title','美丽联合-分类列表')
@section('title-first','问答管理')
@section('title-second','问答内容')
@section('title','问答内容')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <h3 style="padding-top: 20px;color: #3399ff;">问答内容</h3>
        <div style="padding:10px 0;">
            {{--<div class="find">问题搜索：</div><input id="qf" class="myinput-main" value="" type="text">--}}
            {{--<a class="add" href="##"><i class="fa fa-fw fa-plus" title="添加分类"></i></a>--}}
            <div class="clear"></div>
        </div>
{{--        {{var_dump($qacont  ent)}}}--}}
        <table class="tb">
            <tr>
                <th style="border-left: 1px solid #3399ff;width: 150px;">显示状态</th>
                <th style="width: 150px;">问答标题</th>
                <th>问答内容</th>
            </tr>
                <tr class="trd">
                    <td style="border-left: 1px solid #e5e5e5;">{{$qacontent['is_show']}}</td>
                    <td>{{$qacontent['title']}}</td>
                    <td>{{$qacontent['content']}}</td>
                </tr>
            <tr>
                <td colspan="8" style="border-left: 1px solid #e5e5e5;">
                    <a href="{{url('admin/qa/switch').'/'.$qacontent['id'].'/'.($qacontent['is_show']==1?0:1)}}"><i class="fa fa-fw fa-retweet" title="切换状态"></i></a>
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('script')

@endsection