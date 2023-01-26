@extends('template.index')
@section('content')
<div class="container ">
    <div class="card-style h-100">
        <div class="card-body">
            <form action="{{ url('/devices/new') }}" method="post" id="datadevices" class="createdevice">
                @csrf
                   <div class="row mb-3">
                    <label for="device_name" class="col-sm-2 col-form-label">Device Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="device_name" id="device_name"
                            placeholder="Enter Your Device Name (e.g : DEVICE001 )" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="brand_device" class="col-sm-2 col-form-label">Device Brand</label>
                    <div class="col-sm-10">
                        <select name="brand_device" id="brand_device" class="form-control"
                            aria-label="Default select example">
                            <option selected value="-">-</option>
                            <option value="NODEMCU ESPRESSIF">NODEMCU ESPRESSIF</option>
                            <option value="ARDUINO">ARDUINO</option>
                            <option value="RASPBERRY PI">RASPBERRY PI</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mac" class="col-sm-2 col-form-label">Mac Address</label>
                    <div class="col-sm-10">
                        <input type="text" id="mac" name="mac" class="form-control"
                            placeholder="ex : AA:BB:CC:DD:EE:FF" required />
                    </div>
                </div>
                <label for="ip" class="col-sm-1 col-form-label" >IP Address</label>
                <div class="row mb-3">
                    <div class="col-sm-3 mb-3">
                        <input type="number" id="ip1" name="ip1" class="form-control" placeholder="0-255"  required />
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="number" id="ip2" name="ip2" class="form-control" placeholder="0-255"  required />
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="number" id="ip3" name="ip3" class="form-control" placeholder="0-255"  required />
                    </div>
                    <div class="col-sm-3">
                        <input type="number" id="ip4" name="ip4" class="form-control" placeholder="0-255"  required />
                    </div>
                </div>


                <div id="googleMap" style="width:100%;height:400px;"></div>
                <div class="row mb-3 form-group">
                    <div class="col-sm-6">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                    <br>

                    <div class="col-sm-6">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="main-btn primary-btn btn-hover rounded-md fw-bold btncreate">Tambah
                        Data</button>
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


<script>
    $(document).ready(function () {
        // var datas = $("#datadevices").serialize();
        $('.createdevice').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                // headers:{'X-Requested-With':'XMLHttpRequest'},
                data: $("#datadevices").serialize(),
                // dataType: "json",
                beforeSend: function () {
                    $('.btncreate').attr('disable', 'disabled');
                    $('.btncreate').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function () {
                    $('.btncreate').removeAttr('disable');
                    $('.btncreate').html('Tambah Data');
                },
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'New Device Has been Recorded !',
                        showConfirmButton: false
                    });
                    setTimeout(function () { // wait for 1 secs(2)
                        window.location = '/devices'; // then reload the page.(3)
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
@endsection()
