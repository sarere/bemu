@extends('layouts.master')

@section('title','Halaman Tidak Ditemukan - ')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h3 class="align-center"><strong>Halaman yang Anda maksud tidak ada</strong></h3>
	<h4 class="align-center margin-top-small"><strong>Link yang anda berikan mungkin rusak, atau halaman yang dituju telah dihapus.</strong></h4>
	<div class="align-center margin-top-med"><span class="fa fa-low-vision" style="font-size:15em" aria-hidden="true"></span></div>
	<h5 class="align-center margin-top-med"><a href="#" onclick="goBack()">Kembali ke halaman sebelumnya</a></h5>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>
@stop