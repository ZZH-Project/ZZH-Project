<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>意见反馈</title>
		<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
		<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
		<link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
		<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
	</head>
	<body class="body">
		
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">意见反馈</h1>
				<a href="{{url('web/center/index')}}" class="btn_page_back">
					<svg class="icon icon_em_40" aria-hidden="true">
	                    <use xlink:href="#front_icon-fanhui1"></use>
	                </svg>
				</a>
			</div><!--wrap-->
		</div><!--head-->

        <form action="{{url('web/center/feedbackAdd')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" value="{{session('wuid')}}" name="user_id" />
		<div class="wrap ask_main_wrap">
			<h2 class="title_h2 special">反馈标题：</h2>
			<input class="input" name="title" />
			<h2 class="title_h2">反馈详情：</h2>
			<textarea class="textarea" name="content"></textarea>
            <input type="submit" class="btn_add_content" value="提    交" id="feedbackSubmit" />
		</div><!--wrap-->
        </form>

		<div class="tip_bar">提交成功</div>
	</body>
</html>