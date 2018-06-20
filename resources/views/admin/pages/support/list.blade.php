@extends('admin.index')

@section('head')
    <link rel="stylesheet" href="{{ asset('admin/css/html5-editor/bootstrap-wysihtml5.css') }}" />
@endsection
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Support Tickets </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">Support Tickets</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h4>Add new ticket</h4>
                <form action="{{ url('support/new/ticket') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-sm-4 col-md-4 p-10">
                        <label>Address this ticket to</label>
                        <select name="to_user_id" class="form-control">
                            <option value="">       Administrator     </option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}"> {{$user->name}}  </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-8 col-md-8 p-10">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" />
                    </div>
                    <div class="col-sm-4 col-md-4 p-10">
                        <label>Priority</label>
                        <select name="priority" class="form-control">
                            <option value="Low">    Low     </option>
                            <option value="Medium"> Medium  </option>
                            <option value="High">   High    </option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 p-10">
                        <textarea class="textarea_editor form-control" name="content" rows="15" placeholder="Enter text ..."></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 text-right p-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h4>Support Tickets</h4>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Who</td>
                            <td>Subject</td>
                            <td>Priority</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>TIC#{{$ticket->ticket_id}}</td>
                                    <td>
                                        @if($ticket->user_id == auth()->user()->id)
                                            @if($ticket->to_user_id!=null)
                                                To : {{ $ticket->toUser->name }}
                                            @else
                                                To : Administrator
                                            @endif
                                        @else
                                            From : {{ $ticket->user->name }}
                                        @endif
                                    </td>
                                    <td>{{$ticket->subject}}</td>
                                    <td>{!! MHelper::priority($ticket->priority) !!}</td>
                                    <td>{!! MHelper::status($ticket->status) !!}</td>
                                    <td>
                                        <a href="{{ url('support/ticket/'.$ticket->ticket_id) }}" class="btn btn-rounded btn-warning btn-sm">
                                            <i class="icon-magnifier"></i>
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

@section('footer')
    <script src="{{ asset('admin/js/html5-editor/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('admin/js/html5-editor/bootstrap-wysihtml5.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.textarea_editor').wysihtml5();
        });
    </script>
@endsection