<li class="dropdown">
    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
        <img src="{{ asset('admin/img/users/man.png') }}" alt="user-img" width="36" class="img-circle">
        <b class="hidden-xs">
            {{ auth()->user()->name}}
        </b> 
    </a>
    <ul class="dropdown-menu dropdown-user animated flipInY">
        <li><a href="{{route('my_profile')}}">
            <i class="ti-user"></i> My Profile</a>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="{{route('account_settings')}}">
            <i class="ti-settings"></i> Account Setting</a>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="{{ url('/logout') }}">
            <i class="fa fa-power-off"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>