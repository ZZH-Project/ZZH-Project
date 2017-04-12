@extends('web.layouts.index')
@section('title','回答问题')
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
			<form id="forget" action="{{url('web/user/answerval')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<span class="input_text">{{$question['question'].'?'}}</span>
						<input type="hidden" name="question" value="{{$question['question']}}">
						<input type="hidden" name="wuid" value="{{$question['wuid']}}">
					</li>
					<li>
						<input type="text" value="" placeholder="请输您的回答" class="input_text" name="answer"/>
					</li>
					<li>
						<input type="password" value="" placeholder="请输入新密码" class="input_text" name="password"/>
					</li>
					@if($status == 1)
					<li style="background: pink;border-bottom: none;height: 20px;color: darkred;text-align: center;border-radius: 5px;">请填写问题和密码</li>
					@elseif($status == 2)
					<li style="background: pink;border-bottom: none;height: 20px;color: darkred;text-align: center;border-radius: 5px;">问题回答错误</li>
					@endif
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="提交" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			</form>
			{{--<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>--}}
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
@endsection