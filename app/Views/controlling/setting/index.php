<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>




<div class="container ">
<div class="card-style ">
    <div class="left">
        <div class="fw-bold">Timer Configuration</div>
    </div>
<div class="card-body">
<form action="/setting/<?= $dataDevice['id']; ?>" method="post">
<?= csrf_field(); ?>

<input type="hidden" name="id" value="<?= $dataDevice['id']; ?>">
<!-- <input type="hidden" name="mode" value="auto"> -->
<div class="row mb-3">
	<label for="started At" class="col-sm-2 col-form-label" >Mode saat ini</label>
	<div class="col-sm-10">
            <input type="text" class="form-control" name="modes" id="" disabled value="<?= $dataDevice["mode"]; ?>">
	</div>
</div>

<div class="row mb-3">
    <label for="mode" class="col-sm-2 col-form-label" >Control Mode</label>
    <div class="col-sm-10">


    <select name="mode" id="mode" class="form-control" aria-label="Default select example" onChange="update()">
    <option value="AUTO">Auto</option>
      <option value="MANUAL">Manual</option>

    </select>
    </div>
  </div>
<div class="row mb-3">
	<label for="started At" class="col-sm-2 " >Started At</label>
	<div class="col-sm-10">
	<input type="button" id="jam_mulai" name="jam_mulai" class="form-control flatpickr js-flatpickr-time" size="20" placeholder="hh:mm:ss" id="waktuMulai" maxlength="10"   />

	</div>
</div>

<div class="row mb-3">
	<label for="skill" class="col-sm-2 col-form-label" >Ended At</label>
	<div class="col-sm-10">
	    <input type="button" id="jam_akhir" class="form-control" name="jam_akhir" size="10" placeholder="hh:mm:ss" id="waktuAkhir" maxlength="5"   />

	</div>
</div>

<!-- Button Update Data -->

    <div class="text-end">

        <button type="submit" class="btn btn-primary">Set Config</button>
    </div>


</div>
</div>
</div>
<!-- End Button Data -->    
</form>


<script type="text/javascript">
       
        function update() {
            var select = document.getElementById('mode');
            var option = select.options[select.selectedIndex];
            if(option.value == "MANUAL"){
                document.getElementById("jam_mulai").disabled = true;
                document.getElementById("jam_akhir").disabled = true;
                document.getElementById("jam_mulai").value = "";
                document.getElementById("jam_akhir").value = "";
     
            }else{
                document.getElementById("jam_mulai").disabled = false;
                document.getElementById("jam_akhir").disabled = false;
            }
            // console.log(option);
        }

        update();
    </script>

<script>
    // config = 
flatpickr('.flatpickr.js-flatpickr-time',{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i:S",
    time_24hr: true
});
flatpickr('#jam_akhir',{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i:S",
    time_24hr: true
}); 
</script>


<?= $this->endSection(); ?>