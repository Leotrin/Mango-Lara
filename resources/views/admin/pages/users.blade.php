@extends('admin.index')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">User Management </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">Users</li>
            </ol>
        </div>
    </div>

    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Birthday</th>
                            <th>Confirmed</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>
                                    @if($user->confirmed==1)
                                        <span class="text text-success">Confirmed</span>
                                    @else
                                        <span class="text text-danger">Not Confirmed</span>
                                    @endif
                                <td>
                                    @if($user->status==1)
                                        <a href="{{ url('user/'.$user->id.'/deactivate') }}">Active</a>
                                    @else
                                        <a href="{{ url('user/'.$user->id.'/activate') }}">Deactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection