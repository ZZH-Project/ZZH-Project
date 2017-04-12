@extends('web.layouts.index')
@section('title','问答')
@section('bootstrap_style')
	<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('style')
	<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('bootstrap_script')
	<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
@endsection
@section('script')
	<script src="{{asset('js/stickUp.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
        $(function(){
            //菜单选择效果
            $('.sub_menu_bar ul li a').click(function(){
                $(this).parent().parent().find("a").removeClass('sub_menu_select');
                $(this).addClass('sub_menu_select');
            });
            //下拉菜单
            $('.btn_menu_down').click(function(){
                $val = $("#sub_menu").css("position");
                if( $val == "fixed"){
                    $("#menu_cate").css("top","79px");
                } else {
                    $("#menu_cate").css("top","168px");
                }
                $('body').toggleClass("qa_hidden");
                $('#menu_cate').slideToggle();
                //禁止页面在手机上滑动
                $('.pop_wrap').bind("touchmove",function(e){
                    e.preventDefault();
                });
            });
            //取消下拉菜单
            $('.sub_menu_bar ul li a,.menu_cate_bar ul li a,#menu_cate').click(function(){
                $('body').css('overflow', 'auto');
                $('#menu_cate').slideUp();
            });
        });
	</script>
@endsection

@section('body')

{{--		{{var_dump($qalists)}}--}}
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">问答</h1>
				{{--<a href="index.html" class="btn_page_back">--}}
					{{--<svg class="icon icon_em_40" aria-hidden="true">--}}
	                    {{--<use xlink:href="#front_icon-fanhui1"></use>--}}
	                {{--</svg>--}}
				{{--</a>--}}
			</div><!--wrap-->
		</div><!--head-->
		<div class="sub_menu" id="sub_menu">
			<div class="wrap">
				<div class="sub_menu_wrap">
					<div class="sub_menu_bar">
						<ul id="sc">
							@foreach($qacates as $qacate)
							<li><a href="javascript:void(0);">{{$qacate['cate_name']}}</a></li>
							@endforeach
							{{--<li><a href="javascript:void(0);" class="sub_menu_select">热门</a></li>--}}
							{{--<li><a href="javascript:void(0);">最新</a></li>--}}
							{{--<li><a href="javascript:void(0);">教育</a></li>--}}
							{{--<li><a href="javascript:void(0);">生活</a></li>--}}
							{{--<li><a href="javascript:void(0);">运动</a></li>--}}
							{{--<li><a href="javascript:void(0);">教育</a></li>--}}
							{{--<li><a href="javascript:void(0);">生活</a></li>--}}
							{{--<li><a href="javascript:void(0);">运动</a></li>--}}
						</ul>
						<div style="clear: both;"></div>
					</div><!--sub_menu_bar-->
				</div><!--sub_menu_wrap-->
				{{--{{var_dump($qalists)}}--}}
				<div class="sub_menu_down">
					<a href="javascript:void(0);" class="btn_menu_down">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-xiala"></use>
	                    </svg>
					</a>
					<div class="pop_wrap" id="menu_cate">
						<div class="menu_cate_bar">
							<ul>
								@foreach($qacates as $qacate)
								<li><a href="javascript:void(0);">{{$qacate['cate_name']}}</a></li>
								@endforeach
								{{--<li><a href="javascript:void(0);">社会</a></li>--}}
								{{--<li><a href="javascript:void(0);">运动</a></li>--}}
								{{--<li><a href="javascript:void(0);">职场</a></li>--}}
								{{--<li><a href="javascript:void(0);">教育</a></li>--}}
								{{--<li><a href="javascript:void(0);">社会</a></li>--}}
								{{--<li><a href="javascript:void(0);">运动</a></li>--}}
								{{--<li><a href="javascript:void(0);">职场</a></li>--}}
							</ul>
							<div style="clear: both;"></div>
						</div><!--qa_cate_bar-->
					</div><!--qa_cate_wrap-->
				</div><!--qa_menu_more-->
			</div><!--wrap-->
		</div><!--sub_menu-->
		@if(empty($qalists))
			<div style="text-align: center;margin-top:100px;">当前分类还未有问题快去提问吧</div>
		@else
		@foreach($qalists as $qalist)
		@if($qalist->is_show == 1)
		<div class="qa_wrap" id="qa_wrap">
			<div class="wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{$qalist->pic == null ? '' : url($qalist->pic)}}" width="50px" height="50px"/>
						</div>
						@if($qalist->wusername == null)
						<span class="user_name">{{$qalist->username}}</span>
						@else
						<span class="user_name">{{$qalist->wusername}}</span>
						@endif
					</div>
					<div class="right time_tip">
						{{--<span class="qa_status_bar status_green">已回答</span>--}}
						{{--<span class="qa_status_bar status_red">待回答</span>--}}
					</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				
				<div class="qa_content_wrap">
					<a href="{{url('web/qa/details').'/'.$qalist->id}}" class="title_h1">{{$qalist->title}}</a>
					<div class="content p1">
						{{$qalist->content}}
					</div><!--qa_content-->
				</div><!--qa_content_wrap-->
				
				<div class="fun_info_bar">
					<div class="left">
						<span class="cate_tip">{{$qalist->cate_name}}</span>
						<span class="time_tip">{{date('Y-m-d H:i:s',$qalist->issue_time)}}</span>
					</div><!--left-->
					<a id="good" href="javascript:void(0);" class="right btn_comment_good" onclick="good(this)">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>{{$qalist->good_num}}</span>
						<input type="hidden" name="qa_id" value="{{$qalist->id}}">
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
		@endif
		@endforeach
		@endif
		
		{{--<div class="qa_wrap" id="qa_wrap">--}}
			{{--<div class="wrap">--}}
				{{--<div class="comment_head_wrap">--}}
					{{--<div class="left">--}}
						{{--<div class="user_img_bar user_img_50 left">--}}
							{{--<img src="{{asset('images/web/user_img.png')}}" />--}}
						{{--</div>--}}
						{{--<span class="user_name">秋之雨</span>--}}
					{{--</div>--}}
					{{--<div class="right time_tip">--}}
						{{--<span class="qa_status_bar status_green">已回答</span>--}}
						{{--<!--<span class="qa_status_bar status_red">待回答</span>-->--}}
					{{--</div>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--comment_head_wrap-->--}}
				{{----}}
				{{--<div class="qa_content_wrap">--}}
					{{--<a href="details.html" class="title_h1">魔兽世界 15级去哪升级？</a>--}}
					{{--<div class="content p1">--}}
						{{--联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。--}}
					{{--</div><!--qa_content-->--}}
				{{--</div><!--qa_content_wrap-->--}}
				{{----}}
				{{--<div class="fun_info_bar">--}}
					{{--<div class="left">--}}
						{{--<span class="cate_tip">游戏</span>--}}
						{{--<span class="time_tip">2017-3-21  20:30:14</span>--}}
					{{--</div><!--left-->--}}
					{{--<a href="javascript:void(0);" class="right btn_comment_good">--}}
						{{--<svg class="icon icon_em_25" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-icondianzan"></use>--}}
	                    {{--</svg>--}}
	                    {{--<span>14</span>--}}
                   	{{--</a>--}}
                   	{{--<a href="javascript:void(0);" class="right">--}}
						{{--<svg class="icon icon_em_25" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-pinglun"></use>--}}
	                   {{--</svg>--}}
						{{--<span>20</span>--}}
					{{--</a>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--qa_content_bottom-->--}}
			{{--</div><!--wrap-->--}}
		{{--</div><!--qa_wrap-->--}}
		{{----}}

		<div class="footer_fun_bg"></div>
		
		<div class="footer_fun_wrap">
			<a href="{{url('web/qa/ask')}}" class="btn_add_content btn_add_ask">
				<div class="btn_bar">
					<svg class="icon icon_em_20" aria-hidden="true">
                        <use xlink:href="#front_icon-552cd4fd7aa13"></use>
                   </svg>
					<span>我要提问</span>
        			</div><!--btn_ask_bar-->
			</a>
		</div><!--footer_fixed-->
	<script>
		//页面定位
		jQuery(function($) {
			$(document).ready( function() {
				$('.sub_menu').stickUp();
			});
		});
	</script>

	<script>
        //选择分类
		$("#sc").click(function(){
            if(($("a[class=sub_menu_select]")).text()){
                var catename = ($("a[class=sub_menu_select]")).text();
				console.log(catename);
                location.href="{{url('web/qa/index')}}"+'/'+catename;
			}
		});
	</script>
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
	@endsection