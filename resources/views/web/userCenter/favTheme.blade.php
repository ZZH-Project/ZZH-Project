<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的收藏</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/user_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">我的收藏</h1>
				<a href="{{url('web/center/index')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="fav_list_wrap">
			<ul class="fav_list">
				@if($status == 'tm')
				<li><a href="{{url('web/center/tmsc')}}" class="fav_list_select">专题</a></li>
				@else
				<li><a href="{{url('web/center/tmsc')}}">专题</a></li>
				@endif
				@if($status == 'qa')
				<li><a href="{{url('web/center/myfav')}}" class="fav_list_select" id="qa">问答</a></li>
				@else
					<li><a href="{{url('web/center/myfav')}}" id="qa">问答</a></li>
				@endif
                @if($status == 'wechatfav')
                    <li><a href="{{url('web/center/wechatfav')}}" class="fav_list_select" id="qa">微圈</a></li>
                @else
                    <li><a href="{{url('web/center/wechatfav')}}" id="qa">微圈</a></li>
                @endif
			</ul>
			<div style="clear: both;"></div>
		</div>
		@if($status =='qa')
			@foreach($favqas as $favqa)
				<div class="qa_wrap" id="qa_wrap">
					<div class="wrap">
						<div class="comment_head_wrap">
							<div class="left">
								<div class="user_img_bar user_img_50 left">
									<img src="{{url($favqa->pic)}}" />
								</div>
								<span class="user_name">{{$favqa->wusername}}</span>
							</div>
							<div class="right time_tip">
								{{--<span class="qa_status_bar status_green">已回答</span>--}}
								{{--<span class="qa_status_bar status_red">待回答</span>--}}
							</div>
							<div style="clear: both;"></div>
						</div><!--comment_head_wrap-->

						<div class="qa_content_wrap">
							<a href="{{url('web/qa/details').'/'.$favqa->id}}" class="title_h1">{{$favqa->title}}</a>
							<div class="content p1">
								{{$favqa->content}}
							</div><!--qa_content-->
						</div><!--qa_content_wrap-->

						<div class="fun_info_bar">
							<div class="left">
								<span class="cate_tip">{{$favqa->cate_name}}</span>
								<span class="time_tip">{{date('Y-m-d H:i:s',$favqa->issue_time)}}</span>
							</div><!--left-->
							<a id="good" href="javascript:void(0);" class="right btn_comment_good" onclick="good(this)">
								<svg class="icon icon_em_25" aria-hidden="true">
									<use xlink:href="#front_icon-icondianzan"></use>
								</svg>
								<span>{{$favqa->good_num}}</span>
								<input type="hidden" name="qa_id" value="{{$favqa->id}}">
							</a>
							<a href="javascript:void(0);" class="right">
								<svg class="icon icon_em_25" aria-hidden="true">
									<use xlink:href="#front_icon-pinglun"></use>
								</svg>
								{{--<span>20</span>--}}
							</a>
							<div style="clear: both;"></div>
						</div><!--qa_content_bottom-->
					</div><!--wrap-->
				</div><!--qa_wrap-->
			@endforeach
		@elseif($status == 'tm')
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

        @elseif($status == 'wechatfav')
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
		@endif


	</body>
	<script>
        //点赞
        function good(a){
//            console.log(a.attributes[2].value);
            console.log(a.childNodes[3].innerHTML);
            var qaid =a.childNodes[5].value;
            if("{{session('weblogin')==null}}"){
                alert('请先登录');
                a.attributes[2].value = 'right btn_comment_good good_red';
            }else {
                if(a.attributes[2].value == 'right btn_comment_good'){
                    $.ajax({
                        url:"{{url('web/qa/goodadd')}}",
                        type:'get',
                        data:{qaid:qaid},
                        datatype:'json',
                        success:function(data){
                            a.childNodes[3].innerHTML = data;
                        },
                        error:function(){}
                    });
                }else if(a.attributes[2].value == 'right btn_comment_good good_red'){
                    $.ajax({
                        url:"{{url('web/qa/goodmin')}}",
                        type:'get',
                        data:{qaid:qaid},
                        datatype:'json',
                        success:function(data){
                            a.childNodes[3].innerHTML = data;
                        },
                        error:function(){}
                    });
                }
            }
        }
	</script>
	{{--<script>--}}
		{{--$("#qa").click(function(){--}}
		    {{--$.ajax({--}}
			{{--url:"{{url('')}}",--}}
			{{--type:"get",--}}
			{{--datatype:'json',--}}
			{{--success:function(){},--}}
			{{--error:function(){}--}}


			{{--});--}}
		{{--});--}}
	{{--</script>--}}
</html>