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
	{{--{{var_dump($qacollect)}}--}}
	{{--{{var_dump($qa)}}--}}
		<div class="head head_white qa_head_d">
			<div class="wrap">
				<div class="user_img_bar user_img_70 left">
					<img src="{{url($qa->pic)}}"  />
				</div><!--left-->
				<div class="left qa_details_info">
					@if($qa->wusername == null)
					<p class="user_name_d">{{$qa->username}}</p>
					@else
					<p class="user_name_d">{{$qa->wusername}}</p>
					@endif
					<p class="qa_details_time">{{date('Y-m-d H:i:s',$qa->issue_time)}}</p>
				</div><!--left-->
				{{--<div class="qa_status_bar status_green qa_status_d right">已回答</div><!--right-->--}}
				<!--<div class="qa_status_bar status_red qa_status_d right">待回答</div><!--right-->
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--head-->
		{{--{{var_dump($qa)}}--}}
		{{--{{var_dump($qacomment)}}--}}
		<div class="qa_content_d">
			<h1 class="title_h1">{{$qa->title}}</h1>
			<p class="content p1">{{$qa->content}}</p>
			<div class="cate_tip qa_tip_d">{{$qa->cate_name}}</div>
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
					<a href="{{url('web/qa/index')}}" class="a_red">查看全部问题</a>
				</div>
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--comment_head-->
		<div class="comment_head" style="border-bottom: none;border-top: none;">
			<div class="wrap" style="padding-left: 26%;padding-top: 3%;">
				<!-- JiaThis Button BEGIN -->
				<div class="jiathis_style_32x32">
					<a class="jiathis_button_qzone"></a>
					<a class="jiathis_button_tsina"></a>
					<a class="jiathis_button_tqq"></a>
					<a class="jiathis_button_weixin"></a>
					<a class="jiathis_button_renren"></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
				<!-- JiaThis Button END -->
				<div style="clear: both;"></div>
			</div><!--wrap-->
		</div><!--comment_head-->
		@foreach($qacomment as $v)
			@if($v->is_show == 1)
				<div class="comment_wrap">
				<div class="wrap">
				<div class="comment_head_wrap">
					<div class="left">
						<div class="user_img_bar user_img_50 left">
							<img src="{{$v->pic == null ? '' : url($v->pic)}}" width="50px" height="50px"/>
						</div>
						@if($v->wusername == null)
						<span class="user_name">{{$v->username}}</span>
						@else
						<span class="user_name">{{$v->wusername}}</span>
						@endif
					</div>
					<div class="right time_tip">{{date('Y-m-d H:i:s',$v->issue_time)}}</div>
					<div style="clear: both;"></div>
				</div><!--comment_head_wrap-->
				@if($v->comment_id != 0)
						<div class="content p2"><span style="color: #AFAFAD;">回复<b></b>:{{$v->content}}</div>
				@else
					<div class="content p2">{{$v->content}}</div>
				@endif
				
				<div class="fun_info_bar">
					<a id="good" href="javascript:void(0);" class="right btn_comment_good" onclick="good(this)">
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
						<span>{{$v->good_num}}</span>
						<input type="hidden" name="qa_id" value="{{$v->id}}">
					</a>
					<a href="javascript:void(0);" class="right btn_add_comment_sub" onclick="cid(this)">
						<svg class="icon icon_em_30" aria-hidden="true">
	                        <use xlink:href="#front_icon-huifu"></use>
	                   </svg>
						<input type="hidden" value="{{$v->id}}">
                   	</a>
					<div style="clear: both;"></div>
				</div><!--fun_info_bar-->
			</div><!--wrap-->



		<!--回复评论-->
				{{--<div class="wrap comment_sub_wrap">--}}
				{{--<div class="comment_head_wrap">--}}
					{{--<div class="left">--}}
						{{--<div class="user_img_bar user_img_50 left">--}}
							{{--<img src="{{asset('images/web/user_img.png')}}" />--}}
						{{--</div>--}}
						{{--<span class="user_name">秋之雨</span>--}}
					{{--</div>--}}
					{{--<div class="right time_tip">2017-3-21  20:30:14</div>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--comment_head_wrap-->--}}

				{{--<div class="content p2"><span style="color: #C0BEBF;;">回复<b>雨之秋</b>:</span>联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</div>--}}

				{{--<div class="fun_info_bar">--}}
					{{--<a href="javascript:void(0);" class="right btn_comment_good" >--}}
						{{--<svg class="icon icon_em_30" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-icondianzan"></use>--}}
	                    {{--</svg>--}}
						{{--<span>20</span>--}}
					{{--</a>--}}
					{{--<a href="javascript:void(0);" class="right btn_add_comment_sub" >--}}
						{{--<svg class="icon icon_em_30" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-huifu"></use>--}}
	                   {{--</svg>--}}
                   	{{--</a>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--fun_info_bar-->--}}
			{{--</div><!--wrap-->--}}
		</div><!--comment_wrap-->
			@endif
		@endforeach


		{{--<div class="comment_wrap">--}}
			{{--<div class="wrap">--}}
				{{--<div class="comment_head_wrap">--}}
					{{--<div class="left">--}}
						{{--<div class="user_img_bar user_img_50 left">--}}
							{{--<img src="{{asset('images/web/user_img.png')}}" />--}}
						{{--</div>--}}
						{{--<span class="user_name">秋之雨</span>--}}
					{{--</div>--}}
					{{--<div class="right time_tip">2017-3-21  20:30:14</div>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--comment_head_wrap-->--}}

				{{--<div class="content p2">联盟去西部荒野或者黑海岸做任务，推荐西部荒野；部落去希尔斯布莱德丘陵、北贫瘠之地。</div>--}}

				{{--<div class="fun_info_bar">--}}
					{{--<a href="javascript:void(0);" class="right btn_comment_good" >--}}
						{{--<svg class="icon icon_em_30" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-icondianzan"></use>--}}
	                    {{--</svg>--}}
						{{--<span>20</span>--}}
					{{--</a>--}}
					{{--<a href="javascript:void(0);" class="right btn_add_comment_sub" >--}}
						{{--<svg class="icon icon_em_30" aria-hidden="true">--}}
	                        {{--<use xlink:href="#front_icon-huifu"></use>--}}
	                   {{--</svg>--}}
                   	{{--</a>--}}
					{{--<div style="clear: both;"></div>--}}
				{{--</div><!--fun_info_bar-->--}}
			{{--</div><!--wrap-->--}}
		{{--</div><!--comment_wrap-->--}}
		
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
					@if($qacollect == '')
					<a href="javascript:void(0);" id="btn_footer_fav" class="" onclick="fav(this)">
						<svg class="icon icon_em_38" aria-hidden="true">
	                        <use xlink:href="#front_icon-shouc01"></use>
	                    </svg>
						<input type="hidden" value="{{$qa->id}}">
						<input type="hidden" value="{{session('wuid')}}">
					</a>
					@elseif($qacollect != '')
						<a href="javascript:void(0);" id="btn_footer_fav" class="good_red" onclick="fav(this)">
							<svg class="icon icon_em_38" aria-hidden="true">
								<use xlink:href="#front_icon-shouc01"></use>
							</svg>
							<input type="hidden" value="{{$qa->id}}">
							<input type="hidden" value="{{session('wuid')}}">
						</a>
					@endif
				</li>
				<li>
					<a href="javascript:void(0);" id="btn_footer_good" class="" onclick="mgood(this)">
						<svg class="icon" aria-hidden="true">
	                        <use xlink:href="#front_icon-icondianzan"></use>
	                    </svg>
	                    <span style="text-align:right;">{{$qa->good_num}}</span>
						<input type="hidden" value="{{$qa->id}}">
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
			<input type="hidden" name="qlid" value="{{$qa->id}}">
			<input type="hidden" name="wuid" value="{{session('wuid')}}">
		<div class="pop_wrap" id="add_comment_main">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<input type="submit" class="pop_comment_send" value="提交" style="background:none;border: none">
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus" name="detail"></textarea>
			</div>
		</div><!--pop_wrap-->
		</form>

		<form id="form1" action="{{url('web/qa/checkdetails')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="qlid" value="{{$qa->id}}">
			<input id="cid" type="hidden" name="cmid" value="">
			<input type="hidden" name="wuid" value="{{session('wuid')}}">
		<div class="pop_wrap" id="add_comment_sub">
			<div class="pop_bar_footer">
				<h1 class="pop_comment_title">评论</h1>
				<input type="submit" class="pop_comment_send" value="提交" style="background:none;border: none">
				<a href="javascript:void(0);" class="pop_comment_close">取消</a>
				<textarea class="input pop_comment_textarea" autofocus="autofocus" name="detail2"></textarea>
			</div>
		</div><!--pop_wrap-->
		</form>
{{--		@if(empty($errors))--}}
		<div class="tip_bar" id="tip_success"></div>
		<div class="tip_bar" id="tip_fav"></div>
	</body>
	<script>
		//回复
        $("#form").submit(function(){
            $.ajax({
                url:"{{url('web/qa/checkdetails')}}",
				type:'get',
				data:$("#form").serialize(),
				datatype:'json',
				success:function(data){
                    console.log(data);
                    $("#tip_success").html('提交成功');
                    location.href = "{{url('web/qa/details').'/'.$qa->id}}";
				},
				error:function(msg){
//				    alert(222);
				    var msg = JSON.parse(msg.responseText);
                    $("#tip_success").html(msg.detail);
				}
			});
			return false
        });
        //子评论回复
        $("#form1").submit(function(){
            $.ajax({
                url:"{{url('web/qa/checkdetailsc')}}",
                type:'get',
                data:$("#form1").serialize(),
                datatype:'json',
                success:function(data){
                    console.log(data);
                    $("#tip_success").html('提交成功');
                    location.href = "{{url('web/qa/details').'/'.$qa->id}}";
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
	<script>
		//获取评论id
		function cid(cid){
		    $("#cid").val(cid.childNodes[3].value);
		}
	</script>
	<script>
        //点赞
        function good(a){
//            console.log(a.attributes[2].value);
            console.log(a.childNodes[3].innerHTML);
            var qaid =a.childNodes[5].value;
            if("{{session('weblogin')==null}}"){
                alert('请先登录');
                a.attributes[2].value = 'right btn_comment_good good_red';
            }else {
                if(a.attributes[2].value == 'right btn_comment_good'){
                    $.ajax({
                        url:"{{url('web/qa/cdgoodadd')}}",
                        type:'get',
                        data:{qaid:qaid},
                        datatype:'json',
                        success:function(data){
                            a.childNodes[3].innerHTML = data;
                        },
                        error:function(){}
                    });
                }else if(a.attributes[2].value == 'right btn_comment_good good_red'){
                    $.ajax({
                        url:"{{url('web/qa/cdgoodmin')}}",
                        type:'get',
                        data:{qaid:qaid},
                        datatype:'json',
                        success:function(data){
                            a.childNodes[3].innerHTML = data;
                        },
                        error:function(){}
                    });
                }
            }
        }
	</script>
	<script>
	//问题点赞
	function mgood(a){
//         console.log(a.childNodes[3].innerHTML);
//		console.log(a.attributes[2]);
//		console.log(a.childNodes[5].value);
		var qaid =a.childNodes[5].value;
		if(a.attributes[2].value == ''){
			$.ajax({
				url:"{{url('web/qa/goodadd')}}",
				type:'get',
				data:{qaid:qaid},
				datatype:'json',
				success:function(data){
					a.childNodes[3].innerHTML = data;
				},
				error:function(){}
			});
		}else if(a.attributes[2].value == 'good_red'){
			$.ajax({
				url:"{{url('web/qa/goodmin')}}",
				type:'get',
				data:{qaid:qaid},
				datatype:'json',
				success:function(data){
				a.childNodes[3].innerHTML = data;
				},
				error:function(){}
			});
		}
	}

	//收藏
	function fav(a) {
        var qaid = a.childNodes[3].value;
        var wuid = a.childNodes[5].value;
//        console.log(a.childNodes[5].value);
        if (a.attributes[2].value == '') {
            $.ajax({
                url: "{{url('web/qa/collectadd')}}",
                type: 'get',
                data: {qaid: qaid, wuid: wuid},
                datatype: 'json',
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.a == 1) {
                        $("#tip_fav").html('已收藏');
                    } else {
                        $("#tip_fav").html('收藏失败');
                        a.attributes[2].value == 'good_red';
                    }
                },
                error: function () {
                }
            });
        } else if (a.attributes[2].value == 'good_red') {
            var qaid = a.childNodes[3].value;
            var wuid = a.childNodes[5].value;
//        console.log(a.childNodes[5].value);
            $.ajax({
                url: "{{url('web/qa/collectmin')}}",
                type: 'get',
                data: {qaid: qaid, wuid: wuid},
                datatype: 'json',
                success: function (data) {
                    data = JSON.parse(data);
                },
                error: function () {
                }
            });
        }
    }
</script>
</html>