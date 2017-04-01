<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我要提问</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
		<script>
			$(function(){
				//菜单分类选择
				$(".ask_cate_wrap ul li a").click(function(){
					$(this).parent().parent().find("a").removeClass("ask_cate_select");
					$(this).addClass("ask_cate_select");
				});
			});
		</script>
	</head>
	<body class="body">
		
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">提问</h1>
				<a href="{{url('web/qa/index')}}" class="btn_page_back">
					<svg class="icon icon_page_back" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->
		
		<div class="wrap">
			<h2 class="title_h2 title_h2_ask">问答分类：</h2>
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
			<h2 class="title_h2 title_h2_ask special">问答标题：</h2>
			<input class="input ask_input" />
			<h2 class="title_h2 title_h2_ask">问答详情：</h2>
			<textarea class="textarea ask_textarea"></textarea>
			<a href="javascript:void(0);" class="btn_big btn_add_ask">提    交</a>
		</div><!--wrap-->

		<div class="tip_bar">提交成功</div>
	</body>
</html>