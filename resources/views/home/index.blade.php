@extends('template.index')
@section('content')
@push('home')
@vite(['resources/js/app.js'])
@endpush
<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 46.25%;
        position: relative;
        height: 0;
    }

    .containerchart {
        overflow: hidden;
        position: relative;
        resize: both;
        width: 100%;
        height: 100%;
    }

</style>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
                <i class="fa-solid fa-microchip"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Devices Active</h6>
                <h3 class="text-bold mb-10">1 / 2</h3>

            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="fa-solid fa-lamp-street"></i> </div>
            <div class="content">
                <h6 class="mb-10">Street Lamp Active</h6>
                <h3 class="text-bold mb-10">0 / 2</h3>

            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-users"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">User Active</h6>
                <h3 class="text-bold mb-10">1 / 1</h3>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
</div>
<div class="card-style mb-30 ">
    <div class="left">
        <h6 class="text-medium mb-10">Device Location</h6>
    </div>
    <div id="googleMap" class="map-responsive" style="width: 100%, height: 400px"></div>
    <!-- end card -->
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card-style  h-100 mb-30">
            <h6 class="mb-10">Street Lamp Data</h6>

            <div class="table-wrapper table-responsive ">
                <table class="table table-hover lamps">
                    <thead>
                        <tr>
                            <th>
                                <h6>No</h6>
                            </th>
                            <th>
                                <h6>Name</h6>
                            </th>
                            <th>
                                <h6>Mode</h6>
                            </th>
                            <th>
                                <h6>Started At</h6>
                            </th>
                            <th>
                                <h6>Ended At</h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                            <th>
                                <h6>Controlled By</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody class="fs-3">
                        <?php
              $no = 1;
            foreach($lamps as $dataLamps):
				$status = $dataLamps->status;
				$retStatus = "";
				if($status = "NOT ACTIVE"){
					$retStatus= '<span class="danger-btn status-btn">NOT ACTIVE</span>';
				}else{
					$retStatus= '<span class="success-btn status-btn">ACTIVE</span>';

				}
            ?>
                        <tr>
                            <td class="min-width ">
                                <p><?= $no++ ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->nama_lampu; ?></p>
                            </td>

                            <td class="min-width">
                                <p><?= $dataLamps->mode; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->started_at; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->ended_at; ?></p>
                            </td>
                            <td class="min-width">
                                <?= $retStatus; ?>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->nama_device; ?></p>
                            </td>
                            <td>

                                <form method="GET" class="d-inline btnshow">
                                    <!-- <input type="hidden" name="_method" value="DELETE" > -->
                                    <div class="actionshow">
                                        <button type="submit" class="btn text-success">
                                            <i class="lni lni-eye"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>



                        </tr>
                        <?php
            endforeach
            ?>
                        <!-- end table row -->

                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->

    </div>


</div>

<div class="card-style mt-30">
    <div class="title d-flex flex-wrap align-items-center justify-content-between">
        <div class="left">
            <h6 class="text-medium mb-30">Energy Consumption Total of Street Lamp</h6>
        </div>
        <div class="right">
            <div class="select-style-1">
                <div class="select-position select-sm">
                    <select id="selectEnergy" class="light-bg">
                    @foreach ($devices as $datadevices )


                        <option value="{{  $datadevices->meta  }}"> {{  $datadevices->nama_device }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- end select -->
        </div>
    </div>
    <!-- End Title -->
    <div class="chart">
        <figure class="highcharts-figure">
            <div id="chartHomeEnergy"></div>

        </figure>
    </div>
    <!-- End Chart -->
</div>


<script>
    function myMap(){


var mapProp= {
    center: new google.maps.LatLng("0", "0"),
    zoom:15,
    disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

// var lokasi = new google.maps.LatLng(-8.661862089940081, 115.19748188518464);



    var statusLampu;
//   if(dataArr[3] == "manual"){
//       if(dataArr[6] == "on" ){
//           statusLampu = "Active";
//       }else{
//           statusLampu = "Not Active (Waiting to be controlled)";
//       }
//   }else{
//     statusLampu = "Waiting for schedule";

//   }
//     var contentString =
// '<div id="content">' +
// '<div id="siteNotice">' +
// "</div>" +
// '<h4 id="firstHeading" class="fs-4 text-dark">'+
// 'Lamp Name : '+dataArr[1] +'</h4>' +
// '<div id="bodyContent">' +
// '<p class="fs-5" >Status Lampu : ' + statusLampu +
// '<br> Location : ' + dataArr[2] +
// '<br> Mode : ' + dataArr[3] +
// '<br> Time : ' + dataArr[4] +
// '<br> Controlled By : ' + dataArr[5] +
// '<br> Status Device : ' + dataArr[0] +
// '</p>'
// +"</div>" +
// "</div>";

// if(statusLampu == "Active" ){
// var icons= '/img/smartlamp.png';
// }else{
// var icons= '/img/smartlamp-die.png';
//     var animations = google.maps.Animation.BOUNCE;
// }
var marker=new google.maps.Marker({
position: new google.maps.LatLng("0","0"),
map: map,
animation: animations,


});


var infowindow = new google.maps.InfoWindow({
  content: contentString,

});
       google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));

}
function getInfoCallback(map, content) {
var infowindow = new google.maps.InfoWindow({content: content});
return function() {
        infowindow.setContent(content);
        infowindow.open(map, this);
    };
}
google.maps.event.addDomListener(window, 'load', myMap);
</script>

@endsection
