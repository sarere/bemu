@extends('layouts.master')

@section('title','P3DK - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top">
	<h1 class="primary-color">Proposal Permohonan Pencairan Dana Kemahasiswaan (P3DK)</h1>
	<div class="profile-desc">
        Demi terciptanya keharmonisan dan dinamika yang terjadi di Organisasi Kemahasiswaan baik 
        internal maupun antara Organisasi Kemahasiswaan melalui bentuk dan peningkatan program kerja 
        yang dijalankan maka perlu adanya penetapan pembagian alokasi dana kemahasiswaan tahun 2017 kepada 
        seluruh Organisasi Kemahasiswaan Universitas Kristen Duta Wacana.
    </div>
	<h2 class="primary-color">Alur Pencairan Dana</h2>	
</div>

<div class="col-md-8 col-md-offset-2 pad-top-large hidden">	
	<form  class="form-horizontal" action="{{ route('post.word') }}" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div class="form-group">
			<label for="exampleInputPassword1"  class="col-md-3 control-label">Organisasi Kemahasiswaan</label>
			<div class="col-md-5">
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cth : Badan Eksekutif Mahasiswa Universitas">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1" class="col-md-3 control-label">Tempat kesekretariatan</label>
			<div class="col-md-5">
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cth : Gedung Bundar Atrium Didaktos">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1" class="col-md-3 control-label">Email</label>
			<div class="col-md-3">
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Email">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1" class="col-md-3 control-label">Website</label>
			<div class="col-md-4">
				<div class="input-group">
					<div class="input-group-addon">www.</div>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cth : bem.ukdw.ac.id">
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Program Kerja</label>
			<div class="col-md-5">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Cth : Duta Wacana Project">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">SK Dana</label>
			<div class="col-md-2">
	    		<div class="input-group">
		    		<div class="input-group-addon">Rp</div>
		    		<input type="text" class="form-control" id="exampleInputAmount" placeholder="5.500.000">
		    	</div>
	    	</div>
	    	<div class="col-md-3">
	    		<input type="text" class="form-control" id="exampleInputAmount" placeholder="lima juta lima ratus ribu rupiah">
	    	</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Ketua Proker</label>
			<div class="col-md-3">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
			</div>
			<div class="col-md-2">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="NIM">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Sekretaris Proker</label>
			<div class="col-md-3">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
			</div>
			<div class="col-md-2">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="NIM">
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Ketua Organisasi Kemahasiswaan</label>
			<div class="col-md-3">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
			</div>
			<div class="col-md-2">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="NIM">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Wakil Dekan</label>
			<div class="col-md-3">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label">Tema Acara</label>
			<div class="col-md-3">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label"></label>
			<div class="col-md-5">
				<button type="submit" class="btn btn-primary col-md-12">Unduh Template P3DK</button>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1" class="col-md-3 control-label"></label>
			<div class="col-md-5">
				<button type="submit" class="btn btn-danger col-md-12">Batal</button>
			</div>
		</div>
	</form>
</div>
@stop