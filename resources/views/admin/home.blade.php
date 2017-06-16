<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>管理后台</title>
  <link rel="shortcut icon" href="">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/iCheck/all.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables/dataTables.bootstrap.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

  @yield('css')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini skin-red fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <strong class="logo-mini">后台管理</strong>
      <strong class="logo-lg">后台管理</strong>
    </a>
    <!-- Header Navbar: style  can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- 顶部导航的左边 -->
      <!--ul class="nav navbar-nav navbar-left">
          <li class="@yield('top-index')"><a href="/">首页</a></li>
          <li class="@yield('top-article')"><a href="/admin/article/">文章管理</a></li>
          <li class="@yield('top-comment')"><a href="/admin/comment/">评论管理</a></li>
          <li class="@yield('top-catetory')"><a href="/admin/catetory/">分类管理</a></li>
          <li class="@yield('top-users')"><a href="/admin/users/">用户管理</a></li>
      </ul -->

      <!-- 顶部导航的右边 -->
      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              
              <li>
                  <a href="/logout">注销</a>
              </li>
             
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- 侧边导航 - 开始 -->
        <ul class="sidebar-menu" style="'display: block'">
            <li class="@yield('console')">
                <a href="/admin">
                    <i class="fa fa-circle-o"></i>
                    <span> 首页 </span>
                </a>
            </li>
            <li class="@yield('left-article')">
                <a href="/admin/article/">
                    <i class="fa fa-circle-o"></i>
                    <span> 文章管理 </span>
                </a>
            </li>
            <li class="@yield('left-comment')">
                <a href="/admin/comment/">
                    <i class="fa fa-circle-o"></i>
                    <span> 评论管理 </span>
                </a>
            </li>
            <li class="@yield('left-catetory')">
                <a href="/admin/catetory/">
                    <i class="fa fa-circle-o"></i>
                    <span> 分类管理 </span>
                </a>
            </li>
            <li class="@yield('left-user')">
                <a href="/admin/user/">
                    <i class="fa fa-circle-o"></i>
                    <span> 用户管理 </span>
                </a>
            </li>
        </ul>

       
        <!-- 侧边导航 - 结束 -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          @yield('path')
      </section>

    <!-- Main content -->
    <section class="content">
        @if(!empty($errors))
            <!-- 闪现错误消息 -->
            @foreach ($errors->all() as $e)
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>error!</strong> {{ $e }}
                </div>
            @endforeach
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-error" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ session('info') }}</strong>
            </div>
        @endif

        @yield('main')
    </section>
  </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright ©2016 </strong> All Rights Reserved. 
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs"></ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab"></div>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script type="text/javascript">
    function alertModel () {
        $('#alertModel').modal();
    }
</script>


<!-- jQuery 2.2.3 -->
<script src="{{ asset('assets/lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('assets/lte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- dataTable -->
<script src="{{ asset('assets/lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- jvectormap -->
<script src="{{ asset('assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/lte/plugins/knob/jquery.knob.js') }}"></script>
<!-- datetimepicker -->
<script src="{{ asset('assets/lte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/lte/plugins/datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<!-- <script src="{{ asset('assets/lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script> -->
<!-- FastClick -->
<script src="{{ asset('assets/lte/plugins/fastclick/fastclick.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('assets/lte/plugins/iCheck/icheck.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/lte/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>

@yield('js')

</body>
</html>
