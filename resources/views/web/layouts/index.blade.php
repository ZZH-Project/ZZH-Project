<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title','前台模板')</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5" />
    @yield('bootstrap_style')
    <link href="{{asset('css/base.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/web/public.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
    @yield('style')
    <script src="{{asset('js/jquery_2_1_4.min.js')}}" type="text/javascript"></script>
    @yield('bootstrap_script')
    <script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/public_zl.js')}}" type="text/javascript"></script>
    @yield('script')
    <script type="text/javascript">
        $(function(){
            $("#website_menu").click(function(){
                $(this).hide();
                $("#pop_website_menu").slideDown();
                //禁止页面在手机上滑动
                $('.pop_wrap').bind("touchmove",function(e){
                    e.preventDefault();
                });
            });
            $("#pop_menu_close").click(function(){
                $("#website_menu").show();
                $("#pop_website_menu").slideUp();
            });
        });
    </script>
</head>
<body class="body">

@yield('body')

<div class="website_menu" >
    <a href="javascript:void(0);" id="website_menu">
        <svg class="icon icon_em_30" aria-hidden="true">
            <use xlink:href="#front_icon-11"></use>
        </svg>
    </a>
</div><!--website_menu-->
<div class="pop_wrap pop_wrap_white" id="pop_website_menu">
    <div class="pop_user_img_wrap">
        <img src="{{asset('images/web/login_logo.png')}}" />
    </div><!--pop_user_img_wrap-->
    <ul class="pop_user_btn">
        @if(session('weblogin')!=1)
        <li><a href="{{url('web/user/login')}}">登录</a></li>
        <li><a href="{{url('web/user/register')}}">注册</a></li>
        @endif
    </ul>
    <div style="clear: both;"></div>
    <ul class="pop_menu_wrap">
        <li><a href="{{url('web/index')}}">美丽首页</a></li>
        @foreach($data as $v)
        <li><a href="{{url($v->routes)}}">{{$v->cate_name}}</a></li>
        @endforeach
    </ul>
    <div style="clear: both;"></div>
    <a href="javascript:void(0);" class="pop_menu_close" id="pop_menu_close">
        <svg class="icon icon_em_40" aria-hidden="true">
            <use xlink:href="#front_icon-guanbi01"></use>
        </svg>
    </a>
</div><!--pop_wrap-->
</body>
</html>