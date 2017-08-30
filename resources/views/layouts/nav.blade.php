<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a>
		<ul>
			<li><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>ORG. KEMAHASISWAAN</a></li>
			<li class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>

		</ul>
	</div>
</nav>