<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>提交</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
	<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
	<link href="{{asset('css/web/wechat_zl.css')}}" type="text/css" rel="stylesheet" />
	<script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
</head>
<body class="body">
	<div class="head">
		<div class="wrap">
			<h1 class="page_title">提交</h1>
			<a href="{{url('web/wechat/index')}}" class="btn_page_back">
				<svg class="icon icon_em_40" aria-hidden="true">
					<use xlink:href="#front_icon-fanhui1"></use>
				</svg>
			</a>
		</div><!--wrap-->
	</div><!--head-->

    <form action="{{url('web/wechat/addData')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" value="{{session('wuid')}}" name="user_id" />
	<div class="wrap">
		<ul class="submint_list">
			<li>
				<span>分类：</span>
				<select class="form-control" name="cate_id">
					@foreach($data as $val)
					<option value="{{$val['id']}}">{{$val->cate_name}}</option>
					@endforeach
				</select>
				<div class="icon_more">
					<svg class="icon icon_em_25" aria-hidden="true">
						<use xlink:href="#front_icon-fanhui1-copy"></use>
					</svg>
				</div><!--icon_more-->
			</li>
			<li>
				<span>微信名：</span>
				<input  class="form-control" name="wechat_name"/>
			</li>
			<li>
				<span>微信号：</span>
				<input  class="form-control" name="wechat_id"/>
			</li>
			<li class="textarea_li">
				<span>简介：</span>
				<textarea class="form-control" name="content"></textarea>
			</li>
		</ul>
        <input type="submit" class="btn_add_content" value="提    交" id="wechatSubmit" />
	</div><!--wrap-->
    </form>
</body>
</html>