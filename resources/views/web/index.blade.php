@extends('web.layouts.index')
@section('title','微圈')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('body')
	<div class="head">
		<div class="wrap">
			<h1 class="page_title">美丽联合</h1>
		</div><!--wrap-->
	</div><!--head-->

	<div class="banner_wrap">
		<img src="{{asset('images/web/banner.jpg')}}"  />
	</div><!--banner_wrap-->

	<div class="menu_wrap">
		<div class="wrap">
			<ul class="menu_cirle">
				<li>
					<a href="{{url('web/theme/index')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_17" aria-hidden="true">
								<use xlink:href="#front_icon-boxingtu"></use>
							</svg>
						</div>
						<p>专题</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/wechat/index')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-weixin"></use>
							</svg>
						</div>
						<p>微圈</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/qa/index')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_17" aria-hidden="true">
								<use xlink:href="#front_icon-wenda1"></use>
							</svg>
						</div>
						<p>问答</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/usercenter/index')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-yonghu"></use>
							</svg>
						</div>
						<p>我的</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/index')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-icongd1"></use>
							</svg>
						</div>
						<p>更多</p>
					</a>
				</li>
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
			<a href="./theme/details.html" class="theme_img_bar">
				<img src="{{asset('images/web/theme_img.jpg')}}"  />
				<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
			</a><!--theme_bar-->
			<a href="./theme/details.html" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
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
			<a href="./theme/details.html" class="theme_img_bar">
				<img src="{{asset('images/web/theme_img.jpg')}}"  />
				<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
			</a><!--theme_bar-->
			<a href="./theme/details.html" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
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
			<a href="./theme/details.html" class="theme_img_bar">
				<img src="{{asset('images/web/theme_img.jpg')}}"  />
				<div class="theme_cate_tip">美妆</div><!--theme_cate_tip-->
			</a><!--theme_bar-->
			<a href="./theme/details.html" class="title_h2">恋恋粉色季 画个甜甜的妆容吧！</a>
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
@endsection