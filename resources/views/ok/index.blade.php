@extends('layouts.master')

@section('title','Beranda')

@section('content')
<div class="col-md-12 header">
    <img src="{{{ asset('picture/pelantikan-bemu.jpg') }}}">
</div>
<div class="col-md-8 col-md-offset-1">
    <div class="col-md-12">
        <div id="section-0" class="main-section col-md-12">
            <div class="profile-title">
                <a class="glyphicon glyphicon-link link-ico jumper" href="#section-0"></a>
                <h1 class="primary-color display-inline-block">Lembaga Kemahasiswaan</h1>
            </div>
            <div class="profile-desc">
				<div class="col-md-6 thumbnail-container">
					<div class="thumbnail border" style="background-color:red">
					
					</div>
					<div class="thumbnail border" style="background-color:yellow">
						
					</div>
					<div class="thumbnail border" style="background-color:red">
					
					</div>
					<div class="thumbnail border" style="background-color:yellow">
						
					</div>
				</div>
				<div class="col-md-6 thumbnail-container" style="margin-top:75px;">
					<div class="thumbnail border" style="background-color:yellow">
						
					</div>
					<div class="thumbnail border" style="background-color:red">
					
					</div>
					<div class="thumbnail border" style="background-color:yellow">
						
					</div>
				</div>
            </div>
        </div>
        <div id="section-1" class="main-section col-md-12">
            <div class="profile-title">
                <a class="glyphicon glyphicon-link link-ico jumper" href="#section-1"></a>
                <h1 class="primary-color display-inline-block">Unit Kegiatan Mahasiswa</h1>
            </div>
            <div class="profile-desc">
                Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.
            </div>
        </div>
        <div id="section-2" class="main-section col-md-12">
            <div class="profile-title">
                <a class="glyphicon glyphicon-link link-ico jumper" href="#section-2"></a>
                <h1 class="primary-color display-inline-block">Unit Kegiatan Kebudayaan</h1>
            </div>
			<div class="col-md-6 thumbnail-container">
				<div id="section-3" class="sub-section thumbnail">
                    <div class="thumbnail-photo broder" style="background-image: url({{{ asset('picture/bemukdw.png') }}})">
                    </div>
                    <div class="thumbnail-header">
                        <h4>Badan Eksekutif Mahasiswa Universitas</h4>
                        <span>bemu@students.ukdw.ac.id</span>
                        <span>08xxxxxxxx<br></span>
                        <span>08xxxxxxxx</span>
                    </div>
				</div>
				<div id="section-5" class="sub-section thumbnail" style="background-color:red">
					
				</div>
				<div id="section-7" class="sub-section thumbnail" style="background-color:yellow">
					
				</div>
				<div id="section-9" class="sub-section thumbnail" style="background-color:red">
					
				</div>
				<div id="section-11" class="sub-section thumbnail" style="background-color:yellow">
					
				</div>
			</div>
			<div class="col-md-6 thumbnail-container" style="margin-top:75px;">
				<div id="section-4" class="sub-section thumbnail" style="background-color:red">
					
				</div>
				<div id="section-6" class="sub-section thumbnail" style="background-color:yellow">
					
				</div>
				<div id="section-8" class="sub-section thumbnail" style="background-color:red">
					
				</div>
				<div id="section-10" class="sub-section thumbnail" style="background-color:yellow">
					
				</div>
				<div id="section-12" class="sub-section thumbnail" style="background-color:red">
					
				</div>
			</div>
        </div>
        <div id="section-13" class="main-section col-md-12">
            <div class="profile-title">
                <a class="glyphicon glyphicon-link link-ico jumper" href="#section-13"></a>
                <h1 class="primary-color display-inline-block">Unit Kegiatan Kerohanian</h1>
            </div>
            <div class="profile-desc">
                Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.Menjadikan Organisasi Kemahasiswaan (OK) sebagai wadah yang kondusif bagi mahasiswa untuk 
                menyalurkan minat bakat. Meningkatkan kesadaran mahasiswa akan pentingnya beroganisasi.
            </div>
        </div>
    </div>
</div>
<div class="col-md-2 sub-nav pad-top">
    <div class="sub-nav-outer">
        <a href="#section-0" class="jumper sub-nav-btn btn-outer" id="btn-0">Visi</a>
        <a href="#section-1" class="jumper sub-nav-btn btn-outer" id="btn-1">Misi</a>
        <a href="#section-2" class="jumper sub-nav-btn btn-outer dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="btn-2">Struktur Organisasi</a>
        <div class="sub-nav-inner" id="costum-dropdown-menu-2">
            <a href="#section-3" class="jumper sub-nav-btn-inner btn-inner" id="btn-3">Bagan Struktur Organisasi</a>
            <a href="#section-4" class="jumper sub-nav-btn-inner btn-inner" id="btn-4">Presiden Universitas</a>
            <a href="#section-5" class="jumper sub-nav-btn-inner btn-inner" id="btn-5">Wakil Presiden Universitas</a>
            <a href="#section-6" class="jumper sub-nav-btn-inner btn-inner" id="btn-6">Kementrian Kesekretariatan</a>
            <a href="#section-7" class="jumper sub-nav-btn-inner btn-inner" id="btn-7">Kementrian Keuangan</a>
            <a href="#section-8" class="jumper sub-nav-btn-inner btn-inner" id="btn-8">Kementrian Luar Negeri</a>
            <a href="#section-9" class="jumper sub-nav-btn-inner btn-inner" id="btn-9">Kementrian Dalam Negeri</a>
            <a href="#section-10" class="jumper sub-nav-btn-inner btn-inner" id="btn-10">Kementrian Olahraga</a>
            <a href="#section-11" class="jumper sub-nav-btn-inner btn-inner" id="btn-11">Kementrian Sosial Seni & Budaya</a>
            <a href="#section-12" class="jumper sub-nav-btn-inner btn-inner" id="btn-12">Kementrian Teknik Informasi</a>
        </div>
        <a href="#section-13" class="jumper sub-nav-btn btn-outer" id="btn-13">Contact Us</a>
    </div>
</div>
@stop