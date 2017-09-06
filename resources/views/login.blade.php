@extends('layouts.master')

@section('title','Login - ')

@section('content')
<div class="col-md-4 col-md-offset-4 pad-top-large" style="min-height:73vh">
	<form action="{{ route('login') }}" method='POST'>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	  	<div class="form-group">
	    	<label for="nim">NIM</label>
	    	<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
	  	</div>
	  	<div class="form-group">
	    	<label for="password">Password</label>
	    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
	  	</div>
	  	<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@stop