<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container ">
<div class="card h-100">
<div class="card-header">
    <div class="font-weight-bold display-6"><?= $pageheader; ?></div>
</div>
<div class="card-body">
<form action="/user/<?= $dataUser['id'] ?>" method="POST">
<?= csrf_field() ?>
<input type="hidden" name="_method" value="PUT" />
<input type="hidden" name="id" value="<?= $dataUser['id'] ?>">
<div class="row mb-3">
	<label for="nama_depan" class="col-sm-2 col-form-label" >First Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="<?= $dataUser['nama_depan'] ?>">
	</div>
</div>
<div class="row mb-3">
	<label for="nama_belakang" class="col-sm-2 col-form-label" >Last Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="<?= $dataUser['nama_belakang'] ?>">
	</div>
</div>
<div class="row mb-3">
	<label for="username" class="col-sm-2 col-form-label" >Last Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="<?= $dataUser['username'] ?>">
	</div>
</div>

<div class="row mb-3">
   <label for="nohp" class="col-sm-2 col-form-label" >Handphone</label>
   <div class="col-sm-10">
     <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Enter your Device Mac Address"  value="<?= $dataUser['nohp'] ?>" required />
   </div>
 </div>
 <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label" >Email</label>
    <div class="col-sm-10">
      <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Device IP Address (If Exist)" value="<?= $dataUser['email'] ?>" required />
    </div>
  </div>

	<div class="row mb-3">
		<label for="role" class="col-sm-2 col-form-label" >Role</label>
		<div class="col-sm-10">
			<select name="role" id="role" class="form-control" aria-label="Default select example" >
        <option selected value="<?= $dataUser['role'] ?>"><?= $dataUser['role'] ?></option>
				<option value="ADMIN">Admin</option>
				<option value="PETUGAS">Staff</option>
				<option value="USER">User</option>
			</select>
		</div>
	</div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save Data</button>
    </div>


  </div>
</div>
</div>
<!-- End Button Data -->    
</form>

<?= $this->endSection(); ?>