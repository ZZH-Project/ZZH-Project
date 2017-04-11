@extends('web.layouts.index')
@section('title','个人中心')
@section('style')
	<link href="{{asset('css/web/user_zl.css')}}" type="text/css" rel="stylesheet"  />
@endsection
@section('body')
	{{--{{var_dump($wuinfo)}}--}}
	<div class="center_head">
		<div class="user_img_wrap">
			<div class="user_img">
				<img src="{{$wuinfo['pic']==null?'':url($wuinfo['pic'])}}" width="125px" height="125px" >
				{{--<svg class="icon icon_em_60" aria-hidden="true">--}}
					{{--<use xlink:href="#front_icon-yonghu"></use>--}}
				{{--</svg>--}}
			</div><!--user_img-->
		</div><!--user_img_wrap-->
		<!--<a class="user_name">蜡笔小新</a>-->
		@if(session('weblogin')==1)
		@else
		<ul class="login_bar_ul">
			<li><a href="{{url('web/user/login')}}">登录</a></li>
			<li><a href="{{url('web/user/register')}}">注册</a></li>
		</ul>
		@endif
		<div style="clear: both;"></div>
	</div><!--center_head-->
	<div class="user_c_list">
		<ul>
			<li>
				<a href="{{url('web/center/info').'/'.$wuinfo['wuid']}}">
					<div class="user_c_icon">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-information"></use>
						</svg>
					</div>
					<span>我的信息</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
			<li>
				<a href="{{url('web/center/passEdit')}}">
					<div class="user_c_icon">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-mima1"></use>
						</svg>
					</div>
					<span>密码修改</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
		</ul>
	</div><!--user_c_list-->
	<div class="user_c_list">
		<ul>
			<li>
				<a href="#">
					<div class="user_c_icon">
						<svg class="icon icon_em_16" aria-hidden="true">
							<use xlink:href="#front_icon-wenda1"></use>
						</svg>
					</div>
					<span>我的问答</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
			<li>
				<a href="#">
					<div class="user_c_icon">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-pinglun2"></use>
						</svg>
					</div>
					<span>我的评论</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
			<li>
				<a href="{{url('web/center/favTheme')}}">
					<div class="user_c_icon">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-shouc01"></use>
						</svg>
					</div>
					<span>我的收藏</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
		</ul>
	</div><!--user_c_list-->

	<div class="user_c_list">
		<ul>
			<li>
				<a href="#">
					<div class="user_c_icon">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-guanyuwomen"></use>
						</svg>
					</div>
					<span>关于我们</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
			<li>
				<a href="#">
					<div class="user_c_icon">
						<svg class="icon icon_em_17" aria-hidden="true">
							<use xlink:href="#front_icon-youjian1"></use>
						</svg>
					</div>
					<span>意见反馈</span>
					<div class="icon_arrow">
						<svg class="icon icon_em_18" aria-hidden="true">
							<use xlink:href="#front_icon-fanhui1-copy"></use>
						</svg>
					</div><!--icon_arrow-->
				</a>
			</li>
		</ul>
	</div><!--user_c_list-->
	@if(session('weblogin')==1)
	<div class="user_c_list special">
		<ul>
			<li>
				<a href="{{url('web/center/logout')}}" class="logout">退出当前账号</a>
			</li>
		</ul>
	</div><!--user_c_list-->
	@endif
@endsection