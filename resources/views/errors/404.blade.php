@extends('web.layouts.index')
@section('title','404')
@section('style')
    <link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('body')
    <img src="{{asset('images/web/404.png')}}" style="display:block; width: 300px; margin: 0 auto; margin-top: 30px" />
@endforeach
