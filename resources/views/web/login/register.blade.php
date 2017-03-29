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
			<form id="register" action="{{url('web/user/regcheck')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<img src="{{asset('images/web/icon_phone.png')}}" class="login_icon" />
						<input type="text" name="username" placeholder="请输入手机号" class="input_text" />
					</li>
					{{--@if(count($errors)>0)--}}
						<div id="error1" class="error-alert"></div>
					{{--@endif--}}
					<li>
						<img src="{{asset('images/web/icon_password.png')}}" class="login_icon" />
						<input type="password" name="password" placeholder="请输入6-20个字符的密码" class="input_text" />
					</li>
					{{--@if(count($errors)>0)--}}
						<div id="error2" class="error-alert"></div>
					{{--@endif--}}
					<li>
						<img src="{{asset('images/web/icon_validate.png')}}" class="login_icon"  />
						<input type="text" name="captcha" placeholder="请输入验证码" class="input_text" />
						<a id="send-code" href="#" class="validate_code">获取验证码</a>
{{--						<img src="{{Captcha::src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" class="validate_code"  />--}}
						{{--<a href="#" class="validate_code">获取验证码</a>--}}
					</li>
{{--					@if(count($errors)>0)--}}
						<div id="error3" class="error-alert"></div>
					{{--@endif--}}
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
			<a href="{{url('web/user/login')}}" class="a_register special">已有账号？立即登录</a>
			<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
	</body>
	{{--手机注册--}}
	<script>
        //增加判断表示
        var flag = true;
        $("#send-code").click(function () {
            if (flag == false) {
                return;
            }
            //获取电话号码
            var phone = $("input[name=username]").val();
            //判断是否为空
            if (!phone.match(/^1[3|4|5|7|8][0-9]{9}$/)) {
                alert('手机号格式不正确');
                return;
            }
            //将分支改为false防止再次触发点击事件
            flag = false;
            var num = 5;
            //设置定时器并改变内容及CSS样式
            var timer = setInterval(function () {
                $("#send-code").html(num + 's后重新发送');
                $("#send-code").css('color', '#E62842')
                //当时间为零的时候将分支改为true可以再次点击并清除定时器并改变内容及CSS样式
                if (num == 0) {
                    flag = true;
                    clearInterval(timer);
                    $("#send-code").html('重新发送');
                    $("#send-code").css('color', '#20A56E');
                }
                num--;
            }, 1000);
            $.ajax({
                url:'{{url('web/user/regsendSMS')}}',
                dataType:'json',
                data:{phone:phone},
                //ajax访问成功返回data数据
                success:function (data) {
                    if (data == null) {
                        alert('服务器繁忙')
                        return;
                    }
                    if (data.status != 0) {
                        alert(data.message);
                        return;
                    }
                    alert('发送验证码成功');
                },
                //ajax访问错误返回的错误方法
                error:function (msg){
                    if(msg != null){
                        alert('发送失败,请确认您的号码');
                    }
                }
            })
        });
        //提交表单
        $("#register").submit(function(){
            //用ajax请求验证数据
            $.ajax({
                url:"{{url('web/user/regcheck')}}",//请求的路由
                type:'post',//请求的类型
                data:$("#register").serialize(),//序列化表单中的数据
                datatype:'json',
                //请求成功时的方法，data是请求返回的json字符串
                success:function(data){

//                    alert(1111);
                    //将json字符串转换为对象
                    $res = JSON.parse(data);
                    //如果返回的信息为2说明用户名或者密码不正确
                    if($res.a == 0){
                        alert('注册成功!');
						//跳转到登录页面
                        location.href = "{{url('web/user/login')}}";
                        //如果返回的信息为1说明用户名密码匹配成功
                    }else if($res.e == 0){
                        alert('验证码错误')
                    }
                },
                //请求失败时的方法
                //msg返回的错误信息
                error:function(msg){
                    //将返回错误的json字符串转换为对象
//                        var json = JSON.parse(msg.responseText);
                    console.log(msg);
                }
            });
            return false;
        });
	</script>

	{{--========================================================================================================================================--}}
{{--验证码注册--}}
	{{--<script>--}}
		{{--$('#register').submit(function(){--}}
			{{--$.ajax({--}}
			    {{--url:"{{url('web/user/check')}}",//请求的路由--}}
			    {{--type:'post',//请求的方式--}}
                {{--data:$("#register").serialize(),//请求表单中的数据--}}
				{{--datatype:"json",--}}
				{{--//请求成功的方法--}}
				{{--//data是ajax请求传递过来的return信息--}}
				{{--success:function(data){--}}
					{{--var res = data;--}}
					{{--//将json字符串转为对象--}}
					{{--res = JSON.parse(res);--}}
{{--//					console.log(res);--}}
					{{--if(res.a == 1){--}}
					    {{--alert('用户名已存在！请重新输入！');--}}
					{{--}else if(res.a == 2){--}}
					    {{--alert('注册成功!');--}}
					{{--}--}}
                    {{--$("#error1").css({"display":"none"});--}}
                    {{--$("#error2").css({"display":"none"});--}}
                    {{--$("#error3").css({"display":"none"});--}}
				{{--},--}}
				{{--//请求失败的方法--}}
				{{--error:function(msg){--}}
					{{--//将返回错误的json字符串转换为对象--}}
                    {{--var json = JSON.parse(msg.responseText);--}}
{{--//                    console.log(json);--}}
					{{--//如果username的错误不为空的话显示错误提示--}}
                    {{--if(json.username != null){--}}
                        {{--$("#error1").html(json.username);--}}
                        {{--$("#error1").css({"display":"block"});--}}
					{{--//如果username的错误为空的话隐藏错误提示--}}
                    {{--} else if(json.username == null){--}}
                        {{--$("#error1").css({"display":"none"});--}}
                    {{--}--}}
                    {{--//如果password的错误不为空的话显示错误提示--}}
                    {{--if(json.password != null){--}}
                        {{--$("#error2").html(json.password);--}}
                        {{--$("#error2").css({"display":"block"});--}}
					{{--//如果password的错误为空的话隐藏错误提示--}}
                    {{--} else if(json.password == null){--}}
                        {{--$("#error2").css({"display":"none"});--}}
                    {{--}--}}
                    {{--//如果captcha的错误不为空的话显示错误提示--}}
                    {{--if(json.captcha != null){--}}
                        {{--$("#error3").html(json.captcha);--}}
                        {{--$("#error3").css({"display":"block"});--}}
					{{--//如果captcha的错误为空的话隐藏错误提示--}}
                    {{--} else if(json.captcha == null){--}}
                        {{--$("#error3").css({"display":"none"});--}}
                    {{--}--}}
				{{--}--}}
			{{--});--}}
			{{--return false;--}}
		{{--});--}}
	{{--</script>--}}
</html>
