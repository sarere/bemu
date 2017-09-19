<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<ul class="col-md-12 pad-left-null margin-null col-xs-12" id="master-menu">
			<li style="float:left;" class="pad-left-null master-item"><a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a></li>
			<li style="float:left;" class="master-item"><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>Beranda</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li style="float:left;" class="master-item"><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>Org. Kemahasiswaan</a></li>
			<li style="float:left;" class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
			@if (Auth::guest())
				<li style="float:left;" class="right-abs vertical-align-abs master-item"><a href="{{ url('login') }}" {{{ (Request::is('login') ? 'class=nav-active' : '') }}}>LOGIN</a></li>
			@else
				<li style="float:left;" class="master-item"><a href="{{ url('p3dk') }}"{{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}}>P3DK</a></li>
				<li style="float:right;" class="master-item">
					<div class="btn-group" role="group">
						<button style=" border:none; background:none;" data-toggle="dropdown">
							<img src="{{ Auth::user()->logo ? asset('picture').'/'.Auth::user()->logo : asset('picture/default.png')}}" alt="{{ Auth::user()->name }}" class="img-circle bg-color-white" style="width:40px; height:40px;">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
							<li><a href="#">Pengaturan Pengguna</a></li>
							 @if(Auth::user()->user_mode)
			                	@if(Auth::user()->admin)
			                		<li><a href="{{ url('user/mode') }}?user=1&admin=0">Mode Pengguna</a></li>
			                	@else
			                		<li><a href="{{ url('user/mode') }}?user=0&admin=1">Mode Admin</a></li>
			                	@endif
			                @endif
						    <li role="separator" class="divider"></li>
						    <li>
						    	<a href="{{ route('logout') }}"
				                    onclick="event.preventDefault();
				                             document.getElementById('logout-form').submit();">
				                    Logout
				                </a>
			            	</li>
						</ul>
					</div>
            	</li>
            	@if(Auth::user()->admin)
			    	<li style="float:right;" class="master-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            	@endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			@endif
		</ul>
	</div>
</nav>