@extends('web.layouts.index')
@section('title','吐槽')
@section('style')
    <link href="{{asset('css/web/theme_zl.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/web/qa_zl.css')}}" type="text/css" rel="stylesheet" />
@endsection
@section('body')

    <div class="head">
        <div class="wrap">
            <h1 class="page_title">吐槽</h1>
        </div><!--wrap-->
    </div><!--head-->

    <div class="banner_wrap">
        @foreach($banner_img as $v)
            <img src='{{asset("upload/images/$v->banner_img")}}'  />
        @endforeach
    </div><!--banner_wrap-->

    @foreach($data as $v)
    <div class="comment_wrap">
        <div class="wrap">
            <div class="comment_head_wrap">
                <div class="left">
                    <div class="user_img_bar user_img_50 left">
                        <img src="{{asset('images/web/user_img.png')}}" />
                    </div>
                    <span class="user_name">{{$v->username}}</span>
                </div>
                <div class="right time_tip">{{$v->created_at}}</div>
                <div style="clear: both;"></div>
            </div><!--comment_head_wrap-->

            <div class="content p2">{{$v->content}}</div>

            <!--<div class="fun_info_bar">
                <a href="javascript:void(0);" class="right btn_comment_good">
                    <svg class="icon icon_em_30" aria-hidden="true">
                        <use xlink:href="#front_icon-icondianzan"></use>
                    </svg>
                    <span>20</span>
                </a>
                <a href="javascript:void(0);" class="right btn_add_comment_sub" >
                    <svg class="icon icon_em_30" aria-hidden="true">
                        <use xlink:href="#front_icon-huifu"></use>
                   </svg>
                </a>
                <div style="clear: both;"></div>
            </div><!--fun_info_bar-->
        </div><!--wrap-->
    </div><!--comment_wrap-->
    @endforeach

    <div class="footer_fun_bg"></div>

    <div class="footer_fun_wrap">
        <a href="{{url('web/discuss/add')}}" class="btn_add_content btn_add_ask">
            <div class="btn_bar">
                <svg class="icon icon_em_20" aria-hidden="true">
                    <use xlink:href="#front_icon-552cd4fd7aa13"></use>
               </svg>
                <span>我要吐槽</span>
                </div><!--btn_ask_bar-->
        </a>
    </div><!--footer_fixed-->
@endsection