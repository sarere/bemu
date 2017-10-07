@extends('layouts.master')

@section('title','Pengaturan - ')

@section('content')
@if (Session::has('message'))
    <div class="col-md-12 alert alert-{{ Session::get('status') }}"><p class="col-md-10 col-md-offset-1">{{ Session::get('message') }}</p></div>
@endif
<div class="col-md-10 col-md-offset-1 pad-top-med" id="content">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">Menu</div>
	    	<ul class="list-group">
			    <li class="list-group-item" {{ (Request::is('pengaturan/profil') ? 'id=active-border-left' : '') }}><a href="profil">Profil</a></li>
			    <li class="list-group-item" {{ (Request::is('pengaturan/privasi') ? 'id=active-border-left' : '') }}><a href="privasi">Privasi</a></li>
		  	</ul>
		</div>
	</div>
	<div class="col-md-9">
		@yield('tes')
	</div>
</div>
@stop