<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改密码</title>
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
	<form action="{{url('web/center/passEditval')}}">
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">修改密码</h1>
				<a href="{{url('web/center/index')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
				<a href="#" class="btn_head_submit"><input type="submit" value="保存" style="background: none;border: none"></a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="wrap">
			<input type="hidden" name="wuid" value="{{session('wuid')}}">
			<ul class="submint_list useredit_list">
				<li>
					<span>原密码：</span>
					<input type="password" class="form-control" placeholder="请输入原密码" name="oldpassword"/>
				</li>
				<li>
					<span>新密码：</span>
					<input type="password" class="form-control" placeholder="请输入新密码" name="password"/>
				</li>
				<li>
					<!--<span>重复新密码：</span>-->
					<input type="password" class="form-control" placeholder="请重新输入新密码" name="password_confirmation"/>
				</li>
				@if(!empty($errors->all()))
				<li style="line-height: 20px;text-align: center;height: 68px;background: pink;color: darkred">@foreach($errors->all() as $error){{$error}}<br>@endforeach</li>
				@endif
			</ul>
		</div><!--wrap-->
	</form>
	</body>
</html>