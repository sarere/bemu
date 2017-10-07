<!-- <nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
		<ul class="col-md-12 pad-left-null margin-null col-xs-12" id="master-menu">
			<li style="float:left;" class="pad-left-null master-item"><a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a></li>
			<li style="float:left;" class="master-item"><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>Beranda</a></li>
			<li class="hidden"><a href="">KEGIATAN</a></li>
			<li style="float:left;" class="master-item"><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>Org. Kemahasiswaan</a></li>
			<li style="float:left;" class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
			@if (Auth::guest())
				<li style="float:left;" class="right-abs vertical-align-abs master-item"><a href="{{ url('login') }}" {{{ (Request::is('login') ? 'class=nav-active' : '') }}}>Login</a></li>
			@else
				<li style="float:left;" class="master-item"><a href="{{ url('p3dk') }}"{{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}}>P3DK</a></li>
				<li style="float:right;" class="master-item">
					<div class="btn-group" role="group">
						<button style=" border:none; background:none;" data-toggle="dropdown">
							<img src="{{ Auth::user()->logo ? asset('picture').'/'.Auth::user()->logo : asset('picture/default.png')}}" alt="{{ Auth::user()->name }}" class="img-circle bg-color-white" style="width:40px; height:40px;">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
							<li><a href="{{ route('pengaturan.profil') }}">Pengaturan Pengguna</a></li>
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
</nav> -->


<nav {{{ (Request::is('/') ? 'class=nav-fixed' : 'class=nav') }}}>
	<div class="col-md-10 col-md-offset-1">
				<div class="pad-left-null navbar-header">
					<a href="{{ url('/') }}"><img src="{{ asset('picture/bemu.png') }}" alt="BEM UKDW"></a>
					 <button type="button" class="navbar-toggle collapsed border margin-top-small" id="navbar-tog">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar" style="background-color:black" ></span>
				        <span class="icon-bar" style="background-color:black" ></span>
				        <span class="icon-bar" style="background-color:black" ></span>
				      </button>
				</div>
				<div class="collapse navbar-collapse padding-null margin-null" id="bs-example-navbar-collapse-1">
					<ul class="padding-null margin-null" style="float:left">
						<li class="master-item"><a href="{{ url('/') }}" {{{ (Request::is('/') ? 'class=nav-active' : '') }}}>Beranda</a></li>
						<li class="hidden"><a href="">KEGIATAN</a></li>
						<li class="master-item"><a href="{{ route('ok.index') }}"{{{ (Request::is('ok') ? 'class=nav-active' : '') }}}>Org. Kemahasiswaan</a></li>
						<li class="hidden"><a href="{{ route('profil.index') }}" {{{ (Request::is('profil') ? 'class=nav-active' : '') }}}>BEM UKDW</a></li>
						@if (Auth::guest())
					</ul>
					<ul style="float:right">
							<li class="master-item"><a href="{{ url('login') }}" {{{ (Request::is('login') ? 'class=nav-active' : '') }}}>Login</a></li>
						</ul>
						@else
							<li class="master-item"><a href="{{ url('p3dk') }}"{{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}}>P3DK</a></li>
						</ul>
						<ul style="float:right" class="pad-right">
							@if(Auth::user()->admin)
						    	<li class="master-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
			            	@endif
							<li class="master-item">
								<div class="btn-group" role="group">
									<button style=" border:none; background:none;" data-toggle="dropdown">
										<img src="{{ Auth::user()->logo ? asset('picture').'/'.Auth::user()->logo : asset('picture/default.png')}}" alt="{{ Auth::user()->name }}" class="img-circle bg-color-white" style="width:40px; height:40px;">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
										<li><a href="{{ route('pengaturan.profil') }}">Pengaturan Pengguna</a></li>
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
			                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                    {{ csrf_field() }}
			                </form>
						@endif
				</ul>
			</div>
	</div>
</nav>

<div id="close-menu">
</div>

<div id="menu">
	<div class="abs-top">
		<div>
			<a href="{{ url('/') }}"><span class="{{ (Request::is('/') ? 'nav-active fa fa-home' : 'fa fa-home') }}" aria-hidden="true"></span></a>
		</div>
		<div>
			<a href="{{ route('ok.index') }}"><span class="{{ (Request::is('ok') ? 'nav-active fa fa-users' : 'fa fa-users') }}" aria-hidden="true"></span></a>
		</div>
		@if (!Auth::guest())
		<div>
			<a href="{{ url('p3dk') }}"><span class="{{ (Request::is('p3dk') ? 'nav-active fa fa-money' : (Request::is('status') ? 'nav-active fa fa-money' : (Request::is('upload') ? 'nav-active fa fa-money' : 'fa fa-money'))) }}" aria-hidden="true"></span></a>
		</div>
		@endif
	</div>
	<div class="abs-bot">
		@if (Auth::guest())
		<div>
			<a href="{{ url('login') }}"><span class="{{ (Request::is('login') ? 'nav-active fa fa-sign-in' : 'fa fa-sign-in') }}" aria-hidden="true"></span></a>
		</div>
		@else
		<div>
			<button style=" border:none; background:none;" data-toggle="dropdown">
				<img src="{{ Auth::user()->logo ? asset('picture').'/'.Auth::user()->logo : asset('picture/default.png')}}" alt="{{ Auth::user()->name }}" class="img-circle bg-color-white" style="width:40px; height:40px;">			
			</button>
		</div>
		@if(Auth::user()->user_mode)
        	@if(Auth::user()->admin)
        	<div>
				<a href="{{ url('dashboard') }}"><span class="{{ (Request::is('login') ? 'nav-active fa fa-dashboard' : 'fa fa-dashboard') }}" aria-hidden="true"></span></a>
			</div>
        	<div>
				<a href="{{ url('user/mode') }}?user=1&admin=0"><span class="fa fa-user" aria-hidden="true"></span></a>
			</div>
        	@else
        	<div>
        		<a href="{{ url('user/mode') }}?user=0&admin=1"><span class="fa fa-user-secret" aria-hidden="true"></span></a>
        	</div>
        	@endif
        @endif
		<div>
			<a href="{{ route('pengaturan.profil') }}"><span class="{{ (Request::is('pengaturan/profil') ? 'nav-active fa fa-cog' : (Request::is('pengaturan/privasi') ? 'nav-active fa fa-cog' : 'fa fa-cog')) }}" aria-hidden="true"></span></a>
		</div>
		<div>
			<a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><span class="fa fa-sign-out" aria-hidden="true"></span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		</div>
		@endif
	</div>
</div>

<script type="text/javascript">
$('#navbar-tog').click(function(){
	$('#close-menu').fadeIn();
	$('body').addClass('hidden-overflow')
	$('#menu').show('slide', {direction: 'right'}, 200);
})

$('#close-menu').click(function(){
	$('#close-menu').fadeOut();
	$('body').removeClass('hidden-overflow')
	$('#menu').hide('slide', {direction: 'right'}, 200);
})
</script>