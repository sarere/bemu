@extends('layouts.master')

@section('title','Login - ')

@section('content')
<div class="col-md-4 col-md-offset-4 pad-top-large" style="min-height:73vh">
	@if ($message = Session::get('error'))
	<div class="alert alert-danger margin-btm-med" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		{{ $message }}
	</div>
	@endif
	<form action="{{ route('login') }}" method='POST'>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	  	<div class="form-group">
	    	<label for="nim">Email</label>
	    	<input type="text" class="form-control" id="nim" name="nim" placeholder="Email">
	  	</div>
	  	<div class="form-group">
	    	<label for="password">Kata Sandi</label>
	    	<input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
	  	</div>
	  	<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@stop