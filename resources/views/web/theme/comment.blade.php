<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>{{$list->title}}</title>
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
		<div class="head">
			<div class="wrap">
				<h1 class="page_title">{{$list->title}}</h1>
			</div><!--wrap-->
		</div><!--head-->

		@foreach($comment as $v)
			<div class="comment_wrap">
				<div class="wrap">
					<div class="comment_head_wrap">
						<div class="left">
							<div class="user_img_bar user_img_50 left">
								@if($v->pic != null)
									<img src="{{asset("$v->pic")}}" />
								@else
									<img src="{{asset('images/web/user_img.png')}}" />
								@endif
							</div>
							@if($v->wusername == null)
								<span class="user_name">{{str_replace(substr($v->username,3,4),'****',$v->username)}}</span>
							@else
								<span class="user_name">{{$v->wusername}}</span>
							@endif
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
			<ul class="fun_two">
				<li>
					<a href="javascript:void(0);" onclick="history.go(-1)">
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
				<form id="f1" action="{{url("web/theme/submit").'/'.$_GET['thid'].'/'.$_GET['cid']}}" method="get">
					<input type="submit" style="cursor: pointer;background: rgba(0,0,0,0);border:0px solid white;" class="pop_comment_send" value="提交">
					<a href="javascript:void(0);" class="pop_comment_close">返回</a>
					<textarea class="input pop_comment_textarea" name="content" autofocus="autofocus"></textarea>
				</form>
			</div>
		</div><!--pop_wrap-->
		
		<div class="tip_bar" id="tip_success">提交成功</div>

	</body>
	<script>
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
</html>