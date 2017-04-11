@extends('web.layouts.index')
@section('title','密保问题')
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
			<form id="forget" action="{{url('web/center/checkqa')}}" method="post">
				{{csrf_field()}}
                <input type="hidden" name="uid" value="{{$uid}}">
			<div class="login_wrap">
				<ul class="login_ul">
					<li>
						<input name="question" type="text" placeholder="请输入您的密保问题" class="input_text" />
					</li>
					<li>
						<input name="answer" type="text" placeholder="请输入您的密保回答" class="input_text" />
					</li>
                    @if(!empty($errors->all()))
                    <li style="height: 13px;text-align:center;border-radius:5px;border-bottom:none;background: pink;color: darkred;line-height: 5px;">{{$errors->first()}}</li>
                    @endif
                    <li class="special login_tip">
                            <a href="{{url('web/center/myquestion').'/'.$uid}}" class="a_forget">我的问题</a>
                    </li>
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