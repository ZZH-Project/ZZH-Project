@extends('admin.layouts.Index')
@section('title','美丽联合-实时消息')
@section('title-first','消息')
@section('title-second','实时消息')
@section('style')
    <link rel="stylesheet" href="{{asset('css/admin/admin_userList_zj.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/admin_mycss1_zj.css')}}">
    <style>
        #info{
            padding:10px;
            border:2px solid #b7b7b7;
            border-radius: 5px;
        }
        #say{
            overflow-y:auto;
            max-height:400px;
            padding:5px;
            margin:5px 0px;
            border:2px solid orange;
            border-radius: 5px;
        }
    </style>
@endsection
@section('main')
    <div style="background: white;padding: 0 10px 25px 10px;">
        <div style="font-size: 26px;text-align: center;color: black;">实时消息</div>
        <div id="info">
            <div id="say">
                
            </div>
            <div>
                <form action="#" style="position: relative;overflow: hidden">
                    <input id="uf" class="myinput-main" type="text" style="display: inline-block;width: 90%;float: left;;margin:0;" placeholder="请输入消息">
                    <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="mysubmit-circle" value="发送" style="display: inline-block;float: right;margin:0;height: 45px;width: 45px;font-size: 14px;">
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
