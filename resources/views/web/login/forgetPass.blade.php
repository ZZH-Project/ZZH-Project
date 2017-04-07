<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>密码重置</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
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
	</head>
	<body>
		<div class="body">
			<div class="login_logo"><img src="{{asset('images/web/login_logo.png')}}" /></div>
			<form id="forget" action="{{url('web/user/resetpass')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<img src="{{asset('images/web/icon_phone.png')}}" class="login_icon" />
						<input name="username" type="text" placeholder="请输入手机号" class="input_text" />
					</li>
					<li>
						<img src="{{asset('images/web/icon_validate.png')}}" class="login_icon"  />
						<input name="captcha"  type="text" placeholder="请输入验证码" class="input_text" />
						<a id="send-code" href="#" class="validate_code">获取验证码</a>
					</li>
					<li>
						<img src="{{asset('images/web/icon_password.png')}}" class="login_icon" />
						<input name="password" type="password" placeholder="请输入6-20个字符的密码" class="input_text" />
					</li>
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="重置密码" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			</form>
			<a href="{{url('web/user/login')}}" class="a_register">立即登录</a>
			{{--<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>--}}
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
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
                    url:'{{url('web/user/sendSMS')}}',
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
            $("#forget").submit(function(){
                //用ajax请求验证数据
                $.ajax({
                    url:"{{url('web/user/resetpass')}}",//请求的路由
                    type:'post',//请求的类型
                    data:$("#forget").serialize(),//序列化表单中的数据
                    datatype:'json',
                    //请求成功时的方法，data是请求返回的json字符串
                    success:function(data){

//                    alert(1111);
                        //将json字符串转换为对象
                        $res = JSON.parse(data);
                        //如果返回的信息为2说明用户名或者密码不正确
                        if($res.a == 0){
                            alert('修改密码成功!');
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
	</body>
</html>
