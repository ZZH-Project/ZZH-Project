<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我要提问</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet"  />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script>
			$(function(){
				$(".ask_cate_wrap ul li a").click(function(){
					$(this).parent().parent().find("a").removeClass("ask_cate_select");
					$(this).addClass("ask_cate_select");
				});
				$(".btn_ask").click(function(){
					$(".tip_bar").show().delay(800).fadeOut();;
				});
			});
		</script>
	</head>
	<body class="body">
		<div class="head_wrap head_wrap_ask">
			<a href="{{url('web/qa/index')}}" class="head_left">
				<svg class="icon icon_back" aria-hidden="true">
                    <use xlink:href="#front_icon-fanhui1"></use>
                </svg>
			</a>
			<span>提问</span>
		</div><!--head_wrap-->
		<h2 class="h2_ask">问答分类：</h2>
		<div class="ask_wrap">
			<div class="ask_cate_wrap">
				<ul>
					<li><a href="javascript:void(0);">热门</a></li>
					<li><a href="javascript:void(0);">最新</a></li>
					<li><a href="javascript:void(0);">教育</a></li>
					<li><a href="javascript:void(0);">生活</a></li>
					<li><a href="javascript:void(0);">运动</a></li>
					<li><a href="javascript:void(0);">教育</a></li>
					<li><a href="javascript:void(0);">生活</a></li>
					<li><a href="javascript:void(0);">运动</a></li>
				</ul>
				<div style="clear: both;"></div>
			</div><!--ask_cate_wrap-->
		</div><!--ask_wrap-->
		<h2 class="h2_ask special">问答标题：</h2>
		<div class="ask_wrap">
			<input class="sak_input" />
		</div><!--ask_wrap-->
		<h2 class="h2_ask">问答详情：</h2>
		<div class="ask_wrap">
			<textarea class="sak_input ask_textarea"></textarea>
		</div><!--ask_wrap-->
		<a href="javascript:void(0);" class="btn_ask">提    交</a>
		<div class="tip_bar">提交成功</div>
	</body>
</html>