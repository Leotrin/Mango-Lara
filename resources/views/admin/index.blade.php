<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/logo.png') }}">
    <title>MangoLara</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-extension.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('admin/css/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- Animation CSS -->
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (blue.css) for this starter page. However, you can choose any other skin from folder css / colors .-->
    <link href="{{ asset('admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        @include('admin.menu.top')
        @include('admin.menu.side')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
                @include('admin.menu.right')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Mangosoft </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/bootstrap/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('admin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-extension.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('admin/js/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('admin/js/jQuery.style.switcher.js') }}"></script>
    @yield('footer')
</body>
</html>
