@extends('web.layouts.index')
@section('title','专题')
@section('style')
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('body')

		<div class="head">
			<div class="wrap">
				<h1 class="page_title">专题</h1>
				{{--<a href="#" class="btn_page_back">--}}
					{{--<svg class="icon icon_em_40" aria-hidden="true">--}}
	                    {{--<use xlink:href="#front_icon-fanhui1"></use>--}}
	                {{--</svg>--}}
				{{--</a>--}}
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
			<h1 class="title_h3">精选</h1>
		</div><!--title_bar-->
		
		<div class="wrap">
			@foreach($list as $v)
				<div class="theme_wrap">
					<a href="{{url("web/theme/details?id=$v->id&cate_id=$v->cate_id")}}" class="theme_img_bar">
						<img src='{{asset("upload/images/$v->banner_img")}}'  />
						<div class="theme_cate_tip">{{$v->cate_name}}</div><!--theme_cate_tip-->
					</a><!--theme_bar-->
					<a href="{{url("web/theme/details?id=$v->id&cate_id=$v->cate_id")}}" class="title_h2">{{$v->title}}</a>
					<div class="fun_info_bar">
					<span class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						@foreach($count as $a)
							@if($v->id == $a->th_id)
								<span>{{$a->num == 0 ? 0 : $a->num}}</span>
							@endif
						@endforeach
					</span>
						<span class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-liulan1"></use>
	                    </svg>
	                    <span>{{$v->good_num == 0 ? 0 : $v->good_num}}</span>
                   	</span>
						<div style="clear: both;"></div>
					</div><!--fun_info_bar-->
				</div><!--theme_wrap-->
			@endforeach
		</div><!--wrap-->
@endsection