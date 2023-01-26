@extends('template.index')
@section('content')
<div class="container ">
<div class="card-style w-75">
    <div class="fw-bold"><?= $pageheader; ?></div>
<div class="card-body">
<form action="<?= base_url('/lamp') ?>" method="post" id="datalampu" class="createlamp">

<div class="row mb-3">
	<label for="nama_lampu" class="col-sm-2 col-form-label" >Lamp Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="nama_lampu" id="nama_lampu" placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="">
	</div>
</div>


	<div class="row mb-3">
		<label for="type" class="col-sm-2 col-form-label" >Type of Lamp</label>
		<div class="col-sm-10">
			<select name="type" id="type" class="form-control" aria-label="Default select example" >
        <option selected value="-">-</option>
				<option value="LED">LED</option>
				<option value="NON LED">NON LED</option>
			</select>
		</div>
	</div>
	<!-- <div class="row mb-3">
	<label for="model_device" class="col-sm-2 col-form-label" >DEVICE MODEL</label>
	<div class="col-sm-10">
        	<input type="text" class="form-control" name="model_device" id="model_device" placeholder="Enter your Device Model (e.g:v1 / v2 / v3)" >
	</div>
</div> -->

 <div class="row mb-3">
		<label for="brand" class="col-sm-2 col-form-label" >Brand of Lamp</label>
		<div class="col-sm-10">
			<input type="text" id="brand" name="brand" class="form-control" placeholder="Enter your Device Brand Address"  required />
		</div>
	</div>


    <div class="text-end">
        <button type="submit" class="btn btn-primary btncreate">Create Data</button>
    </div>


</div>
</div>
</div>
<!-- End Button Data -->
</form>


<script>
  document.getElementById('submit').onclick = function() {
    var select = document.getElementById('pets');
    var selected = [...select.selectedOptions]
                    .map(option => option.value);
    alert(selected);
}


</script>


<script>
  $(document).ready(function () {
    // var datas = $("#datalampu").serialize();
    $('.createlamp').submit(function(e){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        // headers:{'X-Requested-With':'XMLHttpRequest'},
        data: $("#datalampu").serialize(),
        // dataType: "json",
        beforeSend: function(){
            $('.btncreate').attr('disable','disabled');
            $('.btncreate').html('<i class="fa fa-spin fa-spinner"> </i>');
        },
        complete: function(){
          $('.btncreate').removeAttr('disable');
          $('.btncreate').html('Tambah Data');
        },
        success: function() {
        Swal.fire({
        icon: 'success',
        title: 'New Lamp Data Has been Recorded !',
        showConfirmButton: false
          });
          setTimeout(function(){// wait for 1 secs(2)
                window.location = '/lamp'; // then reload the page.(3)
            }, 3000);
        }
    });
    })
  });
</script>
<!-- <script>
ClassicEditor
  .create(document.querySelector('#fitur'));
</script> -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
@endsection
