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
	</tr>
	@foreach ($proposals as $proposal)
	    <tr>
		  <td class="active">{{ $proposal->nama_proposal }}</td>
		  <td class="active align-center">{{ $proposal->jalur }}</td>

		  @if($proposal->status == 'BELUM DICEK')
		  	<td class="active align-center"><span class="label label-default">{{ $proposal->status }}</span></td>
		  @elseif($proposal->status == 'REVISI')
		  	<td class="active align-center"><span class="label label-warning">{{ $proposal->status }}</span></td>
		  @else
		  	<td class="active align-center"><span class="label label-success">{{ $proposal->status }}</span></td>
		  @endif

		  <td class="active align-center">{{ $proposal->waktu_masuk }}</td>
		  @if(!$proposal->waktu_pengecekan)
		  	<td class="active align-center">-</td>
		  @else
		  	<td class="active align-center">{{ $proposal->waktu_pengecekan }}</td>
		  @endif
		  
		  <td class="active align-center">{{ $proposal->pemeriksa }}</td>
		  <td class="active align-center">{{ $proposal->download_link }}</td>
		</tr>
	@endforeach
  </table>
  {{ $proposals->links() }}
</div>
@stop