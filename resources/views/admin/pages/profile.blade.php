@extends('admin.index')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Profile </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">My Profile</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <img src="{{ asset('admin/img/users/man.png') }}" alt="user-img" width="64" class="img-circle">
                <br />
                <br />
                Name : <strong>{{ auth()->user()->name }}</strong><br />
                E-Mail : <strong>{{ auth()->user()->email }}</strong><br />
                Birthday : <strong>{{ auth()->user()->birthday }}</strong><br />
                <br />
                <a href="{{route('account_settings')}}" class="btn btn-primary">Change Profile</a>
            </div>
        </div>
    </div>
@endsection