<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> 
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="ti-menu"></i>
        </a>
        <!-- Logo -->
        <div class="top-left-part">
            <a class="logo" href="{{ url('/') }}">
                <!-- Logo icon image, you can use font-icon also -->
                <b>
                    <img src="{{ asset('admin/img/eliteadmin-logo.png') }}" alt="home" />
                </b>
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs">
                    <img src="{{ asset('admin/img/eliteadmin-text.png') }}" alt="home" />
                </span> </a>
        </div>
        <!-- /Logo -->
        <!-- This is for mobile view search and menu icon -->
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light">
                    <i class="icon-arrow-left-circle ti-menu"></i>
                </a>
            </li>
            <li>
                <form role="search" class="app-search hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control"> 
                    <a href="#"><i class="fa fa-search"></i></a> 
                </form>
            </li>
        </ul>
        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            @include('admin.menu.notification')
            @include('admin.menu.user')
            <li class="right-side-toggle"> 
                <a class="waves-effect waves-light" href="javascript:void(0)">
                    <i class="ti-settings"></i>
                </a>
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
</nav>