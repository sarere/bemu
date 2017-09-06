<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<ul class="col-md-12 pad-left-null margin-null col-xs-12">
			<li class="pad-left-null"><a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a></li>
			<li><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>ORG. KEMAHASISWAAN</a></li>
			<li class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
			@if(Session::get('my_name'))
				<li><a href="{{ url('p3dk') }}"{{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}}>P3DK</a></li>
				<li class="right-abs vertical-align-abs"><a href="{{ url('logout') }}">LOGOUT</a></li>
			@else
				<li class="right-abs vertical-align-abs"><a href="{{ url('login') }}" {{{ (Request::is('login') ? 'class=nav-active' : '') }}}>LOGIN</a></li>
			@endif
		</ul>
	</div>
</nav>