@extends('web.layouts.index')
@section('title','密保问题找回密码')
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
			<form id="forget" action="{{url('web/user/getquestion')}}" method="post">
				{{csrf_field()}}
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<input id name="username" type="text" value="" placeholder="请输入用户名" class="input_text" />
					</li>
                    @if($status === 0)
                        <li style="background: pink;border-bottom: none;height: 20px;color: darkred;text-align: center;border-radius: 5px;">账号不存在</li>
					@elseif($status ===1 )
						<li style="background: pink;border-bottom: none;height: 20px;color: darkred;text-align: center;border-radius: 5px;">当前账号未设置问题请用密保手机找回密码</li>
                    @endif
					<li class="special">
						<div class="login_bar">
							<input type="submit" value="获取问题" class="btn_login"/>
						</div><!--login_bar-->
					</li>
				</ul>
			</div><!--login_wrap-->
			</form>
			{{--<a href="#" class="btn_close"><img src="{{asset('images/web/icon_close.png')}}" /></a>--}}
			{{--<div class="login_error_bar">手机号或密码错误</div>--}}
		</div><!--body-->
@endsection