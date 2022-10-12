<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container ">
<div class="card h-100">
<div class="card-header">
    <div class="font-weight-bold display-6"><?= $pageheader; ?></div>
</div>
<div class="card-body">
<form action="<?= base_url('/user') ?>" method="POST" id="datauser" class="createuser">
<?= csrf_field() ?>
<div class="row mb-3">
	<label for="nama_depan" class="col-sm-2 col-form-label" >First Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="First Name" >
	</div>
</div>
<div class="row mb-3">
	<label for="nama_belakang" class="col-sm-2 col-form-label" >Last Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Last Name" value="">
	</div>
</div>
<div class="row mb-3">
	<label for="username" class="col-sm-2 col-form-label" >Username </label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="">
	</div>
</div>

<div class="row mb-3">
   <label for="nohp" class="col-sm-2 col-form-label" >Handphone</label>
   <div class="col-sm-10">
     <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Handphone"  value="" required />
   </div>
 </div>
 <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label" >Email</label>
    <div class="col-sm-10">
      <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="" required />
    </div>
  </div>

	<div class="row mb-3">
		<label for="role" class="col-sm-2 col-form-label" >Role</label>
		<div class="col-sm-10">
			<select name="role" id="role" class="form-control" aria-label="Default select example" >
        <option selected value="-">-</option>
				<option value="ADMIN">Admin</option>
				<option value="PETUGAS">Staff</option>
				<option value="USER">User</option>
			</select>
		</div>
	</div>

    <div class="text-end">
		<button type="submit" class="btn btn-primary buttoncreate">Create User</button>
    </div>


  </div>
</div>
</div>
<!-- End Button Data -->    
</form>
<script>
  $(document).ready(function () {
    // var datas = $("#datadevices").serialize();
    $('.createuser').submit(function(e){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        // headers:{'X-Requested-With':'XMLHttpRequest'},
        data: $("#datauser").serialize(),
        // dataType: "json",      
		beforeSend: function(){
			// var buttoncrt = $('.buttoncreate');
			$('.buttoncreate').attr('disable','disabled');
			$('.buttoncreate').html('<i class="fa fa-spin fa-spinner"></i>');
		},
		complete: function(){
			$('.buttoncreate').removeAttr('disable');
			$('.buttoncreate').html('Create User');
		},
        success: function() {
        Swal.fire({
        icon: 'success',  
        title: 'Data User Berhasil Dibuat !',
        showConfirmButton: false
          });                                               
          setTimeout(function(){// wait for 1 secs(2)
                window.location = '/user'; // then reload the page.(3)
            }, 1000); 
        }
    });
    })
  });
</script>
<?= $this->endSection(); ?>