<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-8 col-md-offset-2">
		<a href="{{ url('/') }}"><img src="http://2015.bemukdw.org/public/img/header-logo.png" alt="header-logo"></a>
		<ul>
			<li><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li><a href="{{ route('cars.index') }}" {{{ (Request::is('cars') ? 'class=nav-active' : '') }}}>EVENT</a></li>
			<li><a href="" class="">ORG. KEMAHASISWAAN</a></li>
			<li><a href="" class="">TENTANG BEM UKDW</a></li>
		</ul>
	</div>
</nav>