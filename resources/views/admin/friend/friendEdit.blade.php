@extends('admin.layouts.Index')
@section('title','美丽联合-添加分类')
@section('title-first','友情链接管理')
@section('title-second','修改友情链接')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        #af{
            background: white;
            padding: 15px;
            width: 60%;
            margin: 0px auto;
            border-top: 5px solid #3C8DBC;
            border-radius: 10px;
            background: white;
        }
    </style>
@endsection
@section('main')
    <form id="af" action="{{url('admin/friend/checkedit')}}" method="post">
        {{csrf_field()}}
        <h1 id="fh" style="text-align: center;padding-bottom: 5px;margin: 0 0 15px 0;color: #3399ff;border-bottom: 1px solid #e5e5e5">
            <span>修改友情链接</span>
            <a style="display: none;color:#ff890a;" href='{{url('admin/friend/show')}}' title='分类列表'>分类列表</a>
        </h1>
        <input type="hidden" name="id" value="{{$friend['id']}}">
        <div id="qd" style="text-align: center;font-size: 16px;">站点名称</div>
        <input id="qt" class="myinput-main" type="text" value="{{$friend['friend_name']}}" name="fname" placeholder="请输入站点名称">
        <div id="qd" style="text-align: center;font-size: 16px;">站点域名</div>
        <input id="qt" class="myinput-main" type="text" value="{{$friend['friend_link']}}" name="fside" placeholder="请输入站点域名">
        @if(!empty($errors->all()))
        <div style="line-height:45px;text-align: center;border-radius:6px;background:pink;color: darkred;width: 180px;height:45px;margin: 0 auto;">{{$errors->first()}}</div>
        @endif
        <input class="mysubmit-moon" type="submit" value="修改">
    </form>
@endsection