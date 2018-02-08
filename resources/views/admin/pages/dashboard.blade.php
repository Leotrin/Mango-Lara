@extends('admin.index')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <ol class="breadcrumb">
                <li class="active"><a href="{{ url('/home') }}">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">
                	Dear {{ auth()->user()->name }}, 
                	<br />
                	<small>You are loged in as <strong>{{ auth()->user()->role }}</strong></small>
                </h3> 
            </div>
        </div>
    </div>
@endsection