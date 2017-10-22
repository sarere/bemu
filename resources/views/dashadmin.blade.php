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
		<button type="button" class="btn btn-success margin-btm-small" data-toggle="modal" data-target="#myModal">Tambah Akun</button>
	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<td class="align-center" style="vertical-align:middle">Nama Lengkap</td>
				  	<td class="align-center" style="vertical-align:middle">Nama Panggilan</td>
					<td class="align-center" style="vertical-align:middle">Organisasi Kemahasiswaan</td>
					<td class="align-center" style="vertical-align:middle">Email</td>
					<td class="align-center" style="vertical-align:middle">Action</td>
				</thead>
				@foreach ($users as $user)
				<tr>
					<td style="vertical-align:middle">
						{{ $user->name }} 
						@if($user->admin)
							<span class="fa fa-user-secret"></span>
						@endif
					</td>
				  	<td style="vertical-align:middle">{{ $user->nickname }}</td>
					<td style="vertical-align:middle">{{ $user->ok }}</td>
					<td style="vertical-align:middle">{{ $user->email }}</td>
					<td class="align-center" style="vertical-align:middle">
						<button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-container="body" data-toggle="popover" data-trigger="focus"  data-placement="left" data-contentwrapper="#pop-{{$user->id}}">
						</button>
					</td>
					<div id="pop-{{$user->id}}" class="hidden">
						<button class="btn btn-warning btn-xs btn-block" data-toggle="modal" data-target="#modalSuntingAkun" onclick="fileDetail({{$user->id}})">Sunting Akun</button>
						<button type="submit" class="btn btn-danger btn-xs btn-block" form="del-{{$user->id}}">Hapus Akun</button>
						<form id="del-{{$user->id}}" method="POST" class="hidden">
								{{ csrf_field() }}
								<input name="id" value="{{$user->id}}" class="hidden">
						</form>
					</div>
				</tr>
				@endforeach
			</table>
		</div>
		{{ $users->links() }}
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="reset" class="close batal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
			    <input type="radio" name="admin" id="blankRadio2" value="0" aria-label="Tidak">Tidak
			  </label>
			</div>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default batal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Akun</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSuntingAkun" tabindex="-1" role="dialog" aria-labelledby="labelModalSuntingAkun">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" method="POST" action="{{ route('status.update') }}" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="reset" class="close batal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="labelModalUpdate">Suting Akun</h4>
          </div>
          <div class="modal-body">
                {{ csrf_field() }}
                <input id="id" type="text" class="hidden" name="id" value="">
                <div class="form-group">
                    <label for="nama_proposal" class="col-md-4 control-label" readonly>Nama Lengkap</label>
                    <div class="col-md-6">
                        <input id="nama_proposal" type="text" class="form-control" name="nama_proposal" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Email</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group">
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

                <div class="form-group">
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

<script>
$('.batal').click(function(){   
	$('#myModal ').modal('hide');
	$('#modalSuntingAkun').modal('hide');
});

$('[data-toggle="popover"]').popover({
    html:true,
    content:function(){
        return $($(this).data('contentwrapper')).html();
    }
})
</script>
@stop