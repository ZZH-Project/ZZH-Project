<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>问答</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/stickUp.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
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
	</head>
	<body class="body">
		
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">问答</h1>
				<a href="#" class="btn_page_back">
					<svg class="icon icon_page_back" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->

		<div class="sub_menu" id="sub_menu">
			<div class="wrap">
				<div class="sub_menu_wrap">
					<div class="sub_menu_bar">
						<ul>
							<li><a href="javascript:void(0);" class="sub_menu_select">热门</a></li>
							<li><a href="javascript:void(0);">最新</a></li>
							<li><a href="javascript:void(0);">教育</a></li>
							<li><a href="javascript:void(0);">生活</a></li>
							<li><a href="javascript:void(0);">运动</a></li>
							<li><a href="javascript:void(0);">教育</a></li>
							<li><a href="javascript:void(0);">生活</a></li>
							<li><a href="javascript:void(0);">运动</a></li>
						</ul>
						<div style="clear: both;"></div>
					</div><!--sub_menu_bar-->
				</div><!--sub_menu_wrap-->
				
				<div class="sub_menu_down">
					<a href="javascript:void(0);" class="btn_menu_down">
						<svg class="icon icon_menu_down" aria-hidden="true">
	                        <use xlink:href="#front_icon-xiala"></use>
	                    </svg>
					</a>
					<div class="pop_wrap" id="menu_cate">
						<div class="menu_cate_bar">
							<ul>
								<li><a href="javascript:void(0);">教育</a></li>
								<li><a href="javascript:void(0);">社会</a></li>
								<li><a href="javascript:void(0);">运动</a></li>
								<li><a href="javascript:void(0);">职场</a></li>
								<li><a href="javascript:void(0);">教育</a></li>
								<li><a href="javascript:void(0);">社会</a></li>
								<li><a href="javascript:void(0);">运动</a></li>
								<li><a href="javascript:void(0);">职场</a></li>
							</ul>
							<div style="clear: both;"></div>
						</div><!--qa_cate_bar-->
					</div><!--qa_cate_wrap-->
				</div><!--qa_menu_more-->
			</div><!--wrap-->
		</div><!--sub_menu-->
		
		<div class="qa_wrap" id="qa_wrap">
			<div class="wrap">
				<div class="qa_wrap_head">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div><!--user_img_bar-->
						<span class="qa_user_name">秋之雨</span>
					</div><!--left-->
					
					<div class="right">
						<span class="qa_status_bar status_green">已回答</span>
						<!--<span class="qa_status_bar status_red">待回答</span>-->
					</div><!--right-->
					<div style="clear: both;"></div>
				</div><!--qa_wrap_head-->
				
				<div class="qa_content_wrap">
					<a href="{{url('web/qa/details')}}" class="qa_title title_h1">魔兽世界 15级去哪升级？</a>
					<div class="qa_content content_p1">
						联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
					</div><!--qa_content-->
				</div><!--qa_content_wrap-->
				
				<div class="qa_wrap_bottom">
					<div class="left">
						<span class="cate_tip">游戏</span>
						<span class="time_tip">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<a href="javascript:void(0);" class="btn_comment right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<div style="clear: both;"></div>
				</div><!--qa_content_bottom-->
			</div><!--wrap-->
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="wrap">
				<div class="qa_wrap_head">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div><!--user_img_bar-->
						<span class="qa_user_name">秋之雨</span>
					</div><!--left-->
					
					<div class="right">
						<span class="qa_status_bar status_green">已回答</span>
						<!--<span class="qa_status_bar status_red">待回答</span>-->
					</div><!--right-->
					<div style="clear: both;"></div>
				</div><!--qa_wrap_head-->
				
				<div class="qa_content_wrap">
					<a href="{{url('web/qa/details')}}" class="qa_title title_h1">魔兽世界 15级去哪升级？</a>
					<div class="qa_content content_p1">
						联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
					</div><!--qa_content-->
				</div><!--qa_content_wrap-->
				
				<div class="qa_wrap_bottom">
					<div class="left">
						<span class="cate_tip">游戏</span>
						<span class="time_tip">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<a href="javascript:void(0);" class="btn_comment right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<div style="clear: both;"></div>
				</div><!--qa_content_bottom-->
			</div><!--wrap-->
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="wrap">
				<div class="qa_wrap_head">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div><!--user_img_bar-->
						<span class="qa_user_name">秋之雨</span>
					</div><!--left-->
					
					<div class="right">
						<span class="qa_status_bar status_green">已回答</span>
						<!--<span class="qa_status_bar status_red">待回答</span>-->
					</div><!--right-->
					<div style="clear: both;"></div>
				</div><!--qa_wrap_head-->
				
				<div class="qa_content_wrap">
					<a href="{{url('web/qa/details')}}" class="qa_title title_h1">魔兽世界 15级去哪升级？</a>
					<div class="qa_content content_p1">
						联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
					</div><!--qa_content-->
				</div><!--qa_content_wrap-->
				
				<div class="qa_wrap_bottom">
					<div class="left">
						<span class="cate_tip">游戏</span>
						<span class="time_tip">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<a href="javascript:void(0);" class="btn_comment right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<div style="clear: both;"></div>
				</div><!--qa_content_bottom-->
			</div><!--wrap-->
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="wrap">
				<div class="qa_wrap_head">
					<div class="left">
						<div class="user_img_bar user_img_middle left">
							<img src="{{asset('images/web/user_img.png')}}" />
						</div><!--user_img_bar-->
						<span class="qa_user_name">秋之雨</span>
					</div><!--left-->
					
					<div class="right">
						<span class="qa_status_bar status_green">已回答</span>
						<!--<span class="qa_status_bar status_red">待回答</span>-->
					</div><!--right-->
					<div style="clear: both;"></div>
				</div><!--qa_wrap_head-->
				
				<div class="qa_content_wrap">
					<a href="{{url('web/qa/details')}}" class="qa_title title_h1">魔兽世界 15级去哪升级？</a>
					<div class="qa_content content_p1">
						联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
					</div><!--qa_content-->
				</div><!--qa_content_wrap-->
				
				<div class="qa_wrap_bottom">
					<div class="left">
						<span class="cate_tip">游戏</span>
						<span class="time_tip">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="btn_comment btn_good right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<a href="javascript:void(0);" class="btn_comment right">
						<svg class="icon icon_comment" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</a>
					<div style="clear: both;"></div>
				</div><!--qa_content_bottom-->
			</div><!--wrap-->
		</div><!--qa_wrap-->
		
		<div class="footer_bar"></div>
		
		<div class="footer_fixed">
			<a href="{{url('web/qa/ask')}}" class="btn_ask btn_big">
				<div class="btn_bar">
					<svg class="icon icon_add_ask" aria-hidden="true">
                        <use xlink:href="#front_icon-552cd4fd7aa13"></use>
                   </svg>
					<span>我要提问</span>
        			</div><!--btn_ask_bar-->
			</a>
		</div><!--footer_fixed-->
	</body>
	<script>
		//页面定位
		jQuery(function($) {
			$(document).ready( function() {
				$('.sub_menu').stickUp();
			});
		});
	</script>
</html>