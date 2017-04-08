<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>{{$list->title}}详情</title>
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
		<div class="head_img_wrap">
			<img src="{{asset("upload/images/$list->banner_img")}}"  />
			<div class="theme_cate_tip">{{$cate->cate_name}}</div><!--theme_cate_tip-->
		</div><!--head_img_wrap-->
		
		<div class="wrap">
			<div class="article_info_bar">
				<h1 class="title_h4">{{$list->title}}</h1>
				<div class="fun_info_bar">
					<span class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>{{$count}}</span>
					</span>
					<span class="left">
						<svg class="icon icon_em_25" aria-hidden="true">
	                        <use xlink:href="#front_icon-liulan1"></use>
	                    </svg>
	                    <span>{{$list->good_num == 0 ? 0 : $list->good_num}}</span>
                   	</span>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--article_info_bar-->
			
			<div class="article_wrap">
				{!! $list->content !!}
			</div><!--article_wrap-->
		</div><!--wrap-->
		
		<div class="gray_bar"></div>
		
		<div class="comment_head">
			<div class="wrap">
				<div class="left">
					<svg class="icon icon_em_35" aria-hidden="true">
	                    <use xlink:href="#front_icon-pinglun"></use>
	                </svg>
	                <span>评论</span>
				</div>
				<div class="right">
					<a href="{{url("web/theme/comment")}}?thid={{$_GET['id']}}&cid={{$_GET['cate_id']}}" class="a_red">查看全部评论</a>
				</div>
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--comment_head-->

		@foreach($comment as $v)
		<div class="comment_wrap">
			<div class="wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="user_name">{{$v->username}}</span>
					</div>
					<div class="right time_tip">{{$v->created_at}}</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				
				<div class="content p2">{{$v->content}}</div>

			</div><!--wrap-->
		</div><!--comment_wrap-->
		@endforeach

		<div class="footer_fun_bg"></div>
		
		<div class="footer_fun_wrap">
			<ul class="fun_five">
				<li>
					<a href="javascript:void(0);" onclick="history.go(-1)">
						<svg class="icon" aria-hidden="true">
		                    <use xlink:href="#front_icon-fanhui1"></use>
		                </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" id="sc">
						<svg class="icon icon_em_38" aria-hidden="true">
	                        <use xlink:href="#front_icon-shouc01"></use>
	                    </svg>
						<input type="hidden" class="th_id" value="{{$_GET['id']}}">
						<input type="hidden" class="cate_id" value="{{$_GET['cate_id']}}">
					</a>
				</li>
				<li>
					<span id="btn_footer_good1">
						<svg class="icon" aria-hidden="true">
	                        <use xlink:href="#front_icon-liulan1"></use>
	                    </svg>
	                    <span>{{$list->good_num == 0 ? 0 : $list->good_num}}</span>
					</span>
				</li>
				<li>
					@if(session('wuid') == null)
					<a href="{{url('web/user/login')}}">
						<svg class="icon" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
					</a>
					@else
					<a href="javascript:void(0);" id="btn_footer_comment">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#front_icon-pinglun"></use>
						</svg>
					</a>
					@endif
				</li>
				<li>
					<a href="javascript:void(0);" id="btn_footer_share">
						<svg class="icon icon_em_35" aria-hidden="true">
	                        <use xlink:href="#front_icon-fenxiang"></use>
	                    </svg>
					</a>
				</li>
			</ul>
		</div><!--footer_fun_wrap-->
		
		<div class="pop_wrap" id="pop_share">
			<div class="pop_bar_footer">
				<ul class="pop_share_list">
					<li>
						<a href="javascript:void(0);">
							<svg class="icon" aria-hidden="true">
		                        <use xlink:href="#front_icon-iconfontmoban"></use>
		                    </svg>
							<p>微信</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon" aria-hidden="true">
		                        <use xlink:href="#front_icon-qq"></use>
		                    </svg>
							<p>QQ</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon" aria-hidden="true">
		                        <use xlink:href="#front_icon-P-copy"></use>
		                    </svg>
							<p>微博</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon" aria-hidden="true">
		                        <use xlink:href="#front_icon-tengxunweiboeps-copy"></use>
		                    </svg>
							<p>腾讯微博</p>
						</a>
					</li>
				</ul>
				<div style="clear: both;"></div>
				<a href="#" class="btn_share_close">
					<svg class="icon icon_em_35" aria-hidden="true">
                        <use xlink:href="#front_icon-guanbi01"></use>
                    </svg>
				</a>
			</div><!--pop_bar_footer-->
		</div><!--pop_wrap-->
		
		<div class="pop_wrap" id="add_comment_main">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<form id="f1" action="{{url("web/theme/submit").'/'.$_GET['id'].'/'.$_GET['cate_id']}}" method="get">
					<input type="submit" style="cursor: pointer;background: rgba(0,0,0,0);border:0px solid white;" class="pop_comment_send" value="提交">
					<a href="javascript:void(0);" class="pop_comment_close">返回</a>
					<textarea class="input pop_comment_textarea" name="content" autofocus="autofocus"></textarea>
				</form>
			</div>
		</div><!--pop_wrap-->

		
		<div class="tip_bar" id="tip_success">提交成功</div>
		<div class="tip_bar" id="tip_fav">已收藏</div>
	</body>
	<script>
		//收藏
		$("#sc").click(function () {
		    //获取专题ID和专题分类ID
			var th_id = $(".th_id").val();
			var cate_id = $(".cate_id").val();
			$.ajax({
			    url:"{{url('web/theme/sc')}}",
				type:'get',
				data:{"th_id":th_id,"cate_id":cate_id},
                dataType:"string",
				success:function (data) {

				},
				error:function (msg) {}
			});
        });
		//检测是否为空
		$("#f1").submit(function () {
			//获取提交的评论
			var content = $("#f1 textarea").val();
			if (!content) {
			    $("#tip_success").html("请输入内容！");
                return false;
			} else {
                $("#tip_success").html("提交成功！");
			}
        });
	</script>
	<script>
		$(".article_wrap p span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h1 span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h2 span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h3 span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h4 span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h5 span").css({'word-break':'break-all','white-space':'inherit'});
		$(".article_wrap h6 span").css({'word-break':'break-all','white-space':'inherit'});
	</script>
</html>