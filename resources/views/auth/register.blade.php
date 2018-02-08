@extends('layouts.app')

@section('content')

<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <a href="{{url('/')}}" class="text-center db">
                    <img src="{{asset('admin/img/logo.png')}}" alt="Home" style="width:24px;" />
                    <br/>
                    <span style="color:#000;font-size:14pt;"><strong>Mango</strong>Lara</span>
                </a>
                <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
                <div class="form-group m-t-20{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{url('/login')}}" class="text-primary m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
