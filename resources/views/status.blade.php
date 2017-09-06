@extends('layouts.master')

@section('title','Status Proposal - ')

@section('content')
<div class="col-md-10 col-md-offset-1 pad-top pad-left-null">
  <ol class="breadcrumb bg-color-white font-2-em">
    <li><a {{{ (Request::is('p3dk') ? 'class=nav-active' : '') }}} href="{{ url('p3dk') }}">Pengantar</a></li>
    <li><a {{{ (Request::is('status') ? 'class=nav-active' : '') }}} href="{{ url('status') }}">Status Proposal</a></li>
    <li><a {{{ (Request::is('upload') ? 'class=nav-active' : '') }}} href="{{ url('upload') }}">Upload Proposal</a></li>
  </ol>
</div>
<div class="table-responsive">
  <table class="table">
    ...
  </table>
</div>
@stop