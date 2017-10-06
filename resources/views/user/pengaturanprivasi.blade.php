@extends('user.pengaturan')

@section('tes')
<h3 class="margin-btm-small pad-bot margin-top-null" style="border-bottom: solid 1px black">Privasi</h3>
<div class="col-md-6 pad-left-null">
	<form action="profil/change-password" method="POST">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="passwordLama">Password Lama</label>
	    <input type="password" class="form-control" name="oldPassword" id="passwordLama" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="passwordBaru">Password Baru</label>
	    <input type="password" class="form-control" name="newPassword" id="passwordBaru" placeholder="">
	  </div>
	  <div class="form-group" id="formKonfrimPassword">
	    <label for="konfirmPasswordBaru">Konfirmasi Password Baru</label>
	    <input type="password" class="form-control" name="confirmNewPassword" id="konfirmPasswordBaru" placeholder="">
	    <span id="helpBlock2" class="help-block hidden">A block of help text that breaks onto a new line and may extend beyond one line.</span>
	  </div>
	  <button type="submit" class="btn btn-default" id="submit">Ganti Password</button>
	</form>
</div>

<script type="text/javascript">
$('#konfirmPasswordBaru').keyup(function(){
	if($('#konfirmPasswordBaru').val() != $('#passwordBaru').val()){
		$('#formKonfrimPassword').removeClass('has-success').addClass('has-error');
		$('#helpBlock2').removeClass('hidden').text('Konfirmasi Password Baru Salah');
	} else{
		$('#formKonfrimPassword').removeClass('has-error').addClass('has-success');
		$('#helpBlock2').removeClass('hidden').text('Konfirmasi Password Baru Benar');
	}
})
</script>
@stop