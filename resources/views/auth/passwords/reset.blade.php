@extends('layouts.app')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <a href="{{url('/')}}" class="text-center db">
                    <img src="{{asset('admin/img/logo.png')}}" alt="Home" style="width:24px;" />
                    <br/>
                    <span style="color:#000;font-size:14pt;"><strong>Mango</strong>Lara</span>
                </a>
                <h3 class="box-title m-t-40 m-b-0">Reset Password Now</h3>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ $email or old('email') }}" required>
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
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>
                            <a href="{{url('/login')}}" class="text-primary m-l-5"><b>Login</b></a>
                            /
                            <a href="{{url('/register')}}" class="text-primary m-l-5"><b>Register</b></a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
