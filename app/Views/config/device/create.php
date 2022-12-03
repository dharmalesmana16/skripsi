<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container ">
<div class="card-style h-100">
  <div class="left">

    <div class="fw-bold"><?= $pageheader; ?></div>
  </div>
<div class="card-body">
<form action="<?= base_url('/device') ?>" method="post" id="datadevices" class="createdevice">

<div class="row mb-3">
	<label for="device_name" class="col-sm-2 col-form-label" >Device Name</label>
	<div class="col-sm-10">
    <input type="text" class="form-control" name="device_name" id="device_name" placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="">
	</div>
</div>


	<div class="row mb-3">
		<label for="device_brand" class="col-sm-2 col-form-label" >Device Brand</label>
		<div class="col-sm-10">
			<select name="device_brand" id="device_brand" class="form-control" aria-label="Default select example" >
        <option selected value="-">-</option>
				<option value="NODEMCU ESPRESSIF">NODEMCU ESPRESSIF</option>
				<option value="ARDUINO">ARDUINO</option>
				<option value="RASPBERRY PI">RASPBERRY PI</option>
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
		<label for="device_connectivity" class="col-sm-2 col-form-label" >Connectivity</label>
		<div class="col-sm-10">
			<select name="device_connectivity" id="device_connectivity" class="form-control" aria-label="Default select example" >
        <option selected value="-">-</option>
				<option value="SIMCOMM 4G">SIMCOMM 4G</option>
				<option value="WIFI">WIFI</option>
				<option value="ETHERNET">Ethernet</option>
				<!-- <option value="RASPBERRY PI">RASPBERRY PI</option> -->
			</select>
		</div>
	</div>
 <div class="row mb-3">
		<label for="mac" class="col-sm-2 col-form-label" >Mac Address</label>
		<div class="col-sm-10">
			<input type="number" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  required />
		</div>
	</div>
 <div class="row mb-3">
		<label for="ip" class="col-sm-2 col-form-label" >IP Address</label>
		<div class="col-sm-10">
			<input type="text" id="ip" name="ip" class="form-control" placeholder="Enter your Device IP Address (If Exist)"  required />
		</div>
	</div>
 

	<div id="googleMap" style="width:100%;height:400px;"></div>
	<div class="row mb-3 form-group">
      <div class="col-sm-6">
	  <label for="latitude">Latitude</label>

        <input type="text" class="form-control" id="latitude" name="latitude" >
      </div>
	  <br>
	
      <div class="col-sm-6">
		  <label for="longitude">Longitude</label>
        <input type="text" class="form-control" id="longitude" name="longitude" >
      </div>
    </div>
    <div class="text-end">
        <button type="submit" class="main-btn primary-btn btn-hover rounded-md fw-bold btncreate">Tambah Data</button>
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
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta,
        icon:'/img/smartlamp.png'
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("latitude").value = posisiTitik.lat();
    document.getElementById("longitude").value = posisiTitik.lng();
    
}
  
function myMap() {

  var propertiPeta = {
    center:new google.maps.LatLng(-8.785502,115.199806),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  marker = new google.maps.Marker({
        map: peta,
        icon:'/images/smartlamp.png'
      });
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>


<script>
  $(document).ready(function () {
    // var datas = $("#datadevices").serialize();
    $('.createdevice').submit(function(e){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        // headers:{'X-Requested-With':'XMLHttpRequest'},
        data: $("#datadevices").serialize(),
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
        title: 'New Device Has been Recorded !',
        showConfirmButton: false
          });                                               
          setTimeout(function(){// wait for 1 secs(2)
                window.location = '/device'; // then reload the page.(3)
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
<?= $this->endSection(); ?>