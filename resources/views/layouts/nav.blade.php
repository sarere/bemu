<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<a href="{{ url('/') }}"><img src="http://2015.bemukdw.org/public/img/header-logo.png" alt="BEM UKDW"></a>
		<ul>
			<li><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li><a href="">KEGIATAN</a></li>
			<li><a href="" class="">ORG. KEMAHASISWAAN</a></li>
			<li><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>PROFIL BEM UKDW</a></li>
		</ul>
	</div>
</nav>