@extends('layouts.master')

@section('title','P3DK - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null">
  <ol class="breadcrumb bg-color-white font-2-em">
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
	<div class="col-md-12 col-sm-12 col-xs-12 padding-small">
		<div  class="bg-color-primary square-box col-md-2 col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">1</span>
			<span class="font-2-em col-md-12 vertical-align-abs align-center font-white col-sm-12">Membuat Proposal</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">2</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12">Upload File</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">3</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12">Melengkapi Tanda Tangan</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">4</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12">Kumpulkan Ke Biro III</span>
		</div>
	</div>
	<h3 class="pad-top-tiny pad-bot-small col-md-12">Secara Offline</h3>
	<div class="col-md-12 padding-small">
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">1</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12">Membuat Proposal</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">2</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12"> Ttd Ketua & Sekre Proker & Ketua OK</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">3</span>
			<span class="vertical-align-abs font-2-em col-md-12 align-center col-sm-12">Kumpulkan Ke BEMU Untuk Pengecekan</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">4</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12">Ttd Wakil Dekan (Jika Mendapat Dana Fakultas)</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">5</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12">Ttd Wakil Rektor III</span>
		</div>
		<div  class="square-box col-md-2 bg-color-primary col-sm-3 col-xs-12">
			<span class="number bg-color-primary align-center">6</span>
			<span class="vertical-align-abs font-2-em align-center col-md-12 col-sm-12">Kumpulkan Ke Biro III</span>
		</div>
	</div>
	<h2 class="primary-color pad-top col-md-12 pad-left-null">Template Proposal</h2>
	<div class="profile-desc">
		Template Proposal dapat di download melalui tombol berikut <button class="btn btn-success" id="download-template">Unduh Template</button>
	</div>
	<h2 class="primary-color pad-top">Upload Proposal</h2>
	<div class="profile-desc">
        Setelah mengedit proposal yang telah di download. Proposal dapat diupload pada <a href="#">Upload Proposal</a>. 
        Akan dilakukan pengecekan proposal oleh pihak BEMU. Tunggu hasil pengecekan pada bagian <a href="#">Status Proposal</a> 
    </div>
	<h2 class="primary-color pad-top">Status Proposal</h2>
	<div class="profile-desc">
        Proposal yang telah di upload ataupun dikumpulkan ke BEMU untuk dicek dapat dilihat statusnya pada 
        bagian <a href="#">Status Proposal</a>
        agar dapat mengetahui apakah proposal sudah benar atau masih ada kesalahan.
    </div>
    <h2 class="primary-color pad-top">Download Proposal Sesudah Dicek (Alur Pencairan Dana Secara Online)</h2>
	<div class="profile-desc">
        Proposal yang dikumpulkan melalui <a href="#">Upload Proposal</a> dapat mendownload file yang sudah dicek melalu <a href="#">Status Proposal</a>. 
        Untuk dicetak dan melengkapi tanda tangan atau direvisi dan dikumpulkan kembali melalui jalur offline ataupun online.
    </div>
</div>

<div class="fades col-md-12 bg-color-darker hidden">
	<form action="{{ route('post.word') }}" method="POST" id="form-p3dk">
		<div class="col-md-6 padding bg-color-white border-rad vertical-align-abs col-md-offset-3 hidden" id="form-sec-one">
			<div  class="form-horizontal">
			<h2 class="primary-color col-md-12 align-center pad-bot">Kop Surat</h2>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					<label for="organisasiKemahasiswaan"  class="col-md-4 control-label">Organisasi Kemahasiswaan</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-one" id="organisasiKemahasiswaan" name="organisasiKemahasiswaan" placeholder="Cth : Badan Eksekutif Mahasiswa Universitas">
					</div>
				</div>
				<div class="form-group">
					<label for="kesekretariatan" class="col-md-4 control-label">Tempat kesekretariatan</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-one" id="keskretariatan" name="kesekretariatan" placeholder="Cth : Gedung Bundar Atrium Didaktos">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-md-4 control-label">Email</label>
					<div class="col-md-5">
						<input type="email" class="form-control form-one" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="mediaSosial" class="col-md-4 control-label">Media Sosial</label>
					<div class="col-md-7 pad-right-null">
						<div class="col-md-3 padding-null">
							<select class="form-control col-md-12" id="selectMedsos" name="medsos">
								<option>website</option>
								<option>facebook</option>
								<option>twitter</option>
							</select>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control form-one" id="alamatMedsos" name="alamatMedsos" placeholder="Cth : bem.ukdw.ac.id">
						</div>
					</div>
				</div>
				<div class="form-group pad-top-large">
					<div class="col-md-2 col-md-offset-3">
						<button type="reset" class="btn btn-danger col-md-12 btn-batal">Batal</button>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-primary col-md-12" id="btn-lanjut" disabled>Lanjut</button>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-warning col-md-12" id="btn-lewati">Lewati</button>
					</div>
				</div>
				<input type="hidden" name="skipped" id="skipped" value='true'>
			</div>
		</div>
		<div class="col-md-6 padding bg-color-white border-rad vertical-align-abs col-md-offset-3 hidden" id="form-sec-two">
			<div class="form-horizontal scrollable max-height">
				<h2 class="primary-color col-md-12 align-center pad-bot">Detail Program Kerja</h2>	
				<div class="form-group">
					<label for="programKerja" class="col-md-4 control-label">Program Kerja</label>
					<div class="col-md-5">
						<input type="text" class="form-control form-two" id="proker" name="proker" placeholder="Cth : Duta Wacana Project">
					</div>
				</div>
				<div class="form-group">
					<label for="kontak" class="col-md-4 control-label">Nama & No Kontak</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="namaKontak" name="namaKontak" placeholder="Nama Panggilan">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control form-two" id="nomorKontak" name="nomorKontak" placeholder="No Telepon/HP">
					</div>
				</div>
				<div class="form-group">
					<label for="SKDana" class="col-md-4 control-label">SK Dana</label>
					<div class="col-md-3">
			    		<div class="input-group">
				    		<div class="input-group-addon">Rp</div>
				    		<input type="text" class="form-control form-two" id="skDanaJumlah" name="skDanaJumlah" placeholder="5.500.000">
				    	</div>
			    	</div>
			    	<div class="col-md-4">
			    		<input type="text" class="form-control form-two" id="skDanaTerbilang" name="skDanaTerbilang" placeholder="lima juta lima ratus ribu rupiah">
			    	</div>
				</div>
				<div class="form-group">
					<label for="ketuaProker" class="col-md-4 control-label">Ketua Proker</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="namaKetuaProker" name="namaKetuaProker" placeholder="Nama">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control form-two" id="nimKetuaProker" name="nimKetuaProker" placeholder="NIM">
					</div>
				</div>
				<div class="form-group">
					<label for="sekreProker" class="col-md-4 control-label">Sekretaris Proker</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="namaSekreProker" name="namaSekreProker" placeholder="Nama">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control form-two" id="nimSekreProker" name="nimSekreProker" placeholder="NIM">
					</div>
				</div>
				<div class="form-group">
					<label for="ketuaOK" class="col-md-4 control-label">Ketua Organisasi Kemahasiswaan</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="namaKetuaOK" name="namaKetuaOK" placeholder="Nama">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control form-two" id="nimKetuaOK" name="nimKetuaOK" placeholder="NIM">
					</div>
			  	</div>
			  	<div class="form-group">
					<label for="DanaFakultas" class="col-md-4 control-label">Dana Fakultas</label>
					<div class="col-md-4">
						<label class="radio-inline">
							<input type="radio" name="danaFakultas" id="radio-1" value="Ya" aria-label="...">Ya
						</label>
						<label class="radio-inline">
							<input type="radio" name="danaFakultas" id="radio-2" value="Tidak" aria-label="...">Tidak
						</label>
					</div>
			  	</div>
			  	<div class="form-group" id="wakil-dekan">
					<label for="wakilDekan" class="col-md-4 control-label">Wakil Dekan</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="wakilDekan" name="wakilDekan" placeholder="Nama">
					</div>
			  	</div>
			  	<div class="form-group">
					<label for="temaAcara" class="col-md-4 control-label">Tema Acara</label>
					<div class="col-md-4">
						<input type="text" class="form-control form-two" id="temaAcara" name="temaAcara" placeholder="Nama">
					</div>
			  	</div>
			  	<div class="form-group pad-top-med">
					<div class="col-md-2 col-md-offset-3">
						<button type="reset" class="btn btn-danger col-md-12 btn-batal">Batal</button>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-primary col-md-12" id="btn-kembali">Kembali</button>
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-success col-md-12"  id="btn-unduh" disabled>Unduh</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	var wD = '';
	$('#wakil-dekan').hide();

	$('#download-template').click(function(){
		$('.bg-color-darker').fadeIn().removeClass('hidden');
		$('body').addClass('hidden-overflow');
		$('#form-sec-one').fadeIn().removeClass('hidden');
		formOneValidation();
	});

	$('#btn-lewati').click(function(){
		$('#form-sec-one').fadeIn().addClass('hidden');
		$('#form-sec-two').fadeIn().removeClass('hidden');
		$('.form-one').val('');
		$('#skipped').val('true');
	});

	$('.btn-batal').click(function(){
		$('.bg-color-darker').fadeOut();
		$('#form-sec-one').addClass('hidden');
		$('#form-sec-two').addClass('hidden');
		$('body').removeClass('hidden-overflow');
		$('#wakil-dekan').hide();
		document.querySelector("input[type=text][id=alamatMedsos]").setAttribute("placeholder", "cth: bem.ukdw.ac.id");
	});

	$('#btn-kembali').click(function(){
		$('#form-sec-two').addClass('hidden');
		$('#form-sec-one').removeClass('hidden');
	});

	$('#btn-lanjut').click(function(){
		$('#form-sec-one').fadeIn().addClass('hidden');
		$('#form-sec-two').fadeIn().removeClass('hidden');
		$('#skipped').val('false');
		console.log($('#skipped').val())
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

	$('select').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
	    var valueSelected = this.value;
	    var element = document.querySelector("input[type=text][id=alamatMedsos]");

	    if(valueSelected == 'facebook'){
	    	element.setAttribute("placeholder", "cth: facebook.com/BEM.UKDW.Jogja");
	    } else if(valueSelected == 'website'){
	    	element.setAttribute("placeholder", "cth: bem.ukdw.ac.id");
	    } else{
	    	element.setAttribute("placeholder", "cth: twitter.com/bem_ukdw");
	    }
	});

	$('.form-one').keyup(function() {
		formOneValidation();
	});

	$('.form-two').keyup(function() {
		formTwoValidation();
	});

	function formOneValidation(){
		if(!$('#organisasiKemahasiswaan').val() || !$('#keskretariatan').val() || !$('#email').val() || !$('#alamatMedsos').val()){
			$('#btn-lanjut').prop("disabled", true);
		} else {
			$('#btn-lanjut').prop("disabled", false);
		}
	}

	function formTwoValidation(){
		if(!$('#proker').val() || !wD || !$('#temaAcara').val() || !$('#namaKetuaOK').val() || !$('#namaKetuaProker').val() || !$('#namaSekreProker').val() ||
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
		$('.bg-color-darker').fadeOut();
		$('#form-sec-two').addClass('hidden');
		$('#form-sec-one').removeClass('hidden');
		$('body').removeClass('hidden-overflow');
		$('#wakil-dekan').hide();
		setTimeout(function(){
			$('#form-p3dk')[0].reset();
		},1000)
	})
	
</script>
@stop