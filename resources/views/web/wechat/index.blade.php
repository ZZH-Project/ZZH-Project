@extends('web.layouts.index')
@section('title','微圈')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('body')
		
	<div class="head">
		<div class="wrap">
			<h1 class="page_title">微圈</h1>
			{{--<a href="#" class="btn_page_back">--}}
				{{--<svg class="icon icon_em_40" aria-hidden="true">--}}
					{{--<use xlink:href="#front_icon-fanhui1"></use>--}}
				{{--</svg>--}}
			{{--</a>--}}
		</div><!--wrap-->
	</div><!--head-->

	<div class="banner_wrap">
		<img src="{{asset('images/web/banner.jpg')}}"  />
	</div><!--banner_wrap-->

	<div class="menu_wrap">
		<div class="wrap">
			<ul class="menu_cirle">
				<li>
					<a href="{{url('web/wechat/list')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-weibiaoti2fuzhi12"></use>
							</svg>
						</div>
						<p>个护</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/wechat/list')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-shenghuojiaju"></use>
							</svg>
						</div>
						<p>家居</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/wechat/list')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-meishi"></use>
							</svg>
						</div>
						<p>美食</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/wechat/list')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-caizhuangxiangfen"></use>
							</svg>
						</div>
						<p>彩妆</p>
					</a>
				</li>
				<li>
					<a href="{{url('web/wechat/list')}}">
						<div class="menu_cirle_bar">
							<svg class="icon icon_em_18" aria-hidden="true">
								<use xlink:href="#front_icon-yundong"></use>
							</svg>
						</div>
						<p>运动</p>
					</a>
				</li>
			</ul>
			<div style="clear: both;"></div>
		</div><!--wrap-->
	</div><!--menu_wrap-->

	<div class="title_bar">
		<div class="title_line"></div>
		<h1 class="title_h3">最新加入</h1>
	</div><!--title_bar-->

	<div class="contain_wrap">
		<div class="wrap">
			<ul class="chat_list">
				<li><img src="{{asset('images/web/wechat_1.png')}}" /></li>
				<li><img src="{{asset('images/web/wechat_2.png')}}" /></li>
				<li><img src="{{asset('images/web/wechat_3.png')}}" /></li>
				<li><img src="{{asset('images/web/wechat_1.png')}}" /></li>
				<li><img src="{{asset('images/web/wechat_2.png')}}" /></li>
			</ul>
			<div style="clear: both;"></div>
			<a href="{{url('web/wechat/add')}}" class="btn_online">我要上线</a>
		</div><!--wrap-->
	</div><!--contain_wrap-->

	<div class="title_bar">
		<div class="title_line"></div>
		<h1 class="title_h3">特别推荐</h1>
	</div><!--title_bar-->

	<div class="wrap">
		<div class="webchat_wrap">
			<div class="webchat_img_bar">
				<img src="{{asset('images/web/wechat_1.png')}}"  />
			</div><!--webchat_img_bar-->
			<div class="webchat_info_bar">
				<a href="{{url('web/wechat/details')}}" class="title_h5">职场那些事儿</a>
				<p class="content p2">玩转职场，传递正能量！ 分享最主流、最有趣的职场36计。</p>
			</div><!--webchat_info_bar-->
			<div style="clear: both;"></div>
			<div class="fun_info_bar">
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-icondianzan"></use>
					</svg>
					<span>14</span>
				</a>
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-pinglun"></use>
				   </svg>
					<span>20</span>
				</a>
				<div style="clear: both;"></div>
			</div><!--fun_info_bar-->
		</div><!--webchat_wrap-->

		<div class="webchat_wrap">
			<div class="webchat_img_bar">
				<img src="{{asset('images/web/wechat_2.png')}}"  />
			</div><!--webchat_img_bar-->
			<div class="webchat_info_bar">
				<a href="{{url('web/wechat/details')}}" class="title_h5">职场那些事儿</a>
				<p class="content p2">玩转职场，传递正能量！ 分享最主流、最有趣的职场36计。</p>
			</div><!--webchat_info_bar-->
			<div style="clear: both;"></div>
			<div class="fun_info_bar">
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-icondianzan"></use>
					</svg>
					<span>14</span>
				</a>
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-pinglun"></use>
				   </svg>
					<span>20</span>
				</a>
				<div style="clear: both;"></div>
			</div><!--fun_info_bar-->
		</div><!--webchat_wrap-->

		<div class="webchat_wrap">
			<div class="webchat_img_bar">
				<img src="{{asset('images/web/wechat_3.png')}}"  />
			</div><!--webchat_img_bar-->
			<div class="webchat_info_bar">
				<a href="{{url('web/wechat/details')}}" class="title_h5">职场那些事儿</a>
				<p class="content p2">玩转职场，传递正能量！ 分享最主流、最有趣的职场36计。</p>
			</div><!--webchat_info_bar-->
			<div style="clear: both;"></div>
			<div class="fun_info_bar">
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-icondianzan"></use>
					</svg>
					<span>14</span>
				</a>
				<a href="javascript:void(0);" class="right">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-pinglun"></use>
				   </svg>
					<span>20</span>
				</a>
				<div style="clear: both;"></div>
			</div><!--fun_info_bar-->
		</div><!--webchat_wrap-->
	</div><!--wrap-->
@endsection