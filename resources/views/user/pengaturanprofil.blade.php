@extends('user.pengaturan')

@section('tes')
<h3 class="margin-btm-small pad-bot margin-top-null" style="border-bottom: solid 1px black">Profil</h3>
<div class="col-md-6 pad-left-null">
	<div class="col-md-11 pad-left-null">
    	<form action="profil/update" method="POST">
    		{{ csrf_field() }}
    	  <div class="form-group">
    	    <label for="namaLengkap">Email address</label>
    	    <input type="text" class="form-control" id="namaLengkap" name="name" placeholder="Nama Lengkap" value="{{ $user->value('name') }}">
    	  </div>
    	  <div class="form-group">
    	    <label for="namaPanggilan">Nama Panggilan</label>
    	    <input type="text" class="form-control" id="namaPanggilan" name="nickname" placeholder="Nama Panggilan" value="{{ $user->value('nickname') }}">
    	  </div>
    	  <div class="form-group">
    	    <label for="facebook">Facebook URL</label>
    	    <input type="text" class="form-control" id="facebook" name="fb" placeholder="" value="{{ $user->value('fb') }}">
    	  </div>
    	  <div class="form-group">
    	    <label for="twitter">Twitter URL</label>
    	    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="" value="{{ $user->value('twitter') }}">
    	  </div>
    	  <div class="form-group">
    	    <label for="website">Website URL</label>
    	    <input type="text" class="form-control" id="website" name="website" placeholder="" value="{{ $user->value('website') }}">
    	  </div>
    	  <div class="form-group">
    	    <label for="line">Line ID</label>
    	    <input type="text" class="form-control" id="line" name="line" placeholder="" value="{{ $user->value('line') }}">
    	  </div>
    	  <button type="submit" class="btn btn-success">Perbaharui Profil</button>
    	</form>
	</div>
</div>
<div class="col-md-4 pad-left-null">
    <form enctype="multipart/form-data">
        <div class="form-group">
           <label for="fileUpload">Foto Profil/Logo</label>
    	   <img src="{{ Auth::user()->logo ? asset('picture').'/'.Auth::user()->logo : asset('picture/default.png')}}" alt="{{ Auth::user()->name }}" class="img-thumbnail col-md-12">
        </div>	
		<input  type="file" name="fileUpload" id="fileUpload" class="hidden">
		<label for="fileUpload" id="lblSelectFile" class="btn btn-default col-md-12">Ganti Foto</label>
		<div class="pad-top-small col-md-12 form-group has-error pad-left-null pad-right-null" id="uploadPhotoHelp">
			<div class="progress hidden">
	          <div class="progress-bar" role="progressbar" id="progress-upload" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
	            0%
	          </div>
	        </div>
			<span id="helpBlock2" class="help-block hidden">A block of help text that breaks onto a new line and may extend beyond one line.</span>
		</div>
	  </div>
	</form>
</div>

<script>

$(":file").change(function() {
    
    var files = this.files;
	if(imgValidation(files[0].name)){
		var formData = new FormData();
	    formData.append("uploadFile",files[0],files[0].name);
	    uploadFile(formData);
	} else{
	    $('#uploadPhotoHelp').addClass('has-error');
	    $('#helpBlock2').removeClass('hidden').text('file extension harus .jpg .JPEG .png .PNG');
	}
});

function imgValidation(filename){
    $extension = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
    if($extension == 'JPEG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG'){
        return true;
    } else{
        return false;
    }
}

function uploadFile(formData){
    
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $.ajax({
    	xhr: function () {
        var xhr = new window.XMLHttpRequest();

        xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                $('#helpBlock2').addClass('hidden');;
                $('.progress').removeClass('hidden');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').text(Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                if (percentComplete === 1) {
                    // $('.progress').addClass('hide');
                }
            }
        }, false);
        xhr.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                console.log(percentComplete);
                $('#helpBlock2').addClass('hidden');;
                $('.progress').removeClass('hidden');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').text(Math.ceil(percentComplete*100)+'%');
                $('#progress-upload').attr('style','width: '+Math.ceil(percentComplete*100)+'%');
            
            }
        }, false);
        return xhr;
    },
        type: "POST",
        url: "profil/upload",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
            $('#uploadPhotoHelp').removeClass('has-error').addClass('has-success');
            $('#helpBlock2').removeClass('hidden').text('foto berhasil diupdate');
             setTimeout(function(){location.href = "profil"}, 500);
        },
        error:function(data){
        	setTimeout(function(){location.href = "profil"}, 500);
        }
    })
}
</script>
@stop