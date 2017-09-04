<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		
		<ul class="col-md-12 pad-left-null">
			<li class="pad-left-null"><a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a></li>
			<li><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>ORG. KEMAHASISWAAN</a></li>
			<li class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
			<li class="right-abs vertical-align-abs"><a href="#">LOGIN</a></li>
		</ul>
	</div>
</nav>