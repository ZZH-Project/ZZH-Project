<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>问答详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		<div class="head head_white qa_head_d">
			<div class="wrap">
				<div class="user_img_bar user_img_70 left">
					<img src="{{asset('images/web/user_img.png')}}"  />
				</div><!--left-->
				<div class="left qa_details_info">
					<p class="user_name_d">秋之雨</p>
					<p class="qa_details_time">2017-3-21 20:30:14</p>
				</div><!--left-->
				<div class="qa_status_bar status_green qa_status_d right">已回答</div><!--right-->
				<!--<div class="qa_status_bar status_red qa_status_d right">待回答</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--head-->

		<div class="qa_content_d">
			<h1 class="title_h1">{{$qa['title']}}</h1>
			<p class="content p1">{{$qa['content']}}</p>
			<div class="cate_tip qa_tip_d">游戏</div>
		</div><!--qa_content_d-->
		<a href="javascript:void(0);" class="btn_add_content" id="btn_footer_comment">
			<div class="btn_bar">
				<svg class="icon icon_em_20 icon_add_answer" aria-hidden="true">
                    <use xlink:href="#front_icon-xiepinglun"></use>
                </svg>
				<span>我要回答</span>
			</div>
		</a>
		<div class="comment_head">
			<div class="wrap">
				<div class="left">
					<svg class="icon icon_em_35" aria-hidden="true">
	                    <use xlink:href="#front_icon-pinglun"></use>
	                </svg>
	                <span>回答</span>
				</div>
				<div class="right">
					<a href="{{url('web/qa/comment')}}" class="a_red">查看全部评论</a>
				</div>
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--comment_head-->
		
		<div class="comment_wrap">
			<div class="wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				
				<div class="content p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</div>
				
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="right btn_comment_good" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="right btn_add_comment_sub" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                   </svg>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--wrap-->
			
			<!--回复评论-->
			<div class="wrap comment_sub_wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				
				<div class="content p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</div>
				
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="right btn_comment_good" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="right btn_add_comment_sub" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                   </svg>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--wrap-->
		</div><!--comment_wrap-->
		
		<div class="comment_wrap">
			<div class="wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				
				<div class="content p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</div>
				
				<div class="fun_info_bar">
					<a href="javascript:void(0);" class="right btn_comment_good" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
						<span>20</span>
					</a>
					<a href="javascript:void(0);" class="right btn_add_comment_sub" >
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                   </svg>
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--wrap-->
		</div><!--comment_wrap-->
		
		<div class="footer_fun_bg"></div>
		
		<div class="footer_fun_wrap">
			<ul class="fun_four">
				<li>
					<a href="{{url('web/qa/index')}}">
						<svg class="icon" aria-hidden="true">
		                    <use xlink:href="#front_icon-fanhui1"></use>
		                </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" id="btn_footer_fav">
						<svg class="icon icon_em_38" aria-hidden="true">
	                        <use xlink:href="#front_icon-shouc01"></use>
	                    </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" id="btn_footer_good">
						<svg class="icon" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>234</span>
					</a>
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

		<form id="form" action="{{url('web/qa/checkdetails')}}" method="post">
			{{csrf_field()}}
		<div class="pop_wrap" id="add_comment_main">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<input type="submit" class="pop_comment_send" value="提交" style="background:none;border: none">
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus" name="detail"></textarea>
			</div>
		</div><!--pop_wrap-->
		</form>

		<div class="pop_wrap" id="add_comment_sub">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<a href="javascript:void(0);" class="pop_comment_send">提交</a>
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus"></textarea>
			</div>
		</div><!--pop_wrap-->
{{--		@if(empty($errors))--}}
		<div class="tip_bar" id="tip_success"></div>
		<div class="tip_bar" id="tip_fav">已收藏</div>
	</body>
	<script>
        $("#form").submit(function(){
            $.ajax({
                url:"{{url('web/qa/checkdetails')}}",
				type:'get',
				data:$("#form").serialize(),
				datatype:'json',
				success:function(){
                    $("#tip_success").html('提交成功');
				},
				error:function(msg){
//				    alert(222);
				    var msg = JSON.parse(msg.responseText);
                    $("#tip_success").html(msg.detail);
				}
			});
			return false
        });
	</script>
</html>