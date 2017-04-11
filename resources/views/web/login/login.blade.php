@extends('web.layouts.index')
@section('title','登录')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/base.css')}}" rel="stylesheet" />
	<link href="{{asset('css/web/login_zl.css')}}" rel="stylesheet" />
	<link href="{{asset('css/web/login_hff.css')}}" rel="stylesheet" />
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
@endsection
@section('body')

	<body>
		<div class="body">
			<div class="login_logo"><img src="{{asset('images/web/login_logo.png')}}" /></div>
			<form id="login" action="{{url('web/user/logincheck')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<img src="{{asset('images/web/icon_phone.png')}}" class="login_icon" />
						<input name="username" type="text" placeholder="请输入手机号" class="input_text" value="{{Cache::get('savewuser')['username']}}" />
					</li>
					<div id="error1" class="error-alert"></div>
					<li>
						<img src="{{asset('images/web/icon_password.png')}}" class="login_icon" />
						<input name="password" type="password" placeholder="请输入密码" class="input_text" value="{{Cache::get('savewuser')['password']}}"/>
					</li>
					<div id="error2" class="error-alert"></div>
					<li>
						<img src="{{asset('images/web/icon_validate.png')}}" class="login_icon"  />
						<input name="captcha" type="text" placeholder="请输入验证码" class="input_text" />
						<img src="{{captcha_src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" class="validate_code" />
					</li>
					<div id="error3" class="error-alert"></div>
					<li class="special login_tip">
						{{--session中存有用户信息显示勾--}}
						@if(!empty(Cache::get('savewuser')))<div class="checkbox_bar checkbox_bar_on">@else<div class="checkbox_bar">@endif
						{{--session中存有用户信息默认选中--}}
						@if(!empty(Cache::get('savewuser')))
						<input name="is_save" type="checkbox" class="checkbox" id="checkbox" value="1" checked/><label for="checkbox">记住密码</label>
						@else
						<input name="is_save" type="checkbox" class="checkbox" id="checkbox" value="1" /><label for="checkbox">记住密码</label>
						@endif
						</div>
						<a href="{{url('web/user/forget')}}" class="a_forget">忘记密码?</a>
					</li>
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="登    录" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			</form><!-- login -->
			<a href="{{url('web/user/register')}}" class="a_register">立即注册</a>
			<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
	<script src="{{asset('js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
	<script>
		//给form表单绑定提交事件
		$("#login").submit(function(){
		//用ajax请求验证数据
		    $.ajax({
				url:"{{url('web/user/logincheck')}}",//请求的路由
				type:'post',//请求的类型
				data:$("#login").serialize(),//序列化表单中的数据
				datatype:'json',
				//请求成功时的方法，data是请求返回的json字符串
				success:function(data){
                    $("#error1").css({'display':'none'});
                    $("#error2").css({'display':'none'});
                    $("#error3").css({'display':'none'});
//                    alert(1111);
					//将json字符串转换为对象
                    $res = JSON.parse(data);
					//如果返回的信息为2说明用户名或者密码不正确
                    if($res.a == 2){
                        $("#error2").css({'display':'block'});
                        $("#error2").html('用户名密码错误');
					//如果返回的信息为1说明用户名密码匹配成功
					}else if($res.a == 1){
                        location.href="{{url("web/index")}}";
					}else if($res.a == 9){
                        $("#error3").css({'display':'block'});
                        $("#error3").html('您被禁止登录');
					}
				},
				//请求失败时的方法
				//msg返回的错误信息
				error:function(msg){
					//将返回错误的json字符串转换为对象
					var json = JSON.parse(msg.responseText);
//					console.log(json);
					//如果username的错误信息不为空显示错误信息
					if(json.username != null){
						$("#error1").html(json.username);
						$("#error1").css({'display':'block'});
					//如果username的错误信息为空隐藏错误信息
					}else if(json.username == null){
						$("#error1").css({'display':'none'});
					}
                    //如果password的错误信息不为空显示错误信息
                    if(json.password != null){
                        $("#error2").html(json.password);
                        $("#error2").css({'display':'block'});
                        //如果password的错误信息为空隐藏错误信息
                    }else if(json.password == null){
                        $("#error2").css({'display':'none'});
                    }
                    //如果captcha的错误信息不为空显示错误信息
                    if(json.captcha != null){
                        $("#error3").html(json.captcha);
                        $("#error3").css({'display':'block'});
                        //如果captcha的错误信息为空隐藏错误信息
                    }else if(json.captcha == null){
                        $("#error3").css({'display':'none'});
                    }
				}
			});
		    return false;
		});
	</script>
@endsection
