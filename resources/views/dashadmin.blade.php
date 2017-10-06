@extends('layouts.master')

@section('title','Dashboad - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top-med">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">Menu</div>
	    	<ul class="list-group">
			    <li class="list-group-item"><a href="#">Tabel User</a></li>
			    <li class="list-group-item hidden"><a href="sendMail">Kirim Email</a></li>
		  	</ul>
		</div>
	</div>
	<div class="col-md-9">
		@if (Session::has('message'))
		    <div class="col-md-12"><p class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</p></div>
		@endif
		<div class="col-md-12 pad-bot hidden">
			<button class="btn btn-success">Tambah Akun</button>
		</div>
		<div class="col-md-12">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<td class="align-center" style="vertical-align:middle">Nama Lengkap</td>
				  	<td class="align-center" style="vertical-align:middle">Nama Panggilan</td>
					<td class="align-center" style="vertical-align:middle">Organisasi Kemahasiswaan</td>
					<td class="align-center" style="vertical-align:middle">Hapus Akun</td>
					<td class="align-center" style="vertical-align:middle">Generate Password</td>
				</thead>
				@foreach ($users as $user)
				<tr>
					<td style="vertical-align:middle">{{ $user->name }}</td>
				  	<td style="vertical-align:middle">{{ $user->nickname }}</td>
					<td style="vertical-align:middle">{{ $user->ok }}</td>
					<td class="align-center" style="vertical-align:middle"><button class="btn btn-danger">Hapus</button></td>
					<td class="align-center" style="vertical-align:middle"><a href="notify/{{ $user->id }}" class="btn btn-info">Generate Password</a></td>
				</tr>
				@endforeach
			</table>
			{{ $users->links() }}
		</div>
	</div>
</div>
@stop