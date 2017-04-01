$(function(){
	
	//-----------------------------------------------------------//点赞/收藏
	$(".btn_comment_good,#btn_footer_fav,#btn_footer_good").click(function(){
		$(this).toggleClass("good_red");
	});
	
	//-----------------------------------------------------------//状态提醒
	$("#qa_submit").click(function(){
		$(".tip_bar").show().delay(800).fadeOut();
	});
	
	//-----------------------------------------------------------//回复评论
	$('.btn_add_comment_sub').click(function(){
		$('#add_comment_sub').show();
		$(".pop_comment_textarea").trigger("click").focus();
		//禁止页面在手机上滑动
		$('.pop_wrap').bind("touchmove",function(e){
			e.preventDefault();
		});
	});
	
	//-----------------------------------------------------------//底部功能条-收藏
	$("#btn_footer_fav").click(function(){
		$val = $(this).css("color");
		if( $val == "rgb(228, 66, 116)"){
			$("#tip_fav").show().delay(800).fadeOut();
		}
	});
	
	//-----------------------------------------------------------//底部功能条-评论
	$('#btn_footer_comment').click(function(){
		$('#add_comment_main').show();
		$(".pop_comment_textarea").trigger("click").focus();
		//禁止页面在手机上滑动
		$('.pop_wrap').bind("touchmove",function(e){
			e.preventDefault();
		});
	});
	//关闭评论框
	$('.pop_comment_close,.pop_comment_send').click(function(){
		$('.pop_wrap').hide();
	});
	//评论成功提交
	$(".pop_comment_send").click(function(){
		$("#tip_success").show().delay(800).fadeOut();
	});
	
	//-----------------------------------------------------------//底部功能条-分享
	$('#btn_footer_share').click(function(){
		$('#pop_share').slideDown();
		//禁止页面在手机上滑动
		$('.pop_wrap').bind("touchmove",function(e){
			e.preventDefault();
		});
	});
	$('.btn_share_close').click(function(){
		$('#pop_share').slideUp();
	});
});