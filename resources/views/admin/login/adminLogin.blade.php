<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>美丽联合后台登录</title>
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet">
		<link href="{{asset('css/admin/admin_base_zl.css')}}" type="text/css" rel="stylesheet">
	</head>
	<body>
		<div class="ad_login_bg">
			<img src="{{asset('images/admin/admin_login.jpg')}}" />
		</div><!--ad_login_bg-->
		<form action="{{url('admin/check')}}" method="post">
			{{csrf_field()}}
		<div class="ad_login_wrap">
			<div class="ad_login_logo"><img src="{{asset('images/admin/admin_logo.png')}}" /></div>
			<ul class="ad_login_ul">
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_user.png')}}" class="ad_login_icon" />
<<<<<<< HEAD
						<input type="text" name="username" value="" placeholder="请输入用户名" class="ad_input_text" />
=======
						<input type="text" name="user" value="" placeholder="请输入用户名" class="ad_input_text" />
>>>>>>> 424c07ab5d308ec9162abd800867bba0136934c2
					</div><!--ad_input_text-->
				</li>
				@if(!empty($errors->get('username')))
				<li>
					<div class="ad_error_bar">
						<span>{{$errors->get('username')[0]}}</span>
					</div><!--ad_error_bar-->
				</li>
				@endif
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_password.png')}}" class="ad_login_icon" />
<<<<<<< HEAD
						<input type="password" name="password" value="" placeholder="请输入密码" class="ad_input_text" />
=======
						<input type="password" name="pass" value="" placeholder="请输入密码" class="ad_input_text" />
>>>>>>> 424c07ab5d308ec9162abd800867bba0136934c2
					</div><!--ad_input_text-->
				</li>
				@if(!empty($errors->get('password')))
					<li>
						<div class="ad_error_bar">
							<span>{{$errors->get('password')[0]}}</span>
						</div><!--ad_error_bar-->
					</li>
				@endif
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_validate.png')}}" class="ad_login_icon" />
<<<<<<< HEAD
						<input type="text" name="captcha" value="" placeholder="请输入验证码" class="ad_input_text special" />
						<div class="ad_validate"><img style="cursor:pointer;" src="{{captcha_src('flat')}}" onclick="this.src=this.src+'?'+(new Date()).getTime()"/></div>
=======
						<input type="text" name="code" value="" placeholder="请输入验证码" class="ad_input_text special" />
						<div class="ad_validate"><img style="cursor:pointer;" src="{{asset('code/code.php')}}" onclick="this.src=this.src+'?'+(new Date()).getTime()"/></div>
>>>>>>> 424c07ab5d308ec9162abd800867bba0136934c2
					</div><!--ad_input_text-->
				</li>
				@if(!empty($errors->get('captcha')))
					<li>
						<div class="ad_error_bar">
							<span>{{$errors->get('captcha')[0]}}</span>
						</div><!--ad_error_bar-->
					</li>
				@endif
				<li>
					<input type="checkbox" class="ad_input_checkbox" />
					<span class="ad_span">记住密码</span>
				</li>
				<li><input type="submit" value="登    录" class="ad_input_submit" /></li>
			</ul>
		</div><!--ad_login_wrap-->
		</form>
		{{--<div class="ad_login_footer">Copyright © 2006-2017 .All rights reserved.</div><!--ad_login_footer-->--}}
	</body>
</html>