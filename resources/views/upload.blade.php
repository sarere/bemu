@extends('layouts.master')

@section('title','Upload Proposal - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null scrollable-y">
  <ol class="breadcrumb bg-color-white font-2-em " style="min-width:400px">
    <li><a {{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}} href="{{ url('p3dk') }}">Pengantar</a></li>
    <li><a {{{ (Request::is('status') ? 'class=nav-active' : '') }}} href="{{ url('status') }}">Status Proposal</a></li>
    <li><a {{{ (Request::is('upload') ? 'class=nav-active' : '') }}} href="{{ url('upload') }}">Upload Proposal</a></li>
  </ol>
</div>
<form  id="dropzone" class="form-horizontal col-md-8 col-md-offset-2" id="register" action="">
    <div class="col-md-12">
        <span class="fa fa-file-word-o font-10-em margin-btm-med-tiny"></span>
        <h1 class="margin-btm-med-tiny margin-top-med mssg">Drop atau <label for="fileUpload" id="lblSelectFile"> Pilih File</label> Untuk Upload Proposal</h1>
        <h3 class="margin-btm-med-tiny error hidden"></h3>
        <div class="progress margin-top-med hidden">
          <div class="progress-bar" role="progressbar" id="progress-upload" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            0%
          </div>
        </div>
        <input type="file" class="inputfile" name="fileUpload" id="fileUpload">
        
    </div>
</form>

<script>

$(":file").change(function() {
    
    var files = this.files;
    upload(files);
    // var formData = new FormData();

    // uploadFile(formData);
});

$('#dropzone').on(
    'dragover dragenter',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#dropzone').addClass('bg-color-transparent');
    }
)
.on(
    'dragleave',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#dropzone').removeClass('bg-color-transparent');
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
            }else{
                e.preventDefault();
                e.stopPropagation();

            }  
        }
    }
);

function upload(files){
    if(files.length > 1){
        $('.error').removeClass('hidden').text('Opps.. Upload satu file saja..');
        $('#dropzone').removeClass('bg-color-transparent');
    } else{
        if(docxValidation(files[0].name)){
            var formData = new FormData();
            formData.append("uploadFile",files[0],files[0].name);
            uploadFile(formData);
        } else{
            $('.error').removeClass('hidden').text('Opps.. Extension file harus .docx atau .doc !');
            $('#dropzone').removeClass('bg-color-transparent');
        }
    }
    $('.shade').addClass('hidden');
}

function docxValidation(filename){
    $extension = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
    if($extension == 'docx' || $extension == 'doc'){
        return true;
    } else{
        return false;
    }
}

function uploadFile(formData){
    
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $.ajax({
        xhr: function () {
        var xhr = new window.XMLHttpRequest();

        xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                    $('.mssg').text('File sedang di upload...');
                $('.error').addClass('hidden');;
                $('.progress').removeClass('hidden');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').text(Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                if (percentComplete === 1) {
                    // $('.progress').addClass('hide');
                }
            }
        }, false);
        xhr.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                    $('.mssg').text('File sedang di upload...');
                $('.error').addClass('hidden');;
                $('.progress').removeClass('hidden');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').text(Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
            
            }
        }, false);
        return xhr;
    },
        type: "POST",
        url: "upload/file",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
            $('#dropzone').removeClass('bg-color-transparent');
            $('.mssg').text('Upload selesai...');
            $('#progress-upload').attr('style','width: 100%');
            $('#progress-upload').text('100%');
             setTimeout(function(){location.href = "status"}, 500);
        }
    })
}


</script>
@stop