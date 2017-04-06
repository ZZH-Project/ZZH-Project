<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>专题</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">专题</h1>
				<a href="#" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="banner_wrap">
			<img src="{{asset('images/web/banner.jpg')}}"  />
		</div><!--banner_wrap-->
		
		<div class="menu_wrap">
			<div class="wrap">
				<ul class="menu_cirle">
				@foreach($data as $v)
					<li>
						<a href="{{url('web/theme/show')}}?id={{$v->id}}">
							<div class="menu_cirle_bar">
								<svg class="icon icon_em_18" aria-hidden="true">
			                        <use xlink:href="{{$v->cate_img}}"></use>
			                    </svg>
							</div>
							<p>{{$v->cate_name}}</p>
						</a>
					</li>
				@endforeach
				</ul>
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--menu_wrap-->
		
		<div class="title_bar">
			<div class="title_line"></div>
			<h1 class="title_h3">最新精选</h1>
		</div><!--title_bar-->
		
		<div class="wrap">
			<div class="theme_wrap">
				<a href="{{url('web/theme/details')}}" class="theme_img_bar">
					<img src="{{asset('images/web/theme_img.jpg')}}"  />
					<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
				</a><!--theme_bar-->
				<a href="{{url('web/theme/details')}}" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--theme_wrap-->
			
			<div class="theme_wrap">
				<a href="{{url('web/theme/details')}}" class="theme_img_bar">
					<img src="{{asset('images/web/theme_img.jpg')}}"  />
					<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
				</a><!--theme_bar-->
				<a href="{{url('web/theme/details')}}" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--theme_wrap-->
			
			<div class="theme_wrap">
				<a href="{{url('web/theme/details')}}" class="theme_img_bar">
					<img src="{{asset('images/web/theme_img.jpg')}}"  />
					<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
				</a><!--theme_bar-->
				<a href="{{url('web/theme/details')}}" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--theme_wrap-->
			
			
		</div><!--wrap-->
	</body>
</html>