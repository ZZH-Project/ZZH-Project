@extends('web.layouts.index')
@section('title','我的密保问题')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/base.css')}}" rel="stylesheet" />
	<link href="{{asset('css/web/login_zl.css')}}" rel="stylesheet" />
	<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
        $(function(){
            $(".btn_login").click(function(){
                $(".login_error_bar").slideToggle();
            });
        });
	</script>
@endsection
@section('body')
		<div class="body">
			<div class="login_logo"><img src="{{asset('images/web/login_logo.png')}}" /></div>
			<form id="forget" action="{{url('web/user/resetpass')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li style="border-bottom: none">
						<span style="color: darkslategray"><b>您的提问:</b></span><div style="color: slategray;padding: 10px;font-size: 16px">{{$question['question']}}</div>
					</li>
					<li style="border-bottom: none">
						<span style="color: darkslategray"><b>您的回答:</b></span><div style="color: slategray;padding: 10px;font-size: 16px">{{$question['answer']}}</div>
					</li>
					<li class="special login_tip">
						<a href="{{url('web/center/qaforget').'/'.$uid}}" class="a_forget">修改问题</a>
					</li>
			{{--<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>--}}
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
@endsection