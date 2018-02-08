
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> 
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"> 
                                    <i class="fa fa-search"></i> 
                                </button>
                            </span> 
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect">
                            <img src="{{ asset('admin/img/users/man.png') }}" alt="user-img" class="img-circle">
                            <span class="hide-menu"> 
                                {{ auth()->user()->name}}
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('my_profile')}}">
                                    <i class="ti-user"></i> 
                                    My Profile
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li>
                        <a href="{{ url('/home') }}" class="waves-effect">
                            <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                            <span class="hide-menu">Dashboard</span>
                            <span class="label label-rouded label-custom pull-right">4</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">--- Personal</li>
                    <li>
                        <a href="{{ route('account_settings') }}" class="waves-effect">
                            <i class="icon-settings fa-fw"></i> 
                            <span class="hide-menu">Account Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}" class="waves-effect">
                            <i class="icon-logout fa-fw"></i> 
                            <span class="hide-menu">Log out</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">--- Support</li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="fa fa-circle-o text-danger"></i> 
                            <span class="hide-menu">Documentation</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="fa fa-download text-success"></i> 
                            <span class="hide-menu">Download</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->