<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人信息</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/user_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		{{--{{var_dump($wuinfo)}}--}}
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">个人信息</h1>
				<a href="{{url('web/center/index')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
				<a href="{{url('web/center/infoEdit').'/'.$wuinfo->wuid}}" id="btn_head_menu">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-pinglun2"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="wrap">
			<ul class="info_list">
				<li>
					<a href="{{url('web/center/imgEdit').'/'.$wuinfo->wuid}}" class="btn_user_img">
						我的头像
						<div class="right icon_user_arrow">
							<svg class="icon icon_em_17" aria-hidden="true">
			                    <use xlink:href="#front_icon-fanhui1-copy"></use>
			                </svg>
						</div>
						<div class="right">
							<img style="margin-top:15px;" src="{{$wuinfo->pic == null ? asset('images/web/user_img.png') : asset($wuinfo->pic)}}" width="56px" height="56px" >
							{{--<svg class="icon icon_em_20" aria-hidden="true">--}}
			                    {{--<use xlink:href="#front_icon-yonghu"></use>--}}
			                {{--</svg>--}}
						</div>
					</a>
				</li>
				<li>用户名<span>{{$wuinfo->wusername}}</span></li>
				<li>手机号<span>{{$wuinfo->username}}</span></li>
				<li>性别<span>{{$wuinfo->sex}}</span></li>
			</ul>
		</div><!--wrap-->
	</body>
</html>
