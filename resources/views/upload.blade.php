@extends('layouts.master')

@section('title','Status Proposal - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null">
  <ol class="breadcrumb bg-color-white font-2-em">
    <li><a {{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}} href="{{ url('p3dk') }}">Pengantar</a></li>
    <li><a {{{ (Request::is('status') ? 'class=nav-active' : '') }}} href="{{ url('status') }}">Status Proposal</a></li>
    <li><a {{{ (Request::is('upload') ? 'class=nav-active' : '') }}} href="{{ url('upload') }}">Upload Proposal</a></li>
  </ol>
</div>
<div id="dropzone" class="col-md-10">Drop here</div>
<script>
$('#dropzone').on(
    'dragover',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#dropzone').addClass('bg-color-primary');
    }
)
$('#dropzone').on(
    'dragenter',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#dropzone').addClass('bg-color-primary');
    }
)
.on(
    'dragleave',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#dropzone').removeClass('bg-color-primary');
    }
)
.on(
    'drop',
    function(e){
        if(e.originalEvent.dataTransfer){
            if(e.originalEvent.dataTransfer.files.length) {
                e.preventDefault();
                e.stopPropagation();
                /*UPLOAD FILES HERE*/
                upload(e.originalEvent.dataTransfer.files);
            }   
        }
    }
);
function upload(files){
    alert('Upload '+files.length+' File(s).');
    $('#dropzone').removeClass('bg-color-primary');
}


</script>
@stop