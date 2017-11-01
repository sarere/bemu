@extends('layouts.master')

@section('title','P3DK - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null scrollable-y">
  <ol class="breadcrumb bg-color-white font-2-em" style="min-width:400px">
    <li><a {{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}} href="{{ url('p3dk') }}">Pengantar</a></li>
    <li><a {{{ (Request::is('status') ? 'class=nav-active' : '') }}} href="{{ url('status') }}">Status Proposal</a></li>
    <li><a {{{ (Request::is('upload') ? 'class=nav-active' : '') }}} href="{{ url('upload') }}">Upload Proposal</a></li>
  </ol>
</div>
<div class="col-md-10 col-md-offset-1">
	<h1 class="primary-color">Proposal Permohonan Pencairan Dana Kemahasiswaan (P3DK)</h1>
	<div class="profile-desc">
        Demi terciptanya keharmonisan dan dinamika yang terjadi di Organisasi Kemahasiswaan baik 
        internal maupun antara Organisasi Kemahasiswaan melalui bentuk dan peningkatan program kerja 
        yang dijalankan maka perlu adanya penetapan pembagian alokasi dana kemahasiswaan tahun 2017 kepada 
        seluruh Organisasi Kemahasiswaan Universitas Kristen Duta Wacana.
    </div>

	<h2 class="primary-color pad-top">Alur Pencairan Dana</h2>
	<h3 class="pad-top-tiny pad-bot-small col-md-12">Secara Online</h3>
	<div class="col-md-12 col-sm-12 col-xs-10 padding-small">
		<div  class="bg-color-primary square-box col-md-2 col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">1</span>
			<span class="font-2-em col-md-12 vertical-align-abs align-center font-white col-sm-12 col-xs-12">Membuat Proposal</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">2</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12 col-xs-12">Upload File</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">3</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12 col-xs-12">Melengkapi Tanda Tangan</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">4</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12 col-xs-12">Kumpulkan Ke Biro III</span>
		</div>
	</div>
	<h3 class="pad-top-tiny pad-bot-small col-md-12 col-sm-12 col-xs-12">Secara Offline</h3>
	<div class="col-md-12 col-sm-12 col-xs-10 padding-small">
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">1</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12 col-xs-12">Membuat Proposal</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">2</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12 col-xs-12"> Ttd Ketua & Sekre Proker & Ketua OK</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">3</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12 col-xs-12">Kumpulkan Ke BEMU Untuk Pengecekan</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">4</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12 col-xs-12">Ttd Wakil Dekan (Jika Mendapat Dana Fakultas)</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">5</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12 col-xs-12">Ttd Wakil Rektor III</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">6</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12 col-xs-12">Kumpulkan Ke Biro III</span>
		</div>
	</div>

	<h2 class="primary-color pad-top col-md-12 pad-left-null">Sampul Proposal</h2>
	<div class="profile-desc">
		Terdapat warna khusus untuk Sampul Proposal pada setiap OK, yakni:<br/>
		<ul>
			<li>BPMU : Mika Cokelat</li>
			<li>BEMU : Mika Merah</li>
			<li>Lembaga Kemahasiswaan : Mika Kuning</li>
			<li>Unit Kegiatan Mahasiswa : Mika Bening</li>
			<li>Unit Kegiatan Kerohanian : Mika Biru Muda</li>
			<li>Unit Kegiatan Kebudayaan : Mika Hijau</li>
		</ul>
		
	</div>

	<h2 class="primary-color pad-top col-md-12 pad-left-null">Template Proposal</h2>
	<div class="profile-desc">
		Template Proposal dapat di download melalui tombol berikut 
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
		  Unduh Template
		</button><br/><br/>
		Format pada template ini adalah template umum. Jika membutuhkan format khusus seperti pengajuan dana kesekretariatan 
		maka template dapat diubah sesuai dengan kebutuhan. Terutama pada halaman pengesahan, jika ada format khusus seperti membutuhkan tanda tangan 
		dari pihak berwenang yang lainnya atau ketua proker dan ketua OK sama, maka kolom tanda tangan dapat ditambah atau dikurangi.
	</div>

	<h2 class="primary-color pad-top">Upload Proposal</h2>
	<div class="profile-desc">
        Setelah mengedit proposal yang telah di download. Proposal dapat diupload pada <a href="{{url('upload')}}">Upload Proposal</a>. 
        Akan dilakukan pengecekan proposal oleh pihak BEMU. Tunggu hasil pengecekan pada bagian <a href="{{url('status')}}">Status Proposal</a> 
    </div>

	<h2 class="primary-color pad-top">Status Proposal</h2>
	<div class="profile-desc">
        Proposal yang telah di upload ataupun dikumpulkan ke BEMU untuk dicek dapat dilihat statusnya pada 
        bagian <a href="{{url('status')}}">Status Proposal</a>
        agar dapat mengetahui apakah proposal sudah benar atau masih ada kesalahan.
    </div>

    <h2 class="primary-color pad-top">Download Proposal Sesudah Dicek (Alur Pencairan Dana Secara Online)</h2>
	<div class="profile-desc">
        Proposal yang dikumpulkan melalui <a href="{{url('upload')}}">Upload Proposal</a> dapat mendownload file yang sudah dicek melalu <a href="{{url('status')}}">Status Proposal</a>. 
        Untuk dicetak dan melengkapi tanda tangan atau direvisi dan dikumpulkan kembali melalui jalur offline ataupun online.
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('post.word') }}" method="POST" id="form-p3dk">
	      <div class="modal-header">
	        <button type="button" class="close btn-batal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title primary-color align-center" id="myModalLabel">
	        	<span class="form-sec-two">
	        		Detail Program Kerja
	        	</span>
	        </h4>
	      </div>
	      <div class="modal-body">
					{{ csrf_field() }}
				<div class="form-sec-two">
					<!-- <h2 class="primary-color col-md-12 align-center pad-bot">Detail Program Kerja</h2>	 -->
					<div class="form-group">
						<label for="programKerja">Program Kerja</label>
						<input type="text" class="form-control form-two" id="proker" name="proker" placeholder="Cth : Duta Wacana Project">
					</div>
					<div class="form-group">
						<label for="singkatanOK">Singkatan Organisasi Kemahaiswaan & Tahun Jabatan Pemegang Proker</label>
						<input type="text" class="form-control form-two" id="singkatanOK" name="singkatanOK" placeholder="Cth : BEMU 2017">
					</div>
					<div class="form-group">
						<label for="kontak">Nama & No Kontak</label>
						<div class="row">
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="namaKontak" name="namaKontak" placeholder="Nama Panggilan">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="nomorKontak" name="nomorKontak" placeholder="No Telepon/HP">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="SKDana">Dana Kemahasiswaan</label>
						<div class="row">
				    		<div class="col-xs-6">
				    			<div class="input-group">
						    		<div class="input-group-addon">Rp</div>
						    		<input type="text" class="form-control form-two" id="skDanaJumlah" name="skDanaJumlah" placeholder="5.500.000">
						    	</div>
					    	</div>
					    	<div class="col-xs-6">
					    		<input type="text" class="form-control form-two" id="skDanaTerbilang" name="skDanaTerbilang" placeholder="lima juta lima ratus ribu rupiah">
					    	</div>
				    	</div>
					</div>
					<div class="form-group">
						<label for="ketuaProker">Ketua Proker</label>
						<div class="row">
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="namaKetuaProker" name="namaKetuaProker" placeholder="Nama">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="nimKetuaProker" name="nimKetuaProker" placeholder="NIM">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sekreProker">Sekretaris Proker</label>
						<div class="row">
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="namaSekreProker" name="namaSekreProker" placeholder="Nama">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="nimSekreProker" name="nimSekreProker" placeholder="NIM">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="ketuaOK">Ketua Organisasi Kemahasiswaan</label>
						<div class="row">
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="namaKetuaOK" name="namaKetuaOK" placeholder="Nama">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control form-two" id="nimKetuaOK" name="nimKetuaOK" placeholder="NIM">
							</div>
						</div>
				  	</div>
				  	<div class="form-group">
						<label for="DanaFakultas">Dana Fakultas</label>
						<div class="row">
							<div class="col-xs-12">
								<label class="radio-inline">
									<input type="radio" name="danaFakultas" id="radio-1" value="Ya" aria-label="...">Ya
								</label>
								<label class="radio-inline">
									<input type="radio" name="danaFakultas" id="radio-2" value="Tidak" aria-label="...">Tidak
								</label>
							</div>
						</div>
				  	</div>
				  	<div class="form-group" id="wakil-dekan">
						<label for="wakilDekan">Wakil Dekan</label>
						<input type="text" class="form-control form-two" id="wakilDekan" name="wakilDekan" placeholder="Nama">
				  	</div>
				  	<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-xs-12 col-sm-12 margin-top-small">
							
						</div>
						<div class="col-md-4 col-xs-12 col-sm-12 margin-top-small">
							
						</div>
						<div class="col-md-3 col-xs-12 col-sm-12 margin-top-small">
							
						</div>
					</div>
				</div>
			</div>
	      <div class="modal-footer">
	      	<div class="form-sec-two">
	      		<button type="reset" class="btn btn-danger btn-batal" data-dismiss="modal">Batal</button>
	      		<button type="submit" class="btn btn-success"  id="btn-unduh" disabled>Unduh</button>
	      	</div>
	      </div>
	  </form>
    </div>
  </div>
</div>

<script>
	var wD = '';
	$('#wakil-dekan').hide();

	$('#download-template').click(function(){
		$('body').addClass('hidden-overflow');
		formOneValidation();
	});

	$('.btn-batal').click(function(){
		$('#wakil-dekan').hide();
		$('#form-p3dk')[0].reset();
		document.querySelector("input[type=text][id=alamatMedsos]").setAttribute("placeholder", "cth: bem.ukdw.ac.id");
	});

	$('input:radio[name="danaFakultas"]').change(function() {
	  	if ($(this).val() == 'Ya') {
	    	$('#wakil-dekan').slideDown();
			wD = 'ya';
	 	} else {
	    	$('#wakil-dekan').slideUp();
			wD = 'tidak';
	  	}
		  formTwoValidation();
	});

	$('.form-two').keyup(function() {
		formTwoValidation();
	});


	function formTwoValidation(){
		if(!$('#proker').val() || !wD || !$('#singkatanOK').val() || !$('#namaKetuaOK').val() || !$('#namaKetuaProker').val() || !$('#namaSekreProker').val() ||
		!$('#nimKetuaOK').val() || !$('#nimKetuaProker').val() || !$('#nimSekreProker').val() || !$('#skDanaJumlah').val() || !$('#skDanaTerbilang').val()){
			$('#btn-unduh').prop("disabled", true);
		} else {
			$('#btn-unduh').prop("disabled", false);
			if(wD == 'ya'){
				if(!$('#wakilDekan').val()){
					$('#btn-unduh').prop("disabled", true);
				} else {
					$('#btn-unduh').prop("disabled", false);
				}
			}
		}
	}

	$('#btn-unduh').click(function(){
		$('#myModal').modal('hide');
		$('#wakil-dekan').hide();
		setTimeout(function(){
			$('#form-p3dk')[0].reset();
		},1000)

	})
	
</script>
@stop