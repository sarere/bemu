<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<ul class="col-md-12 pad-left-null margin-null col-xs-12">
			<li style="float:left;" class="pad-left-null"><a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a></li>
			<li style="float:left;"><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>BERANDA</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li style="float:left;"><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>ORG. KEMAHASISWAAN</a></li>
			<li style="float:left;" class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
			@if (Auth::guest())
				<li style="float:left;" class="right-abs vertical-align-abs"><a href="{{ url('login') }}" {{{ (Request::is('login') ? 'class=nav-active' : '') }}}>LOGIN</a></li>
			@else
				<li style="float:left;"><a href="{{ url('p3dk') }}"{{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}}>P3DK</a></li>
				<li style="float:right;"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    LOGOUT
                </a></li>
                @if(Auth::user()->user_mode)
                	@if(Auth::user()->admin)
                		<li style="float:right;"><a href="{{ url('user/mode') }}?user=1&admin=0">USER MODE</a></li>
                	@else
                		<li style="float:right;"><a href="{{ url('user/mode') }}?user=0&admin=1">ADMIN MODE</a></li>
                	@endif
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			@endif
		</ul>
	</div>
</nav>