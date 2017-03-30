<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>问答</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/stickUp.min.js')}}" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$('.sub_menu_ul ul li a').click(function(){
					$(this).parent().parent().find("a").removeClass('sub_menu_select');
					$(this).addClass('sub_menu_select');
				});
				$('.qa_menu_down').click(function(){
					$val = $("#sub_menu").css("position");
		     		if( $val == "fixed"){
		     			$(".qa_cate_wrap").css("top","78px");
		     		} else {
		     			$(".qa_cate_wrap").css("top","168px");
		     		}
					$('body').toggleClass("qa_hidden");
					$('.qa_cate_wrap').slideToggle();
					$('.qa_cate_wrap').bind("touchmove",function(e){
						e.preventDefault();
					});
				});
				$('.qa_cate_bar ul li a,.sub_menu_ul ul li a,.qa_cate_wrap').click(function(){
					$('body').css('overflow', 'auto');
					$('.qa_cate_wrap').slideUp();
				});
				$(".btn_comment_good").click(function(){
					$(this).toggleClass("comment_red");
//					$(this).find("svg").css("color", "red");
				});
			});
		</script>
	</head>
	<body class="body">
		<div class="head_wrap">
			<a href="#" class="head_left">
				<svg class="icon icon_back" aria-hidden="true">
                    <use xlink:href="#front_icon-fanhui1"></use>
                </svg>
			</a>
			<span>问答</span>
		</div><!--head_wrap-->

		<div class="sub_menu" id="sub_menu">
			<div class="menu_ul_bar">
				<div class="sub_menu_ul">
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
				</div><!--sub_menu_ul-->
			</div><!--menu_ul_bar-->
			
			<div class="qa_menu_more">
				<a href="javascript:void(0);" class="qa_menu_down">
					<svg class="icon icon_menu_down" aria-hidden="true">
                        <use xlink:href="#front_icon-xiala"></use>
                    </svg>
				</a>
				<div class="qa_cate_wrap">
					<div class="qa_cate_bar">
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
			</div>
		</div><!--sub_menu-->
		
		<div class="qa_wrap" id="qa_wrap">
			<div class="qa_wrap_head">
				<div class="left">
					<div class="left qa_user_img">
						<img src="{{asset('images/web/user_img.png')}}" />
					</div><!--qa_user_img-->
					<span class="qa_user_name">秋之雨</span>
				</div><!--left-->
				<div class="right">
					<span class="qa_status_bar green">已回答</span>
					<!--<span class="qa_status_bar red">待回答</span>-->
				</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--qa_wrap_head-->
			<div class="qa_content_wrap">
				<a href="#" class="qa_title">魔兽世界 15级去哪升级？</a>
				<div class="qa_content">
					联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
				</div><!--qa_content-->
				<div class="qa_content_bottom">
					<div class="left">
						<span class="qa_cate_tip">游戏</span>
						<span class="qa_time">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="right btn_comment_good">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<div class="right">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</div><!--right-->
					<div style="clear: both;"></div>
				</div><!--qa_content_bottom-->
			</div><!--qa_content-->
			<div style="clear: both;"></div>
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="qa_wrap_head">
				<div class="left">
					<div class="left qa_user_img">
						<img src="{{asset('images/web/user_img.png')}}" />
					</div><!--qa_user_img-->
					<span class="qa_user_name">秋之雨</span>
				</div><!--left-->
				<div class="right">
					<!--<span class="qa_status_bar green">已回答</span>-->
					<span class="qa_status_bar red">待回答</span>
				</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--qa_wrap_head-->
			<div class="qa_content_wrap">
				<a href="#" class="qa_title">魔兽世界 15级去哪升级？</a>
				<div class="qa_content">
					联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
				</div><!--qa_content-->
				<div class="qa_content_bottom">
					<div class="left">
						<span class="qa_cate_tip">游戏</span>
						<span class="qa_time">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="right btn_comment_good">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<div class="right">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</div><!--right-->
				</div><!--qa_content_bottom-->
			</div><!--qa_content-->
			<div style="clear: both;"></div>
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="qa_wrap_head">
				<div class="left">
					<div class="left qa_user_img">
						<img src="{{asset('images/web/user_img.png')}}" />
					</div><!--qa_user_img-->
					<span class="qa_user_name">秋之雨</span>
				</div><!--left-->
				<div class="right">
					<span class="qa_status_bar green">已回答</span>
					<!--<span class="qa_status_bar red">待回答</span>-->
				</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--qa_wrap_head-->
			<div class="qa_content_wrap">
				<a href="#" class="qa_title">魔兽世界 15级去哪升级？</a>
				<div class="qa_content">
					联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
				</div><!--qa_content-->
				<div class="qa_content_bottom">
					<div class="left">
						<span class="qa_cate_tip">游戏</span>
						<span class="qa_time">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="right btn_comment_good">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<div class="right">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</div><!--right-->
				</div><!--qa_content_bottom-->
			</div><!--qa_content-->
			<div style="clear: both;"></div>
		</div><!--qa_wrap-->
		
		<div class="qa_wrap">
			<div class="qa_wrap_head">
				<div class="left">
					<div class="left qa_user_img">
						<img src="{{asset('images/web/user_img.png')}}" />
					</div><!--qa_user_img-->
					<span class="qa_user_name">秋之雨</span>
				</div><!--left-->
				<div class="right">
					<span class="qa_status_bar green">已回答</span>
					<!--<span class="qa_status_bar red">待回答</span>-->
				</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--qa_wrap_head-->
			<div class="qa_content_wrap">
				<a href="#" class="qa_title">魔兽世界 15级去哪升级？</a>
				<div class="qa_content">
					联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫之地。
				</div><!--qa_content-->
				<div class="qa_content_bottom">
					<div class="left">
						<span class="qa_cate_tip">游戏</span>
						<span class="qa_time">2017-3-21  20:30:14</span>
					</div><!--left-->
					<a href="javascript:void(0);" class="right btn_comment_good">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span>14</span>
                   </a>
					<div class="right">
						<svg class="icon icon_comment_good" aria-hidden="true">
	                        <use xlink:href="#front_icon-pinglun"></use>
	                   </svg>
						<span>20</span>
					</div><!--right-->
				</div><!--qa_content_bottom-->
			</div><!--qa_content-->
			<div style="clear: both;"></div>
		</div><!--qa_wrap-->
		
		<div class="qa_footer_bar"></div>
		
		<div class="qa_footer">
			<a href="{{url('web/qa/ask')}}" class="qa_btn_ask">
				<div class="btn_ask_bar">
					<svg class="icon icon_add_ask" aria-hidden="true">
                        <use xlink:href="#front_icon-552cd4fd7aa13"></use>
                   </svg>
					<span>我要提问</span>
               </div>
			</a>
		</div><!--qa_footer-->
	</body>
	<script type="text/javascript">
      jQuery(function($) {
        $(document).ready( function() {
          $('.sub_menu').stickUp();
        });
      });
    </script>
</html>
