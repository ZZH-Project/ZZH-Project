<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户登录</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" rel="stylesheet" />
		<link href="{{asset('css/web/login_zl.css')}}" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
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
		<div class="body">
			<div class="login_logo"><img src="{{asset('images/web/login_logo.png')}}" /></div>
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<img src="{{asset('images/web/icon_phone.png')}}" class="login_icon" />
						<input type="text" placeholder="请输入手机号" class="input_text" />
					</li>
					<li>
						<img src="{{asset('images/web/icon_password.png')}}" class="login_icon" />
						<input type="password" placeholder="请输入密码" class="input_text" />
					</li>
					<li>
						<img src="{{asset('images/web/icon_validate.png')}}" class="login_icon"  />
						<input type="text" placeholder="请输入验证码" class="input_text" />
						<img src="{{asset('images/web/icon_code.jpg')}}" class="login_code" />
					</li>
					<li class="special login_tip">
						<div class="checkbox_bar">
							<input type="checkbox" class="checkbox" id="checkbox" /><label for="checkbox">记住密码</label>
						</div>
						<a href="{{url('web/forget')}}" class="a_forget">忘记密码?</a>
					</li>
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="登    录" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			<a href="{{url('web/register')}}" class="a_register">立即注册</a>
			<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>
			<div class="login_error_bar">手机号或密码错误</div>
		</div><!--body-->
	</body>
</html>
