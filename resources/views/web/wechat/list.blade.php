@extends('web.layouts.index')
@section('title','微圈列表')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('script')
	<script type="text/javascript">
		$(function(){
			$("#btn_head_menu").click(function(){
				$("#pop_theme_menu").slideToggle();
				$('body').toggleClass("hidden");
				//禁止页面在手机上滑动
				$('.pop_wrap').bind("touchmove",function(e){
					e.preventDefault();
				});
			});
			$(".head_menu_bar ul.menu_cirle li a,#pop_theme_menu").click(function(){
				$('body').css('overflow', 'auto');
				$("#pop_theme_menu").slideUp();
			});
		});
	</script>
@endsection
@section('body')
    <div class="head">
        <div class="wrap">
            <h1 class="page_title">{{$cate->cate_name}}</h1>
            <a href="{{url('web/wechat/index')}}" class="btn_page_back">
                <svg class="icon icon_em_40" aria-hidden="true">
                    <use xlink:href="#front_icon-fanhui1"></use>
                </svg>
            </a>
            <a href="javascript:void(0);" id="btn_head_menu">
                <svg class="icon icon_em_40" aria-hidden="true">
                    <use xlink:href="#front_icon-11"></use>
                </svg>
            </a>
        </div><!--wrap-->
    </div><!--head-->

	<div class="wrap">
        @foreach($list as $v)
            <div class="webchat_wrap">
                <div class="webchat_img_bar">
                    <img src="{{asset('images/web/wechat_1.png')}}"  />
                </div><!--webchat_img_bar-->
                <div class="webchat_info_bar">
                    <a href="{{url("web/wechat/details?id=$v->id&cate_id=$cate->id")}}" class="title_h5">{{$v->wechat_name}}</a>
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

    <div class="pop_wrap pop_head_top" id="pop_theme_menu">
        <div class="pop_head_menu">
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
        </div><!--pop_head_menu-->
    </div>
@endsection