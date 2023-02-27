@extends('template.index')
@section('content')


<div class="container">
    <div class="card h-100">

        <div class="card-body">
            <form action="/devices/update/<?= $dataDevice['id'] ?>" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= $dataDevice['id'] ?>">
                <div class="row mb-3">
                    <label for="nama_device" class="col-sm-2 col-form-label">Device Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_device" id="nama_device"
                            placeholder="Enter Your Device Name (e.g : DEVICE001 )"
                            value="<?= $dataDevice['nama_device'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brand_device" class="col-sm-2 col-form-label">Device Brand</label>
                    <div class="col-sm-10">
                        <select name="brand_device" id="brand_device" class="form-control"
                            aria-label="Default select example">
                            <option selected value="<?= $dataDevice['brand_device'] ?>"><?= $dataDevice['brand_device'] ?></option>
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
                    <label for="mac" class="col-sm-2 col-form-label">Mac Address</label>
                    <div class="col-sm-10">
                        <input type="text" id="mac" name="mac" class="form-control"
                            placeholder="Enter your Device Mac Address" value="<?= $dataDevice['macaddress'] ?>" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ip" class="col-sm-2 col-form-label">IP Address</label>
                    <div class="col-sm-10">
                        <input type="text" id="ip" name="ip" class="form-control"
                            placeholder="Enter your Device IP Address (If Exist)"
                            value="<?= $dataDevice['ipaddress'] ?>" required />
                    </div>
                </div>

                <div id="googleMap" style="width:100%;height:400px;"></div>
                <div class="row form-group mb-3">
                    <div class="col-sm-6">
                        <label for="latitude">Latitude</label>

                        <input type="text" class="form-control" id="latitude" name="latitude"
                            value="<?= $dataDevice['latitude'] ?>">
                    </div>
                    <br>

                    <div class="col-sm-6">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude"
                            value="<?= $dataDevice['longitude'] ?>">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>

        </div>
    </div>
</div>
<!-- End Button Data -->
</form>

<script>
    document.getElementById('submit').onclick = function () {
        var select = document.getElementById('pets');
        var selected = [...select.selectedOptions]
            .map(option => option.value);
        alert(selected);
    }
    // variabel global marker
    var marker;

    function taruhMarker(peta, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta,
                icon: '/img/smartlamp.png'
            });
        }

        // isi nilai koordinat ke form
        document.getElementById("latitude").value = posisiTitik.lat();
        document.getElementById("longitude").value = posisiTitik.lng();

    }

    function myMap() {
        var propertiPeta = {
            center: new google.maps.LatLng(-8.785502, 115.199806),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP,

        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        marker = new google.maps.Marker({
            map: peta,
            icon: '/images/smartlamp.png'
        });
        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function (event) {
            taruhMarker(this, event.latLng);
        });

    }
    // event jendela di-load
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- <script>
				ClassicEditor
								.create(document.querySelector('#fitur'));
</script> -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
@endsection
