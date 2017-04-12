<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改个人信息</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/theme.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/user_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
	<form action="{{url('web/center/infoEditval')}}">
		{{csrf_field()}}
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">修改个人信息</h1>
				<a href="{{url('web/center/info').'/'.session('wuid')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
				<a href="#" class="btn_head_submit"><input type="submit" value="保存" style="background: none;border: none"></a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="wrap">
			<ul class="submint_list useredit_list">
				<li>
					<span>用户名：</span>
					<input type="text" name="wusername"  class="form-control" value="{{$wuinfo['wusername']}}"/>
				</li>
				<li>
					<span>性别：</span>
					<select class="form-control" name="sex">
						<option {{$wuinfo['sex']=='男'?'selected':''}}>男</option>
						<option {{$wuinfo['sex']=='女'?'selected':''}}>女</option>
					</select>
					<div class="icon_more">
						<svg class="icon icon_em_25" aria-hidden="true">
		                    <use xlink:href="#front_icon-fanhui1-copy"></use>
		                </svg>
					</div><!--icon_more-->
				</li>
				@if($errors->first() != '')
				<li style="background: pink;height: 40px; text-align: center;line-height: 18px;color: darkred">{{$errors->first()}}</li>
				@else
				@endif
			</ul>
		</div><!--wrap-->
	</form>
	</body>
</html>