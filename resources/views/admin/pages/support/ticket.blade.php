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
                <div class="col-md-12 p-10">
                    <h2 class="m-0 p-0 text-right">
                        TIC#{{ $id }}
                    </h2>
                    <div class="comment-center">
                        @foreach($tickets as $t)
                            <div class="col-sm-12 comment-body">
                                <div class="user-img">
                                    <img src="{{ asset('admin/img/users/man.png') }}" alt="user" class="img-circle">
                                </div>
                                <div class="mail-contnet">
                                    <h5>{{$t->user->name}}</h5>
                                    <div class="col-md-12 messageTicket">
                                        {!! $t->content !!}

                                        <div class="clearfix"></div>
                                    </div>
                                    {!! MHelper::priority($t->priority) !!}
                                    {!! MHelper::status($t->status) !!}
                                    <span class="time pull-right">
                                        {{ $t->created_at }}
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                @if($ticket->status != 3)
                    <h4>
                        Replay to ticket : TIC#{{ $id }}
                        <a href="{{ url('support/complete/ticket/'.$id) }}" class="btn btn-success pull-right">
                            Mark as completed
                        </a>
                    </h4>
                    <form action="{{ url('support/replay/ticket/'.$id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-sm-12 p-10">
                            <textarea class="textarea_editor form-control" name="content" rows="15" style="height:100px;" placeholder="Enter text ..."></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12 text-right p-10">
                            <button type="submit" class="btn btn-primary">Replay</button>
                        </div>
                    </form>
                @endif
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