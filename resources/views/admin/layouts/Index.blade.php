<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','后台模板')</title>
  @section('style')
  @show
  <style>
    .alt{
      position: fixed;
      z-index: 9999999999;
      top: 40%;
      left: 50%;
      font-size: 16px;
      color: white;
      border-radius: 10px;
      background: black;
      display: none;
      opacity: 1;
      padding: 15px;
    }
    #show{
      position: absolute;
      text-indent: 20px;
      margin: auto;
      top:0;
      left:0;
      right:0;
      bottom:300px;
      width:400px;
      max-height:280px;
      padding:10px;
      overflow-y: auto;
      display: none;
      font-size: 16px;
      color: white;
      background: #9cbf91;
      box-shadow: 0px 0px 5px 1px #9cbf91;
      z-index: 9999999;
    }
  </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link href="{{asset('css/web/icon_font.css')}}" type="text/css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <script src="{{asset('js/iconfont.js')}}" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin/index')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>美</b>丽</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>美丽联合</b> Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{session('auser')['username']}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                <p style="color: black;">
                  Hello!
                  <small style="font-size: 20px;color: white;">{{session('auser')['username']}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="##" class="btn btn-default btn-flat">详细信息</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="font-size: 18px;">{{session('auser')['username']}}</p>
          <i class="fa fa-circle text-success"></i> 在线
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">导航菜单:)</li>
        @foreach($permissions as $v)
          @if($v->auser_id == session('auser')['id'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>{{$v->display_name}}管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url($v->name.'/show')}}"><i class="fa fa-circle-o"></i> {{$v->display_name}}列表</a></li>
	  @if(!in_array($v->id,[50,43,44,45,52,53,56,57]))
            <li><a href="{{url($v->name.'/add')}}"><i class="fa fa-circle-o"></i> 添加{{$v->display_name}}</a></li>
	  @endif
          </ul>
        </li>
          @endif
        @endforeach

        <li class="header">其他</li>
        {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要信息</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>一般信息</span></a></li>--}}
        <li><a href="{{url('admin/info')}}"><i class="fa fa-circle-o text-aqua"></i> <span>实时消息</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- 右侧主体，用于显示后台功能 -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="position: relative">
    <div class="alt"></div>
    <div id="show"></div>
    <section class="content-header">
      <h1>
        @yield('title-first')
        <small>@yield('title-second')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/index')}}" title="美丽后台"><i class="fa fa-dashboard"></i>美丽联合</a></li>
        <li>@yield('title-first')</li>
        <li class="active">@yield('title-second')</li>
      </ol>
    </section>
    <div style="padding:15px;">
      @section('main')
      @show
    </div>
  </div>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--  jQuery 1.8.3 -->
<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<!-- jQuery 2.2.3 -->
<script src="{{asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{--<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>--}}
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

@section('script')
@show
</body>
</html>
