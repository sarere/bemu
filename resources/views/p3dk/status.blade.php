@extends('layouts.master')

@section('title','Status Proposal - ')

@section('content')
@if (Session::has('message'))
    <div class="col-md-12 alert alert-{{ Session::get('status') }}"><p class="col-md-10 col-md-offset-1">{{ Session::get('message') }}</p></div>
@endif
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null table-responsive">
  <ol class="breadcrumb bg-color-white font-2-em " style="min-width:400px">
    <li><a {{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}} href="{{ url('p3dk') }}">Pengantar</a></li>
    <li><a {{{ (Request::is('status') ? 'class=nav-active' : '') }}} href="{{ url('status') }}">Status Proposal</a></li>
    <li><a {{{ (Request::is('upload') ? 'class=nav-active' : '') }}} href="{{ url('upload') }}">Upload Proposal</a></li>
  </ol>
</div>
<div class="col-md-10 col-md-offset-1">
    <div class="progress hidden">
      <div class="progress-bar" role="progressbar" id="progress-upload" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
        0%
      </div>
    </div>
</div>
@if (session('status'))
<div class="alert alert-success col-md-10 col-md-offset-1 hidden" id="success-msg" role="alert">

</div>
@endif
@if(Auth::user()->admin)
<div class="col-md-10 col-md-offset-1 pad-bot align-right">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Status</button>
</div>
@endif

<div class="col-md-10 col-md-offset-1">
    <div class="table-responsive">
      <table class="table table-condensed">
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
            <td class="align-center">Detail Revisi</td>
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
    		  @elseif($proposal->status == 'PROSES')
    		  	<td class="active align-center" style="vertical-align:middle"><span class="label label-info padding-small">{{ $proposal->status }}</span></td>
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
    <!--           <td class="active align-center" style="vertical-align:middle">
                <button type="button"  style="vertical-align:middle"
                 class="btn btn-primary glyphicon glyphicon-edit" onclick="pilihAksi({{$proposal->id}},'{{$proposal->nama_proposal}}')">
             </button>
         </td> -->
    		  	<td class="active align-center" style="vertical-align:middle">
                    <button type="button" style="vertical-align:middle" class="btn btn-primary glyphicon glyphicon-edit" data-container="body" data-toggle="popover" data-trigger="focus"  data-placement="left" data-contentwrapper="#pop-{{$proposal->id}}">
                    </button>
                </td>
                <div id="pop-{{$proposal->id}}" class="hidden">
                    @if($proposal->jalur!='offline')
                    <a href="{{url('status/download')}}?proposal={{$proposal->nama_proposal}}&id={{$proposal->id}}" class="btn btn-primary btn-xs btn-block" id="download">Download Proposal</a>
                    @endif
                    <button class="btn btn-success btn-xs btn-block" id="update" data-toggle="modal" data-target="#modalUpdate" onclick="fileDetail({{$proposal->id}})">Update Status</button>
                    <button type="submit" class="btn btn-danger btn-xs btn-block" form="del-{{$proposal->id}}">Hapus Status</button>
                    <form id="del-{{$proposal->id}}" method="POST" action="{{url('status/delete')}}" class="hidden">
                        {{ csrf_field() }}
                        <input name="id" value="{{$proposal->id}}" class="hidden">
                    </form>
                </div>
              @else
                @if($proposal->status == 'BELUM DIPERIKSA' || $proposal->jalur == 'offline' || $proposal->status == 'PROSES')
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
                <td class="active align-center" style="vertical-align:middle">
                @if($proposal->status == 'REVISI')
                    @if(Auth::user()->email == $proposal->email)
                    <label style="vertical-align:middle" class="btn btn-default glyphicon glyphicon-th-list" onclick="detailRevisi({{$proposal->id}})" data-toggle="modal" data-target="#modalDetail"></label>
                    @else
                        <span> - </span>
                    @endif
                @else
                    <span> - </span>
                @endif
                </td>
    		  @endif
    		</tr>
    	@endforeach
      </table>
      {{ $proposals->links() }}
    </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="labelModalDetail">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="reset" class="close batal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="labelModalUpdate">Detail Revisi</h4>
          </div>
          <div class="modal-body" id="detailRevisiContent">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default batal">OK</button>
          </div>
        </div>
  </div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="labelModalUpdate">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" method="POST" action="{{ route('status.update') }}" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="reset" class="close batal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="labelModalUpdate">Update Status</h4>
          </div>
          <div class="modal-body">
                {{ csrf_field() }}
                <input id="id" type="text" class="hidden" name="id" value="">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="nama_proposal" class="col-md-4 control-label">Nama Proposal</label>
                    <div class="col-md-6">
                        <input id="nama_proposal" type="text" class="form-control" name="nama_proposal" readonly>
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
                            <option id="none">-select-</option>
                            <option value="BELUM DIPERIKSA" id='belum-diperiksa'>BELUM DIPERIKSA</option>
                            <option value="PROSES" id='proses'>PROSES</option>
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

                <div class="form-group detail">
                    <label for="detail" class="col-md-4 control-label">Detail Revisi</label>

                    <div class="col-md-6">
                        <textarea id="detailRevisi" type="text" class="form-control" name="detail" style="resize:none" rows="6"></textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="pemeriksa" class="col-md-4 control-label">Pemeriksa</label>

                    <div class="col-md-6">
                        <input id="pemeriksa" type="text" class="form-control" name="pemeriksa">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default batal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="labelModalTambah">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" method="POST" action="{{ route('status.tambah') }}">
        <div class="modal-content">
          <div class="modal-header">
            <button type="reset" class="close batal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="labelModalTambah">Tambah Status</h4>
          </div>
          <div class="modal-body">
                {{ csrf_field() }}
                <input id="id" type="text" class="hidden" name="id" value="">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="nama_proposal" class="col-md-4 control-label">Nama Proposal</label>

                    <div class="col-md-6">
                        <input id="nama_proposal" type="text" placeholder="P3DK - DWPRO (PROKER)" class="form-control" name="nama_proposal">

                        <!-- @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif -->
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <select class="selectpicker" name="email" data-live-search="true">
                            @foreach($emails as $i)
                            <option value="{{ $i->email }}">{{ $i->email }}</option>
                            @endforeach
                        </select>
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
                            <option value="PROSES" id='proses'>PROSES</option>
                            <option value="REVISI" id='revisi'>REVISI</option>
                            <option value="OK" id='ok'>OK</option>
                        </select>
                    </div>
                </div>

                <div class="form-group detail">
                    <label for="detail" class="col-md-4 control-label">Detail Revisi</label>

                    <div class="col-md-6">
                        <textarea id="detailRevisi" type="text" class="form-control" name="detail" style="resize:none" rows="6"></textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="pemeriksa" class="col-md-4 control-label">Pemeriksa</label>

                    <div class="col-md-6">
                        <input id="pemeriksa" type="text" class="form-control" name="pemeriksa">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default batal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah Status</button>
          </div>
        </div>
    </form>
  </div>
</div>



<script>
$('[data-toggle="popover"]').popover({
    html:true,
    content:function(){
        return $($(this).data('contentwrapper')).html();
    }
})

$('#upload').hide();
$('.detail').hide();

$('.batal').click(function(){
    $('#modalTambah').modal('hide');
    $('#modalUpdate').modal('hide');
    $('#modalDetail').modal('hide');
    $('#upload').hide();
    $('.detail').hide();
});

$('input:file[name="uploadFile"]').change(function(){    
    upload(this.files,this.id);
});

$('#download').click(function(){
    setTimeout(function(){ location.href = "status"; },1000)    
})

function pilihAksi(id,proposal){
	$('.bg-color-darker').removeClass('hidden');
	$('body').addClass('hidden-overflow');
	$('#download').attr('href','{{url('status/download')}}?proposal='+proposal+'&id='+id);
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
    if(this.value == 'REVISI' || this.value == 'OK'){
        if($('#jalur').val() != 'offline'){
            $('#upload').slideDown();
        }
        if(this.value!='OK'){
            $('.detail').slideDown();
        } else{
            $('.detail').slideUp();
        }
    } else{
     $('#upload').slideUp();
     $('.detail').slideUp();
    }
  
})

function detailRevisi(id){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
        type: "GET",
        url: "status/detail-revisi",
        data: 'id='+id,
        success: function(data){
            $('#detailRevisiContent').text(data[0]['detail']);
        }
    })
}

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
            $('#revisi').attr('selected',false);
            $('#belum-diperiksa').attr('selected',false);
            $('#ok').attr('selected',false);

            $('#section-one').addClass('hidden');
            $('#section-two').removeClass('hidden');
            $('#nama_proposal').val(data[0]['nama_proposal']);
            $('#jalur').val(data[0]['jalur']);
            $('#detailRevisi').val(data[0]['detail']);
            if(data[0]['status'] == 'REVISI' || data[0]['status'] == 'OK'){
                $('#revisi').attr('selected',true);
                if(data[0]['jalur']!='offline'){
                    $('#upload').show();
                }
                if(data[0]['status']!='OK'){
                    $('.detail').show();
                } else{
                    $('.detail').slideUp();
                }
            } else if(data[0]['status'] == 'BELUM DIPERIKSA'){
                $('#belum-diperiksa').attr('selected',true);
            } else if(data[0]['status'] == 'OK'){
                $('#ok').attr('selected',true);
            } else if(data[0]['status'] == 'PROSES'){
                $('#proses').attr('selected',true);
            }
            $('#pemeriksa').val(data[0]['pemeriksa']);
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

<script type="text/javascript">
    $('div.alert').delay(3000).slideUp(300);
</script>
@stop