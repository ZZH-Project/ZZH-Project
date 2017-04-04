<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>评论</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css'}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">评论</h1>
			</div><!--wrap-->
		</div><!--head-->
		
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
					<a href="javascript:void(0);" class="right btn_comment_good">
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
					<a href="javascript:void(0);" class="right btn_comment_good">
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
					<a href="javascript:void(0);" class="right btn_comment_good">
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
			<ul class="fun_two">
				<li>
					<a href="{{url('web/qa/details')}}">
						<svg class="icon" aria-hidden="true">
		                    <use xlink:href="#front_icon-fanhui1"></use>
		                </svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" id="btn_footer_comment">
						<svg class="icon" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
					</a>
				</li>
			</ul>
		</div><!--footer_fun_wrap-->
		
		
		<div class="pop_wrap" id="add_comment_main">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<a href="javascript:void(0);" class="pop_comment_send">提交</a>
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus"></textarea>
			</div>
		</div><!--pop_wrap-->
		
		<div class="pop_wrap" id="add_comment_sub">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<a href="javascript:void(0);" class="pop_comment_send">提交</a>
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus"></textarea>
			</div>
		</div><!--pop_wrap-->
		
		<div class="tip_bar" id="tip_success">提交成功</div>

	</body>
</html>