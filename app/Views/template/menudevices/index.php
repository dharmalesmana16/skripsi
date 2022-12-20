<?php
$this->extend('template/index');
$this->section('content');

?>

<div class="row">
<!-- Bagian KWH -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
				<i class="fa-solid fa-ethernet"></i>                </div>
                <div class="content">
                  <h6 class="mb-10">Network</h6>
                 
                  <div class=" mb-0 fw-bold text-gray-800">IP Add :  <span class="text-sm"><?= $ipDevice; ?></span></div>
				  <span></span>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              	<div class="icon-card mb-30">
					<div class="icon success">
					<i class="fa-sharp fa-solid fa-toggle-on"></i>                                              
					</div>
					<div class="content">
						<h6 class="mb-10">Controlled Lamp</h6>
						<div class="h4 fw-bold text-gray-800 "><?= $controlledLamp; ?></div>
							<span></span>
					</div>
				</div>
			</div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
				<i class="fa-solid fa-temperature-half"></i>                </div>
                <div class="content">
                  <h6 class="mb-10">Device Temperature</h6>
                  <div class=" mb-0 fw-bold text-gray-800" id="temp_">Temp : <span class="" id="temp" class=" mb-0 fw-bold text-gray-800" >-</span></div>
                    <div class="mb-0 fw-bold text-gray-800" id="humi_">Humidity : <span class="" id="humi" class=" mb-0 fw-bold text-gray-800" >-</span></div>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon green">
				<i class="fa-solid fa-wifi"></i>
			                </div>
                <div class="content">
                  <h6 class="mb-10">Device Status</h6>
                    <div class=" mb-0 fw-bold text-gray-800">Status :  <span class="text-sm"><?= $statusDevice; ?> </span></div>
                    <div class=" mb-0 fw-bold text-gray-800">Packet Time :<?= $packetTime; ?> </div>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
</div>
<?= $this->include('devicemenus/template/table'); ?>
 <div class="row">
            <div class="col-lg-6">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between">
                  <div class="left">
                    <h6 class="text-medium mb-10">Power Consumption</h6>
                  </div>
                  <div class="right">
                    <div class="select-style-1">
                      <div class="select-position select-sm">
                        <select class="light-bg">
                          <option value="">LAMP001</option>
                          <option value="">LAMP002</option>
                          <option value="">LAMP003</option>
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
            </div>
            <!-- End Col -->
            <div class="col-lg-6">
              <div class="card-style mb-30">
                <div
                  class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  "
                >
                  <div class="left">
                    <h6 class="text-medium mb-30">Device Temperature & Humidity Statistic</h6>
                  </div>
                  <div class="right">
                    <div class="select-style-1">
                      <div class="select-position select-sm">
                        <select class="light-bg">
                          <option value="weekly">Weekly</option>
                        </select>
                      </div>
                    </div>
                    <!-- end select -->
                  </div>
                </div>
                <!-- End Title -->
                <div class="chart">
                  <canvas
                    id="Chart2"
                    style="width: 100%; height: 400px"
                  ></canvas>
                </div>
                <!-- End Chart -->
              </div>
            </div>
            <!-- End Col -->
          </div>

<?php
	
	// echo $path;
	foreach($result as $dataTemps){
		// echo $dataTemps["suhu"];
        if($dataTemps){

            $tanggal = date_create($dataTemps["hari"]);
            $tanggals[] = date_format($tanggal,"d M Y");	
            $suhu[] = $dataTemps["suhu"];
            $kel[] = $dataTemps["kel"];
        }
		// echo $tanggals;
	}
  if(count($tanggals) == 8){
    $removed = array_shift($tanggals);
    $removed = array_shift($suhu);
    $removed = array_shift($kel);
  }
  // var_dump($tanggals);
?>
<script>
	    const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types
        // The data for our dataset
        data: {
          labels: [
         
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
                  max: 100,
                  min: 20,
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
      // Device temperature and humidity
      const ctx2 = document.getElementById("Chart2").getContext("2d");
	  var dateArrayJS = <?php echo json_encode($tanggals); ?>

	  const chart2 = new Chart(ctx2, {
		
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: dateArrayJS,
          
          // Information about the dataset
          datasets: [
            {
              label: "Temp",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: <?php echo json_encode($suhu);?>,
              
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
			  yAxisID: 'y'

            },
            {
              label: "Humi",
              backgroundColor: "transparent",
              borderColor: "red",
			        data: <?php echo json_encode($kel);?>,
            
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
			  yAxisID: 'y1'
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
				id: "y",
				position:"left",
                gridLines: {
                  display: false,
                  drawTicks: true,
                  drawBorder: true,
                },
                ticks: {
                  padding: 35,
                  max: 100,
                  min: 20,
                },
              },{
				id: "y1",
				position:"right",

                gridLines: {
                  display: false,
                  drawTicks: true,
                  drawBorder: true,
                },
                ticks: {
                  // label:"C",
                  padding: 35,
                  max: 100,
                  min: 20,
                },
			  }
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


function getDataTemp(){
  

$.ajax({
  type: "GET",
  url: "<?php echo base_url('/api/getDataTempDevice')."/".$idDevice?>",
  // data: "data"
  dataType: "json",
  success: function (response) {
        let temp = response[0]["temp"].toLocaleString();
        let humi = response[0]["humi"].toLocaleString();
        document.getElementById("temp").textContent = temp;
        document.getElementById("humi").textContent = humi;
        // var tempContent = temp;
    }
});
}

setInterval(function () {getDataTemp(),loadDataChart()}, 2000);//request every x seconds


</script>
<?php
$this->endSection();
?>

