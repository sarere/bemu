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
<div class="table-responsive col-md-10 col-md-offset-1">
  <table class="table">
  	<tr>
	  <td>Nama Proposal</td>
	  <td class="align-center">Jalur</td>
	  <td class="align-center">Status</td>
	  <td class="align-center">Proposal Masuk</td>
	  <td class="align-center">Pengecekan</td>
	  <td class="align-center">Pemeriksa</td>
	  <td class="align-center">Download</td>
	  @if (Auth::user()->admin)
	  	<td class="align-center">Action</td>
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

		  @if($proposal->status == 'BELUM DIPERIKSA' || $proposal->jalur == offline)
		  	<td class="active align-center" style="vertical-align:middle">{{ $proposal->download_link }}</td>
		  @else
		  	<td class="active align-center" style="vertical-align:middle"><button type="button"  style="vertical-align:middle" class="btn btn-primary glyphicon glyphicon-download-alt"></button></td>
		  @endif

		  @if (Auth::user()->admin)
		  	<td class="active align-center" style="vertical-align:middle"><button type="button"  style="vertical-align:middle" class="btn btn-primary glyphicon glyphicon-edit" onclick="pilihAksi({{$proposal->id}},'{{$proposal->nama_proposal}}')"></button></td>
		  @endif
		</tr>
	@endforeach
  </table>
  {{ $proposals->links() }}
</div>

<div class="fades col-md-12 bg-color-darker hidden align-center">
	<div class="padding-large bg-color-white border-rad vertical-align-abs col-md-4 col-md-offset-4" id="section-one">
		<span class="padding-small" id="close" style="top:0; right:3rem; position:absolute; cursor:pointer;">(X)Close</span>
		<a href="" class="btn btn-primary btn-lg padding col-md-12" id="download">Download Proposal</a>
		<button class="btn btn-success btn-lg padding col-md-12 margin-top-small" id="update">Update Status</button>
	</div>
	<div class="padding-large bg-color-white border-rad vertical-align-abs col-md-4 col-md-offset-4 hidden" id="section-two">
		<span class="padding-small" id="close" style="top:0; right:3rem; position:absolute; cursor:pointer;">(X)Close</span>
	</div>
</div>


<script>
function pilihAksi(id,proposal){
	$('.bg-color-darker').removeClass('hidden');
	$('body').addClass('hidden-overflow');
	$('#download').attr('href','{{url('status/download')}}?proposal='+proposal);
	$('#update').attr('onclick','fileDetail('+id+')');
}

$('#close').click(function(){
	$('.bg-color-darker').addClass('hidden');
	$('body').removeClass('hidden-overflow');
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
        }
    })
}
</script>
@stop