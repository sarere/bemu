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
<div class="progress col-md-10 col-md-offset-1 hidden">
  <div class="progress-bar" role="progressbar" id="progress-upload" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    0%
  </div>
</div>
@if (session('status'))
<div class="alert alert-success col-md-10 col-md-offset-1 hidden" id="success-msg" role="alert">

</div>
@endif
@if(Auth::user()->admin)
<div class="col-md-10 col-md-offset-1 pad-bot align-right">
    <button class="btn btn-primary" id='tambah'>Tambah Status</button>
</div>
@endif

<div class="table-responsive col-md-10 col-md-offset-1">
  <table class="table">
  	<tr>
	  <td>Nama Proposal</td>
	  <td class="align-center">Jalur</td>
	  <td class="align-center">Status</td>
	  <td class="align-center">Proposal Masuk</td>
	  <td class="align-center">Pengecekan</td>
	  <td class="align-center">Pemeriksa</td>
      <td class="align-center">Revision</td>
	  
	  @if (Auth::user()->admin)
	  	<td class="align-center">Action</td>
      @else
        <td class="align-center">Download</td>
        <td class="align-center">Upload</td>
	  @endif
	</tr>
	@foreach ($proposals as $proposal)
	    <tr>
		  <td class="active" style="vertical-align:middle">{{ pathinfo($proposal->nama_proposal, PATHINFO_FILENAME)}}</td>
		  <td class="active align-center" style="vertical-align:middle">{{ $proposal->jalur }}</td>

		  @if($proposal->status == 'BELUM DIPERIKSA')
		  	<td class="active align-center padding" style="vertical-align:middle"><span class="label label-default padding-small">{{ $proposal->status }}</span></td>
		  @elseif($proposal->status == 'REVISI')
		  	<td class="active align-center" style="vertical-align:middle"><span class="label label-warning padding-small">{{ $proposal->status }}</span></td>
		  @else
		  	<td class="active align-center" style="vertical-align:middle"><span class="label label-success padding-small">{{ $proposal->status }}</span></td>
		  @endif

		  <td class="active align-center" style="vertical-align:middle">{{ $proposal->waktu_masuk }}</td>
		  @if(!$proposal->waktu_pengecekan)
		  	<td class="active align-center" style="vertical-align:middle">-</td>
		  @else
		  	<td class="active align-center" style="vertical-align:middle">{{ $proposal->waktu_pengecekan }}</td>
		  @endif

		  <td class="active align-center" style="vertical-align:middle">{{ $proposal->pemeriksa }}</td>
          <td class="active align-center" style="vertical-align:middle">{{$proposal->revision}}</td>

		  

		  @if (Auth::user()->admin)
		  	<td class="active align-center" style="vertical-align:middle"><button type="button"  style="vertical-align:middle" class="btn btn-primary glyphicon glyphicon-edit" onclick="pilihAksi({{$proposal->id}},'{{$proposal->nama_proposal}}')"></button></td>
          @else
            @if($proposal->status == 'BELUM DIPERIKSA' || $proposal->jalur == 'offline')
                <td class="active align-center" style="vertical-align:middle">{{ $proposal->download_link }}</td>
                <td class="active align-center" style="vertical-align:middle"><span> - </span></td>
            @else
                <td class="active align-center" style="vertical-align:middle">
                    @if(Auth::user()->email == $proposal->email)
                        <a href="{{url('status/download')}}?proposal={{$proposal->nama_proposal}}"  style="vertical-align:middle" class="btn btn-primary glyphicon glyphicon-cloud-download"></a>
                    @else
                        <span> - </span>
                    @endif
                </td>
                <td class="active align-center" style="vertical-align:middle">
                @if($proposal->status == 'OK')
                    <span> - </span>
                @endif
                @if($proposal->status == 'REVISI')
                    @if(Auth::user()->email == $proposal->email)
                    <label for="{{$proposal->id}}" style="vertical-align:middle" class="btn btn-warning glyphicon glyphicon-cloud-upload"></label>
                    <input type="file" name="uploadFile" id="{{$proposal->id}}" class="hidden"/>
                    @else
                        <span> - </span>
                    @endif
                @endif
                </td>
            @endif
		  @endif
		</tr>
	@endforeach
  </table>
  {{ $proposals->links() }}
</div>

<div class="fades col-md-12 bg-color-darker hidden align-center">
	<div class="padding-large bg-color-white border-rad vertical-align-abs col-md-4 col-md-offset-4" id="section-one">
		<button class="margin-top-small btn btn-danger close-window" style="top:0; right:3rem; position:absolute; cursor:pointer;">(X)Close</button>
		<a href="" class="btn btn-primary btn-lg padding col-md-12 margin-top-small" id="download">Download Proposal</a>
		<button class="btn btn-success btn-lg padding col-md-12 margin-top-small" id="update">Update Status</button>
        <button class="btn btn-danger btn-lg padding col-md-12 margin-top-small" id="delete">Hapus Status</button>
	</div>

	<div class="padding-large bg-color-white border-rad vertical-align-abs col-md-6 col-md-offset-3 hidden" id="section-two">
		
		<form class="form-horizontal" method="POST" action="{{ route('status.update') }}" enctype="multipart/form-data">
            <button type="reset" class="margin-top-small btn btn-danger close-window" style="top:0; right:3rem; position:absolute; cursor:pointer;">(X)Close</button>
            {{ csrf_field() }}
            <input id="id" type="text" class="hidden" name="id" value="">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="nama_proposal" class="col-md-4 control-label">Nama Proposal</label>

                <div class="col-md-6">
                    <input id="nama_proposal" type="text" class="form-control" name="nama_proposal" readonly>

                    <!-- @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif -->
                </div>
           	</div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="jalur" class="col-md-4 control-label">Jalur</label>

                <div class="col-md-6">
                    <input id="jalur" type="text" class="form-control" name="jalur" disabled>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="status" class="col-md-4 control-label">Status</label>

                <div class="col-md-6">
                    <select class="form-control" name="status">
                    	<option >-select-</option>
                        <option value="BELUM DIPERIKSA" id='belum-diperiksa'>BELUM DIPERIKSA</option>
					  	<option value="REVISI" id='revisi'>REVISI</option>
					  	<option value="OK" id='ok'>OK</option>
					</select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="upload">
                <label for="uploadGuideFile" class="col-md-4 control-label">Upload File</label>

                <div class="col-md-6">
                    <input id="uploadGuideFile" type="file" class="form-control" name="uploadGuideFile">
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="pemeriksa" class="col-md-4 control-label">Pemeriksa</label>

                <div class="col-md-6">
                    <input id="pemeriksa" type="text" class="form-control" name="pemeriksa">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-6">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
	</div>

    <div class="padding-large bg-color-white border-rad vertical-align-abs col-md-6 col-md-offset-3 hidden" id="section-three">
        
        <form class="form-horizontal" method="POST" action="{{ route('status.tambah') }}">
            <button type="reset" class="margin-top-small btn btn-danger close-window" style="top:0; right:3rem; position:absolute; cursor:pointer;">(X)Close</button>
            {{ csrf_field() }}
            <input id="id" type="text" class="hidden" name="id" value="">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="nama_proposal" class="col-md-4 control-label">Nama Proposal</label>

                <div class="col-md-6">
                    <input id="nama_proposal" type="text" class="form-control" name="nama_proposal">

                    <!-- @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif -->
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="jalur" class="col-md-4 control-label">Jalur</label>

                <div class="col-md-6">
                    <input id="jalurTambah" type="text" class="form-control" name="jalur" value='offline' readonly>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="status" class="col-md-4 control-label">Status</label>

                <div class="col-md-6">
                    <select class="form-control" name="status">
                        <option >-select-</option>
                        <option value="BELUM DIPERIKSA" id='belum-diperiksa'>BELUM DIPERIKSA</option>
                        <option value="REVISI" id='revisi'>REVISI</option>
                        <option value="OK" id='ok'>OK</option>
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="pemeriksa" class="col-md-4 control-label">Pemeriksa</label>

                <div class="col-md-6">
                    <input id="pemeriksa" type="text" class="form-control" name="pemeriksa">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-6">
                    <button type="submit" class="btn btn-primary">
                        Tambah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>




<script>
$('#upload').hide();

$('input:file[name="uploadFile"]').change(function(){    
    alert(this.files[0].name)
    upload(this.files,this.id);
});

$('#tambah').click(function(){
    $('.bg-color-darker').removeClass('hidden');
    $('#section-three').removeClass('hidden');
})

function pilihAksi(id,proposal){
	$('.bg-color-darker').removeClass('hidden');
	$('body').addClass('hidden-overflow');
	$('#download').attr('href','{{url('status/download')}}?proposal='+proposal);
	$('#update').attr('onclick','fileDetail('+id+')');
    $('#delete').attr('onclick','deleteStatus('+id+')');
}

function deleteStatus(id){
    var formData = new FormData();
        formData.append("id",id);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $.ajax({
        type: "POST",
        url: "status/delete",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
            location.href = "status";
        }
    })
}

$('select').on('change', function() {
  if(this.value == 'REVISI'){
  	$('#upload').slideDown();
  } else{
  	$('#upload').slideUp();
  }
})

$('.close-window').click(function(){
	$('.bg-color-darker').addClass('hidden');
	$('body').removeClass('hidden-overflow');
    $('#section-one').removeClass('hidden');
    $('#section-two').addClass('hidden');
})

function fileDetail(id){
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
	$.ajax({
        type: "GET",
        url: "status/detail",
        data: 'id='+id,
        success: function(data){
            $('#section-one').addClass('hidden');
            $('#section-two').removeClass('hidden');
            $('#nama_proposal').val(data[0]['nama_proposal']);
            $('#jalur').val(data[0]['jalur']);
            if(data[0]['status'] == 'REVISI'){
                $('#revisi').attr('selected',true);
            } else if(data[0]['status'] == 'BELUM DIPERIKSA'){
                $('#belum-diperiksa').attr('selected',true);
            } else if(data[0]['status'] == 'OK'){
                $('#ok').attr('selected',true);
            }
            
            $('#id').val(data[0]['id']);
        }
    })
}

function upload(files,id){
    if(docxValidation(files[0].name)){
        var formData = new FormData();
        formData.append("uploadFile",files[0],files[0].name);
        formData.append("id",id);
        uploadFile(formData);
    } else{
        alert('file harus docx atau doc');
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
                $('.progress').removeClass('hidden');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').text(Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
            
            }
        }, false);
        return xhr;
    },
        type: "POST",
        url: "status/upload",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
            $('.progress').addClass('hidden');
            location.href = "status";
        },
        error: function(data){
            alert(data);
        }
    })
}

function docxValidation(filename){
    $extension = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
    if($extension == 'docx' || $extension == 'doc'){
        return true;
    } else{
        return false;
    }
}

</script>
@stop