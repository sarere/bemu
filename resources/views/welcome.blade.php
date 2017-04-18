@extends('layouts.master')

@section('title', 'Page Tes')

@section('content')
<div class="col-md-12 slider">
	<!-- <img class="slider-picture" src="https://i.ytimg.com/vi/ij89qLQ23QE/maxresdefault.jpg"> -->
	<div class="slider-picture" id="slide-one" style="background-image: url({{ asset('picture/welcome.jpg') }})">
		<div class="slider-text">
			<p>Selamat Datang Pada Website BEM UKDW</p>
		</div>
	</div>
	<div class="slider-picture" id="slide-two" style="background-image: url({{ asset('picture/welcome.jpg') }})">
		<div class="slider-text">
			<p>tes</p>
		</div>
	</div>
	<div class="more-info">
		<a href="#section-0" class="jumper"><h1>See More About Us</h1></a>
	</div>
</div>
<div class="col-md-12 box-content pad-top-large" id="section-0">
	<div class="col-md-10 col-md-offset-1 content">
		<div class="text-content align-center">
			<h1 class="title-content col-md-12">Badan Eksekutif Mahasiswa <br> Universitas Kristen Duta Wacana</h1>
			<img src="http://2015.bemukdw.org/public/img/header-logo.png" alt="logo-bemu" class="pad-top">
			<p class="desc-content col-md-12 pad-top pad-bot">
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
<div class="col-md-12 box-content" id="section-1">
	<div  class="col-md-6">

	</div>
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-11">Organisasi Kemahasiswaan</h1>
			<p class="desc-content col-md-11">Organisasi Kemahasiswaan (OK) terdiri dari Unit Kegiatan Kebudayaan (UKKb),
			Unit Kegiatan Kerohanian (UKKr), Unit Kegiatan Kemahasiswaan (UKM), Lembaga Kemahasiswaan (LK).
			Selain dalam akademik Mahasiswa dapat menyalurkan bakat mereka pada 
			Organisasi Kemahasiswaan.</p>
		</div>
		<a href="#section-2" class="btn-img jumper"></a>
	</div>
</div>
<div class="col-md-12 box-content" id="section-2">
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10 align-right col-md-offset-2">Unit Kegiatan Kebudayaan</h1>
			<p class="desc-content col-md-10 align-right col-md-offset-2">
				Unit Kegiatan Kebudayaan (UKKb) merupakan sarana untuk para mahasiswa yang berasal dari berbagai macam suku daerah. 
				UKKb dibentuk sebagai wadah memperkenalkan dan melestarikan kebudayaan - kebudayaan etnis serta komunikasi antar budaya 
				yang berada di Indonesia.</p>
			<a href="#section-3" class="btn-img jumper"></a>
		</div>
	</div>
	<div  class="col-md-6">

	</div>
</div>
<div class="col-md-12 box-content" id="section-3">
	<div  class="col-md-6">

	</div>
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10">Unit Kegiatan Kerohanian</h1>
			<p class="desc-content col-md-10">
				Unit Kegiatan Kerohanian (UKKr) merupakan wadah yang dapat digunakan Mahasiswa untuk mengembangkan 
				kehidupan spiritual dan komunikasi lintas keyakinan dalam kehidupan Mahasiswa.
			</p>
			<a href="#section-4" class="btn-img jumper"></a>
		</div>
	</div>
</div>
<div class="col-md-12 box-content" id="section-4">
	<div  class="col-md-6">

	</div>
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10">Unit Kegiatan Mahasiswa</h1>
			<p class="desc-content col-md-10">
				Unit Kegiatan Kerohanian (UKKr) merupakan wadah yang dapat digunakan Mahasiswa untuk mengembangkan 
				kehidupan spiritual dan komunikasi lintas keyakinan dalam kehidupan Mahasiswa.
			</p>
			<a href="#section-5" class="btn-img jumper"></a>
		</div>
	</div>
</div>
<div class="col-md-12 box-content" id="section-5">
	<div  class="col-md-6">

	</div>
	<div class="col-md-6 content">
		<div class="text-content">
			<h1 class="title-content col-md-10">Lembaga Kemahasiswaan</h1>
			<p class="desc-content col-md-10">Organisasi Kemahasiswaan (OK) terdiri dari Lembaga Kemahasiswaan (LK),
			Unit Kegiatan Kemahasiswaan (UKM), Unit Kegiatan Kerohanian (UKKR).
			Selain dalam akademik Mahasiswa dapat menyalurkan bakat mereka pada 
			Organisasi Kemahasiswaan.</p>
		</div>
	</div>
</div>
@stop