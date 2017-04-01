<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>问答详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/stickUp.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
		<script>
			$(function(){
				$('.btn_footer_share').click(function(){
					$('#pop_share').slideDown();
					//禁止页面在手机上滑动
					$('.pop_wrap').bind("touchmove",function(e){
						e.preventDefault();
					});
				});
				$('.btn_share_close').click(function(){
					$('#pop_share').slideUp();
				});
				
				$('.btn_ask_d').click(function(){
					$('#reply_add').show();
					$(".pop_textarea").trigger("click").focus();
					//禁止页面在手机上滑动
					$('.pop_wrap').bind("touchmove",function(e){
						e.preventDefault();
					});
				});
				
				$('.btn_comment_add').click(function(){
					$('#comment_add').show();
					$(".pop_textarea").trigger("click").focus();
					//禁止页面在手机上滑动
					$('.pop_wrap').bind("touchmove",function(e){
						e.preventDefault();
					});
				});
				
				$('.pop_close,.pop_send').click(function(){
					$('.pop_wrap').hide();
				});
				
			});
		</script>
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
			<h1 class="title_h1">魔兽世界 15级去哪升级？</h1>
			<p class="content_p1">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</p>
			<div class="cate_tip qa_tip_d">游戏</div>
		</div><!--qa_content_d-->
		<a href="javascript:void(0);" class="btn_big btn_ask_d">
			<div class="btn_bar">
				<svg class="icon icon_ask" aria-hidden="true">
                    <use xlink:href="#front_icon-xiepinglun"></use>
                </svg>
				<span>我要回答</span>
			</div>
		</a>
		<div class="qa_comment_head">
			<div class="left">
				<svg class="icon icon_comment_h" aria-hidden="true">
                    <use xlink:href="#front_icon-pinglun"></use>
                </svg>
                <span>回答</span>
			</div>
			<div class="right">
				23条回答
			</div>
		</div><!--qa_comment_head-->
		
		<div class="qa_comment_wrap">
			<div class="wrap">
				<div class="qa_comment_h">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="qa_user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--qa_comment_h-->
				<p class="content_p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</p>
				<div class="qa_content_bottom">
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                  	</a>
					<a href="javascript:void(0);" class="btn_comment btn_comment_add right">
						<svg class="icon icon_reply" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                    </svg>
					</a>
				</div><!--comment_d_bottom-->
				<div style="clear: both;"></div>
			</div><!--wrap-->
			
			<!--回复评论-->
			<div class="wrap comment_reply_wrap">
				<div class="qa_comment_h">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="qa_user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--qa_comment_h-->
				<p class="content_p2"><span class="reply_span">回复秋之雨：</span>联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</p>
				<div class="qa_content_bottom">
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                  	</a>
					<a href="javascript:void(0);" class="btn_comment btn_comment_add right">
						<svg class="icon icon_reply" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                    </svg>
					</a>
				</div><!--comment_d_bottom-->
				<div style="clear: both;"></div>
			</div>
		</div><!--qa_comment_wrap-->
		
		<div class="qa_comment_wrap">
			<div class="wrap">
				<div class="qa_comment_h">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div>
						<span class="qa_user_name">秋之雨</span>
					</div>
					<div class="right time_tip">2017-3-21  20:30:14</div>
					<div style="clear: both;"></div>
				</div><!--qa_comment_h-->
				<p class="content_p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</p>
				<div class="qa_content_bottom">
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                  	</a>
					<a href="javascript:void(0);" class="btn_comment btn_comment_add right">
						<svg class="icon icon_reply" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                    </svg>
					</a>
				</div><!--comment_d_bottom-->
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--qa_comment_wrap-->
		
		<div class="footer_bar"></div>
		
		<div class="footer_fixed">
			<ul class="comment_footer_d">
				<li>
					<a href="{{url('web/qa/index')}}">
						<svg class="icon icon_footer_back" aria-hidden="true">
		                    <use xlink:href="#front_icon-fanhui1"></use>
		                </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn_footer_fav">
						<svg class="icon icon_footer_fav" aria-hidden="true">
	                        <use xlink:href="#front_icon-shouc01"></use>
	                    </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn_footer_good">
						<svg class="icon icon_footer_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>234</span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn_footer_share">
						<svg class="icon icon_footer_share" aria-hidden="true">
	                        <use xlink:href="#front_icon-fenxiang"></use>
	                    </svg>
					</a>
				</li>
			</ul>
		</div><!--footer_fixed-->
		
		<div class="pop_wrap" id="pop_share" style="display: none;">
			<div class="share_bar">
				<ul class="share_list">
					<li>
						<a href="javascript:void(0);">
							<svg class="icon icon_share_weixin" aria-hidden="true">
		                        <use xlink:href="#front_icon-iconfontmoban"></use>
		                    </svg>
							<p>微信</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon icon_share_qq" aria-hidden="true">
		                        <use xlink:href="#front_icon-qq"></use>
		                    </svg>
							<p>QQ</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon icon_share_weibo" aria-hidden="true">
		                        <use xlink:href="#front_icon-P-copy"></use>
		                    </svg>
							<p>微博</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<svg class="icon icon_share_qqweibo" aria-hidden="true">
		                        <use xlink:href="#front_icon-tengxunweiboeps-copy"></use>
		                    </svg>
							<p>腾讯微博</p>
						</a>
					</li>
				</ul>
				<div style="clear: both;"></div>
				<a href="#" class="btn_share_close">
					<svg class="icon icon_share_close" aria-hidden="true">
                        <use xlink:href="#front_icon-guanbi01"></use>
                    </svg>
				</a>
			</div><!--share_bar-->
		</div><!--share_wrap-->
		
		<div class="pop_wrap" id="comment_add">
			<div class="pop_bar">
				<h1 class="pop_title">评论</h1>
				<textarea class="input pop_textarea" autofocus="autofocus"></textarea>
				<a href="javascript:void(0);" class="pop_send">提交</a>
				<a href="javascript:void(0);" class="pop_close">取消</a>
			</div>
		</div>
		
		<div class="pop_wrap" id="reply_add">
			<div class="pop_bar">
				<h1 class="pop_title">回答</h1>
				<textarea class="input pop_textarea" autofocus="autofocus"></textarea>
				<a href="javascript:void(0);" class="pop_send">提交</a>
				<a href="javascript:void(0);" class="pop_close">取消</a>
			</div>
		</div>
		
		<div class="tip_bar" id="tip_success">提交成功</div>
		
		<div class="tip_bar" id="tip_fav">已收藏</div>
		
	</body>
</html>