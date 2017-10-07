@extends('layouts.master')

@section('title','Dashboad - ')

@section('content')
@if (Session::has('message'))
    <div class="col-md-12 alert alert-{{ Session::get('status') }}"><p class="col-md-10 col-md-offset-1">{{ Session::get('message') }}</p></div>
@endif
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
		<div class="col-md-12 pad-bot">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Akun</button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="reset" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Akun</h4>
      </div>
      <form action="dashboard/tambah-akun" method="POST">
      <div class="modal-body">
      	{{ csrf_field() }}
    	<div class="form-group">
	    	<label for="namaLengkap">Nama Lengkap</label>
	   		<input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap">
	  	</div>
	  	<div class="form-group">
	    	<label for="namaPanggilan">Nama Panggilan/Singkatan</label>
	   		<input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" placeholder="Nama Panggilan/Singkatan">
	  	</div>
	  	<div class="form-group">
	   		<label for="email">Email address</label>
	    	<input type="email" class="form-control" id="email" name="email" placeholder="Email">
	  	</div>
	  	<div class="form-group">
	   		<label for="ok">Tipe Akun</label>
	    	<select class="form-control" name="ok">
				<option value="-">User</option>
				<option value="Lembaga Kemahasiswaan">Lembaga Kemahasiswaan</option>
				<option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
				<option value="Unit Kegiatan Kebudayaan">Unit Kegiatan Kebudayaan</option>
				<option value="Unit Kegiatan Kerohanian">Unit Kegiatan Kerohanian</option>
			</select>
	  	</div>
	  	<div class="form-group">
	   		<label for="admin">Admin</label>
	   		<div class="radio">
			  <label class="radio-inline">
			    <input type="radio" name="admin" id="blankRadio1" value="1" aria-label="Ya">Ya
			  </label>
			  <label class="radio-inline">
			    <input type="radio" name="admin" id="blankRadio2" value="2" aria-label="Tidak">Tidak
			  </label>
			</div>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah Akun</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop