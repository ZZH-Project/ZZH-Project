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
		<form id="login" action="{{url('admin/go')}}" method="post">
			{{csrf_field()}}
		<div class="ad_login_wrap">
			<div class="ad_login_logo"><img src="{{asset('images/admin/admin_logo.png')}}" /></div>
			<ul class="ad_login_ul">
				<li>
					<div id="error0" class="ad_error_bar">
						<span>用户名或密码错误！</span>
					</div><!--ad_error_bar-->
				</li>
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_user.png')}}" class="ad_login_icon" />
						<input type="text" name="username" value="" placeholder="请输入用户名" class="ad_input_text" />
					</div><!--ad_input_text-->
				</li>
				<li>
					<div id="error1" class="ad_error_bar">
						<span></span>
					</div><!--ad_error_bar-->
				</li>
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_password.png')}}" class="ad_login_icon" />
						<input type="password" name="password" value="" placeholder="请输入密码" class="ad_input_text" />
					</div><!--ad_input_text-->
				</li>
				<li>
					<div id="error2" class="ad_error_bar">
						<span></span>
					</div><!--ad_error_bar-->
				</li>
				<li>
					<div class="ad_input_wrap">
						<img src="{{asset('images/admin/icon_validate.png')}}" class="ad_login_icon" />
						<input type="text" name="captcha" value="" placeholder="请输入验证码" class="ad_input_text special" />
						<div class="ad_validate"><img id="codeImg" style="cursor:pointer;" src="{{captcha_src('flat')}}" onclick="this.src=this.src+'?'+(new Date()).getTime();"/></div>
					</div><!--ad_input_text-->
				</li>
				<li>
					<div id="error3" class="ad_error_bar">
						<span></span>
					</div><!--ad_error_bar-->
				</li>
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
	<script src="{{asset('js/jQuery-1.8.3.min.js')}}"></script>
	<script>
		$("#login").submit(function () {
			$.ajax({
				url:"{{url('admin/check')}}",
				type:"post",
				data:$("#login").serialize(),
				dataType:"json",
				//laravel自带验证成功进入此处
				success:function(data){
				    var flag = data;
                    if (flag.a == 1) {
                        $("#error0").css({"display":"block"});
                        $("#error1").css({"display":"none"});
                        $("#error2").css({"display":"none"});
                        $("#error3").css({"display":"none"});
                        $("#codeImg").click();
                    } else if (flag.a == 2) {
						location.href='go';
                    }
				},
				//laravel自带验证失败进入此处
				error:function(msg){
					var json = JSON.parse(msg.responseText);
                    $("#error0").css({"display":"none"});
                    //显示用户名的错误框
                    if(json.username != null){
                        $("#error1 span").html(json.username);
                        $("#error1").css({"display":"block"});
                    } else if(json.username == null){
                        $("#error1").css({"display":"none"});
                    }
                    //显示用户名的错误框
                    if(json.password != null){
                        $("#error2 span").html(json.password);
                        $("#error2").css({"display":"block"});
                    } else if(json.password == null){
                        $("#error2").css({"display":"none"});
                    }
                    //显示用户名的错误框
                    if(json.captcha != null){
                        $("#error3 span").html(json.captcha);
                        $("#error3").css({"display":"block"});
						$("#codeImg").click();
                    } else if(json.captcha == null){
                        $("#error3").css({"display":"none"});
                    }
				}
			});
			return false;
		});
	</script>
</html>