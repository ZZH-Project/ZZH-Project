@extends('web.layouts.index')
@section('title','地图')
@section('style')
    <style type="text/css">
        body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
        #l-map{height:300px;width:100%;}
        #r-result,#r-result table{width:100%;}
    </style>
@endsection
@section('script')
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=jaf1KLm9dNtC69SdP85VXBEyb0Hxl3Xk"></script>
@endsection
@section('body')
    <script>
        $(function(){
            var height = $(window).height();
            $("#allmap").css({"height":height});

        });
    </script>

    <div class="head">
        <div class="wrap">
            <h1 class="page_title">地图</h1>
        </div><!--wrap-->
    </div><!--head-->

    <div id="l-map"></div>
    <div id="r-result" ></div>

    <script type="text/javascript">
        var map = new BMap.Map("l-map");
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
        var walking = new BMap.WalkingRoute(map, {renderOptions: {map: map, panel: "r-result", autoViewport: true}});
        walking.search("汶水路地铁站", "上海市人民政府");
    </script>

@endsection