$(function(){
	//评论点赞
	$(".btn_good,.btn_footer_fav,.btn_footer_good").click(function(){
		$(this).toggleClass("good_red");
	});
	//提问状态提醒
	$(".btn_add_ask").click(function(){
		$(".tip_bar").show().delay(800).fadeOut();;
	});
	
	$(".pop_send").click(function(){
		$("#tip_success").show().delay(800).fadeOut();;
	});
	
	$(".btn_footer_fav").click(function(){
		$val = $(this).css("color");
		if( $val == "rgb(228, 66, 116)"){
			$("#tip_fav").show().delay(800).fadeOut();;
		}
	});
});


