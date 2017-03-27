<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户注册</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" rel="stylesheet" />
		<link href="{{asset('css/web/login_zl.css')}}" rel="stylesheet" />
		<link href="{{asset('css/web/login_hff.css')}}" rel="stylesheet" />
{{--		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />--}}
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$('.checkbox').click(function(){
					$(this).parent().toggleClass('checkbox_bar_on');
				});
				$(".btn_login").click(function(){
					$(".login_error_bar").slideToggle();
				});
			});
		</script>
	</head>
	<body>
		{{--@if(count($errors)>0)--}}
			{{--<div class="alert alert-danger">--}}
				{{--<ul>--}}
					{{--@foreach($errors->all() as $error)--}}
						{{--<li>{{$error}}</li>--}}
					{{--@endforeach--}}
				{{--</ul>--}}
			{{--</div>--}}
		{{--@endif--}}
		<div class="body">
			<div class="login_logo"><img src="{{asset('images/web/login_logo.png')}}" /></div>
			<form id="register" action="{{url('web/check')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<img src="{{asset('images/web/icon_phone.png')}}" class="login_icon" />
						<input type="text" name="username" placeholder="请输入用户名" class="input_text" />
					</li>
					@if(count($errors)>0)
						<div class="error-alert"><span>* </span>{{$errors->first('username')}}</div>
					@endif
					<li>
						<img src="{{asset('images/web/icon_password.png')}}" class="login_icon" />
						<input type="text" name="password" placeholder="请输入6-20个字符的密码" class="input_text" />
					</li>
					@if(count($errors)>0)
						<div class="error-alert"><span>* </span>{{$errors->first('password')}}</div>
					@endif
					<li>
						<img src="{{asset('images/web/icon_validate.png')}}" class="login_icon"  />
						<input type="text" name="captcha" placeholder="请输入验证码" class="input_text" />
						<img src="{{Captcha::src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" class="validate_code"  />
						{{--<a href="#" class="validate_code">获取验证码</a>--}}
					</li>
					@if(count($errors)>0)
						<div class="error-alert"><span>* </span>{{$errors->first('captcha')}}</div>
					@endif
					<li class="special login_tip">
						<div class="checkbox_bar special">
							<input type="checkbox" class="checkbox" id="checkbox" /><label for="checkbox">我已阅读并且同意<a href="#">《美丽网络服务使用协议》</a></label>
						</div>
					</li>
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="注    册" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			</form>
			<a href="{{url('web/login')}}" class="a_register special">已有账号？立即登录</a>
			<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
	</body>
	<script>
		console.log($('#register'));
	</script>
</html>
