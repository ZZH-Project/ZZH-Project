<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改个人头像</title>
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
	<form action="{{url('web/center/imgEditval')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">修改个人头像</h1>
				<a href="{{url('web/center/info')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
				<a href="#" class="btn_head_submit"><input type="submit" value="保存" style="background: none;border: none"></a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="wrap">
			<ul class="submint_list">
				<li>
					<span>我的头像：</span>
					<div class="file_upload">
						<input type="file" name="pic" value=""/>
						<b>上传</b>
					</div><!--file_upload-->
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