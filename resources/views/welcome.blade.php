@extends('layouts.master')

@section('title','Beranda - ')

@section('content')
<div class="col-md-12 slider">
	<div class="slider-bg">
		<div class="slider-picture" id="slide-1" style="background-image: url({{ asset('picture/pic1.jpg') }})">
			<div class="slider-text">
				<p>Selamat Datang Pada Website BEM UKDW</p>
			</div>
		</div>
		<div class="slider-picture" id="slide-2" style="background-image: url({{ asset('picture/mabacover.jpg') }})">
			<div class="slider-text">
				<p>Selamat Datang Mahasiswa Baru UKDW</p>
			</div>
		</div>
		<div class="more-info">
			<a href="#section-0" class="jumper"><h3>See More About Us</h3></a>
		</div>
	</div>
</div>
<div class="col-md-12 box-content" id="section-0">
	<div class="col-md-10 col-md-offset-1 content">
		<div class="text-content align-center">
			<h1 class="title-content col-md-12 col-sm-12 col-xs-12">Badan Eksekutif Mahasiswa <br> Universitas Kristen Duta Wacana</h1>
			<img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW" class="pad-top col-md-4 col-md-offset-4 col-xs-12 col-sm-8 col-sm-offset-2">
			<p class="desc-content col-md-12 pad-top col-xs-12 col-sm-12 pad-bot">
				Badan Eksekutif Mahasiswa Universitas (BEMU) merupakan salah satu organisasi kemahasiswaan yang membawahi 
				Unit Kegiatan Kebudayaan (UKKb), Unit Kegiatan Kerohanian (UKKr), Unit Kegiatan Kemahasiswaan (UKM), dan 
				Lembaga Kemahasiswaan (LK). BEMU berfungsi sebagai tempat komunikasi dengan organisasi ataupun instansi di luar universitas, 
				berkomunikasi dengan organisasi yang berada di universitas, dan juga sebagai jembatan antara Organisasi Kemahasiswaan dengan 
				Badan Perwakilan Mahasiswa Universitas.
			</p>
		</div>
		<a href="#section-1" class="btn-img jumper"></a>
	</div>
</div>
<div class="col-md-12 box-content" id="section-1" style="background-image:url('picture/okcover.jpg')">
	<div class="col-md-6 col-md-offset-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-11 bg-color-transparent">Organisasi Kemahasiswaan</h1>
			<p class="desc-content col-md-11 bg-color-transparent font-white">
				Organisasi Kemahasiswaan (OK) terdiri dari Unit Kegiatan Kebudayaan (UKKb),
				Unit Kegiatan Kerohanian (UKKr), Unit Kegiatan Kemahasiswaan (UKM), Lembaga Kemahasiswaan (LK).
				Selain dalam akademik Mahasiswa dapat menyalurkan bakat mereka pada 
				Organisasi Kemahasiswaan.
			</p>
		</div>
		<a href="#section-2" class="btn-img jumper"></a>
	</div>
</div>
<div class="space col-md-12 ">
</div>
<div class="col-md-12 box-content" id="section-2" style="background-image:url('picture/ukkbcover.jpg')">
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10 align-right col-md-offset-2 bg-color-transparent">Unit Kegiatan Kebudayaan</h1>
			<p class="desc-content col-md-10 align-right col-md-offset-2 bg-color-transparent font-white">
				Unit Kegiatan Kebudayaan (UKKb) merupakan sarana untuk para mahasiswa yang berasal dari berbagai macam suku daerah. 
				UKKb dibentuk sebagai wadah memperkenalkan dan melestarikan kebudayaan - kebudayaan etnis serta komunikasi antar budaya 
				yang berada di Indonesia.</p>
			<a href="#section-3" class="btn-img jumper"></a>
		</div>
	</div>
</div>
<div class="space col-md-12 ">
</div>
<div class="col-md-12 box-content" id="section-3" style="background-image:url('picture/ukkrcover.jpg')">
	<div class="col-md-6 col-md-offset-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10 bg-color-transparent">Unit Kegiatan Kerohanian</h1>
			<p class="desc-content col-md-10 bg-color-transparent font-white">
				Unit Kegiatan Kerohanian (UKKr) merupakan wadah yang dapat digunakan Mahasiswa untuk mengembangkan 
				kehidupan spiritual dan komunikasi lintas keyakinan dalam kehidupan Mahasiswa.
			</p>
			<a href="#section-4" class="btn-img jumper"></a>
		</div>
	</div>
</div>
<div class="space col-md-12 ">
</div>
<div class="col-md-12 box-content" id="section-4" style="background-image:url('picture/ukmcover.jpg')">
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content  align-right col-md-10 col-md-offset-2 bg-color-transparent">Unit Kegiatan Mahasiswa</h1>
			<p class="desc-content  align-right col-md-10 col-md-offset-2 bg-color-transparent font-white">
				Unit Kegiatan Kerohanian (UKKr) merupakan wadah yang dapat digunakan Mahasiswa untuk mengembangkan 
				kehidupan spiritual dan komunikasi lintas keyakinan dalam kehidupan Mahasiswa.
			</p>
			<a href="#section-5" class="btn-img jumper"></a>
		</div>
	</div>
</div>
<div class="space col-md-12 ">
</div>
<div class="col-md-12 box-content" id="section-5" style="background-image:url('picture/lkcover.jpg')">
	<div class="col-md-6 col-md-offset-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10 bg-color-transparent">Lembaga Kemahasiswaan</h1>
			<p class="desc-content col-md-10 bg-color-transparent font-white">Lembaga Kemahasiswaan(LK) merupakan salah satu lembaga yang
				mewakili setiap fakultas dan program studi pada Universitas Kristen Dutawacana. LK bertugas untuk mengatur dan mengkoodinir
				mahasiswa yang berada pada fakultas ataupun pada program studi tersebut.
			</p>
		</div>
	</div>
</div>
@stop