@extends('admin.index')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@endsection
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Media Management </h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">Media</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 p-10">
            <div class="white-box">
                <h1>Upload files using dropzone.js in Laravel</h1>
                {!! Form::open([ 'route' => [ 'upload.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                {!! Form::close() !!}
                <span style="font-size:8pt;color:#ccc;">Allowed files : .jpeg, .jpg, .png, .gif, .pdf, .doc, .docx, .bmp, .zip</span>
            </div>
        </div>
        <div class="col-md-12 p-10">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Thumbnail</td>
                            <td>File name</td>
                            <td>Link</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="media_table">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        var currentFile = null;
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#image-upload", {
            addRemoveLinks: false,
            maxFilesize:2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.doc,.docx,.bmp,.zip",
            accept: function(file, done) {
                console.log("Uploaded");
                done();
            },
            success: function(file, data){
                console.log(data);
                getMediaTable();
            }
        });

        function getMediaTable(){
            $.get( "media/get_table", function( data ) {
                $("#media_table").html(data);
            });
        }
        function deleteMedia(user_id, media){
            $.get( "upload/destroy/"+user_id+'/'+media, function(data) {
                getMediaTable();
                myDropzone.removeAllFiles();
            }).fail(function() {
                alert( "Media failed to delete !" );
            });
        }
        $(document).ready(function(){
           getMediaTable();
        });
    </script>
@endsection