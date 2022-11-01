<?php
$this->extend('template/index');
$this->section('content');
// $ipadd = "";



?>


 <style>
        .map-responsive{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        }
        .containerchart {
        overflow: hidden;
        position: relative;
        resize: both;
        width:100%;
        height:100%;
      }
       
    </style>


<div class="row">
  
<!-- Bagian KWH -->
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="icon-card mb-30" >
      <div class="card-body p-2 ">
        <div class="">
          <h6 class="mb-10"><i class="lni lni-cart-full"></i>Device Active</h6>
        </div>
        <div id="gauge1" class="gauge-container" ></div>

				
			</div>
		</div>
	</div>
  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="icon-card mb-30" >
      <div class="card-body p-2 ">
        <div class="">
          <h6 class="mb-10"><i class="lni lni-cart-full"></i>Lamp Active</h6>
        </div>
        <div id="gauge2" class="gauge-container" ></div>
			</div>
		</div>
	</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="icon-card mb-30" >
      <div class="card-body p-2 ">
        <div class="">
          <h6 class="mb-10"><i class="lni lni-cart-full"></i>Users</h6>
        </div>
        <div id="gauge3" class="gauge-container" ></div>

				
			</div>
		</div>
	</div>
</div>
<script>
   var gaugeDevice = Gauge(
    document.getElementById("gauge1"),
    {
      max: 2,
      dialStartAngle: -90,
      dialEndAngle: -90.001,
      strokeWidth: 5,// The thickness
      value: 0,
    //   dialRadius: ,

      label: function(value) {
        return Math.round(value) + "/" + this.max;
      },
      
      color: function(value){
        if(value == 0 ){
            return "#C40D42";
        }
        else if(value >= 1 && value < this.max){
            return "#F7941E";
        }else{
            return "#B3D335";
        }
      }
    }
  );
  (function loop() {
      

        
    gaugeDevice.setValueAnimated(2, 2); // setValue(Berapa mau menambah, speed perputaran)
    })();
    var gaugeDevice = Gauge(
    document.getElementById("gauge2"),
    {
      max: 2,
      dialStartAngle: -90,
      dialEndAngle: -90.001,
      value: 0,
      label: function(value) {
        return Math.round(value) + "/" + this.max;
      },
      color: function(value){
        if(value == 0 ){
            return "#C40D42";
        }
        else if(value >= 1 && value < this.max){
            return "#F7941E";
        }else{
            return "#B3D335";
        }
      }
    }
  );
  (function loop() {
      

        
    gaugeDevice.setValueAnimated(2, 2); // setValue(Berapa mau menambah, speed perputaran)
    })();
    var gaugeDevice = Gauge(
    document.getElementById("gauge3"),
    {
      max: 2,
      dialStartAngle: -90,
      dialEndAngle: -90.001,
      value: 0,
      label: function(value) {
        return Math.round(value) + "/" + this.max;
      },
      color: function(value){
        if(value == 0 ){
            return "#C40D42";
        }
        else if(value >= 1 && value < this.max){
            return "#F7941E";
        }else{
            return "#B3D335";
        }
      }
    }
  );
  (function loop() {
      

        
    gaugeDevice.setValueAnimated(2, 2); // setValue(Berapa mau menambah, speed perputaran)
    window.setTimeout(loop, 2000);
    })();

</script>

<div class="row">
  <div class="col-lg-6">
    <div class="card-style mb-30">
      <h6 class="mb-10">Data</h6>
     
      <div class="table-wrapper table-responsive ">
        <table class="table table-hover lamps">
          <thead>
            <tr>
              <th><h6>No</h6></th>
              <th><h6>Name</h6></th>
              <th><h6>Mode</h6></th>
              <th><h6>Started At</h6></th>
              <th><h6>Ended At</h6></th>
              <th><h6>Status</h6></th>
              <th><h6>Controlled By</h6></th>
            </tr>
            <!-- end table row-->
          </thead>
          <tbody class="fs-3">
            <?php 
              $no = 1;
            foreach($dataLamp as $dataLamps):
				$status = $dataLamps['status'];
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
                <p><?= $dataLamps['nama_lampu']; ?></p>
              </td>
             
              <td class="min-width">
                <p><?= $dataLamps['mode']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['started_at']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['ended_at']; ?></p>
              </td>
              <td class="min-width">
				<?= $retStatus; ?>
				</td>
              <td class="min-width">
                <p><?= $dataLamps['nama_device']; ?></p>
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
  <div class="col-lg-6">
    <div class="card-style mb-30">
      <h6 class="mb-10">Data</h6>
     
      <div class="table-wrapper table-responsive ">
        <table class="table table-hover temps">
          <thead>
            <tr>
              <th><h6>No</h6></th>
              <th><h6>Device</h6></th>
              <th class="text-center"><h6>Temperature</h6></th>
              <th class="text-center"><h6>Humidity</h6></th>
              <th><h6>Status</h6></th>
            </tr>
            <!-- end table row-->
          </thead>
          <tbody class="fs-3">
            <?php 
              $no = 1;
            foreach($dataDevice as $dataDevices):
            $status = $dataDevices['status'];
            $retStatus = "";
            if($status == "NOT ACTIVE"){
              $retStatus= '<span class="danger-btn status-btn">NOT ACTIVE</span>';
            }else{
              $retStatus= '<span class="success-btn status-btn">ACTIVE</span>';

            }
            $indicatorTemp ="";
            if($dataDevices["temp"] > 33){
              $indicatorTemp = "text-danger";
            }elseif($dataDevices["temp"] >=30 and $dataDevices["temp"] <= 33 ){
              $indicatorTemp = "text-warning";

            }

            else {
            $indicatorTemp = "text-success";

            }
            ?>
            <tr>
              <td class="min-width ">
                <p><?= $no++ ?></p>
              </td>
              <td class="min-width">
              <p><?= $dataDevices['nama_device']; ?></p>

              </td>
                          
              <td class="min-width text-center">
                <p class="<?= $indicatorTemp ?> fw-bold"><?= $dataDevices['temp']."°C"; ?></p>
              </td>
              <td class="min-width text-center">
                <p><?= $dataDevices['humi']; ?></p>
              </td>
              <td class="min-width">
                <?= $retStatus; ?>
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

<div class="card-style mb-30">
    <div class="title d-flex flex-wrap align-items-center justify-content-between">
        <div class="left">
            <h6 class="text-medium mb-30">Energy Consumption Total in Device Category</h6>
        </div>
        <div class="right">
            <div class="select-style-1">
                <div class="select-position select-sm">
                <select id="selectEnergy" class="light-bg">
                <?php
                    foreach($datadevice as $datadevices):
                ?>
                    <option value="<?= $datadevices["meta"]; ?>"><?= $datadevices["nama_device"]; ?></option>
                    <?php
                    endforeach
                    ?>                
                </select>
                </div>
            </div>
        <!-- end select -->
        </div>
        </div>
        <!-- End Title -->
        <div class="chart">
        <canvas
        id="Chart1"
        style="width: 100%; height: 400px"
        ></canvas>
    </div>
    <!-- End Chart -->
</div>
<div class="row">
    
        <div class="col-xl-12 col-lg-12 col-12">
                <div class="card-style mb-30">
            <div class="title d-flex flex-wrap align-items-center justify-content-between">
                <div class="left">
                    <h6 class="text-medium mb-30">Device Location</h6>
                </div>
               
                </div>
                <!-- End Title -->
	            <div id="maps" style="width:100%;height:400px;"></div>
            <!-- End Chart -->
        </div>
        </div>             
                         
</div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('.temps');
            });
            document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('.lamps');
            });
     const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
           
          ],
          // Information about the dataset
          datasets: [
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: [
                600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            },
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "red",
              data: [
                400, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            }, 
            
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "green",
              data: [
                300, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 800,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            },
          ],
        },

        // Configuration options
        defaultFontFamily: "Inter",
        options: {
          tooltips: {
            callbacks: {
              labelColor: function (tooltipItem, chart) {
                return {
                  backgroundColor: "#ffffff",
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            titleFontFamily: "Inter",
            titleFontColor: "#8F92A1",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
          },

          title: {
            display: false,
          },
          legend: {
            display: false,
          },

          scales: {
            yAxes: [
              {
                gridLines: {
                  display: false,
                  drawTicks: true,
                  drawBorder: true,
                },
                ticks: {
                  padding: 35,
                  max: 1200,
                  min: 100,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {
                  drawBorder: false,
                  color: "rgba(143, 146, 161, .1)",
                  zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                  padding: 20,
                },
              },
            ],
          },
        },
      });
      const ctx2 = document.getElementById("Chart2").getContext("2d");
      const chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            
          ],
          // Information about the dataset
          datasets: [
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: [
                600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            },
            {
              label: "",
              backgroundColor: "transparent",
              borderColor: "red",
              data: [
                400, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            }, 
            
           
          ],
        },

        // Configuration options
        defaultFontFamily: "Inter",
        options: {
          tooltips: {
            callbacks: {
              labelColor: function (tooltipItem, chart) {
                return {
                  backgroundColor: "#ffffff",
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            titleFontFamily: "Inter",
            titleFontColor: "#8F92A1",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
          },

          title: {
            display: false,
          },
          legend: {
            display: false,
          },

          scales: {
            yAxes: [
              {
                gridLines: {
                  display: false,
                  drawTicks: true,
                  drawBorder: true,
                },
                ticks: {
                  padding: 35,
                  max: 1200,
                  min: 100,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {
                  drawBorder: false,
                  color: "rgba(143, 146, 161, .1)",
                  zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                  padding: 20,
                },
              },
            ],
          },
        },
      });
</script>
<script>

function myMap(){
    var mapProp= {
        center:new google.maps.LatLng(-8.785502,115.199806),
        zoom:14,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
    };
    var map = new google.maps.Map(document.getElementById("maps"),mapProp);
    // map.setTilt(45);

    var lokasi = new google.maps.LatLng(-8.661862089940081, 115.19748188518464);
    <?php foreach($datadevice as $datadevices): ?>

    var dataArr = [
            '<?= $datadevices['status']?>','<?= $datadevices['nama_device'] ?>',
            '<?= $datadevices['latitude'].",".$datadevices['longitude']?>','<?= $datadevices['ipaddress'] ?>',
            '<?= $datadevices['mac']?>',
            '<?= $datadevices['tipekoneksi'] ?>'
        ];
        var statusLampu;
    // if(dataArr[3] == "manual"){
    //     if(dataArr[6] == "on" ){
    //         statusLampu = "Active";
    //     }else{
    //         statusLampu = "Not Active (Waiting to be controlled)";
    //     }
    // }else{
    //     statusLampu = "Waiting for schedule";

    // }
    var contentString = 
    '<div id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<h4 id="firstHeading" class="fs-4 text-dark">'+ 
    'Device Name : '+dataArr[1] +'</h4>' +
    '<div id="bodyContent">' +
    '<p class="fs-5" >Status Device : ' + dataArr[0] +
    '<br> Location : ' + dataArr[2] +
    '<br> IP Address : ' + dataArr[3] +
    '<br> Mac Address : ' + dataArr[4] +
    '<br> Type Connectivity : ' + dataArr[5] +
    '</p>' 
    +"</div>" +
    "</div>";

    if(statusLampu == "Active" ){
    var icons= '/images/smartlamp.png';
    }else{ 
    var icons= '/images/smartlamp.png';
        // var animations = google.maps.Animation.BOUNCE;
    }
    var marker=new google.maps.Marker({
    position: new google.maps.LatLng(<?= $datadevices["latitude"] ?>,<?= $datadevices["longitude"] ?>),
    map: map,
    // animation: animations,

    icon:icons
    });


    var infowindow = new google.maps.InfoWindow({
    content: contentString,
    
    });
        google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
    <?php endforeach ?>

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
<?php $this->endSection()?>