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
		</div><!--wrap-->
	</div><!--head-->

	<div class="banner_wrap">
        @foreach($banner_img as $v)
            <img src='{{asset("upload/images/$v->banner_img")}}'  />
        @endforeach
	</div><!--banner_wrap-->

	<div class="menu_wrap">
		<div class="wrap">
			<ul class="menu_cirle">
				@foreach($data as $v)
					<li>
						<a href="{{url('web/wechat/show')}}?id={{$v->id}}">
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

        @foreach($list as $v)
		<div class="webchat_wrap">
			<div class="webchat_img_bar">
				<img src="{{asset('images/web/wechat_1.png')}}"  />
			</div><!--webchat_img_bar-->
			<div class="webchat_info_bar">
				<a href="{{url("web/wechat/details?id=$v->id&cate_id=$v->cate_id")}}" class="title_h5">{{$v->wechat_name}}</a>
				<p class="content p2">{{$v->content}}</p>
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
        @endforeach

	</div><!--wrap-->
@endsection