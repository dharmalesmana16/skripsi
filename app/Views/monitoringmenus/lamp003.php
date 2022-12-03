<?php
    $this->extend('template/index');
    $this->section('content');
?>
          <div class="row">
            <!-- Bagian KWH -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Energy Consumption</h6>
                  <h4 class="mb-0 fw-bold text-gray-800 " id="energyValue">0</h4>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Current</h6>
                  <div class="h4 mb-0 fw-bold text-gray-800 " id="currentValue">1</div>
                  </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Voltage</h6>
                  <div class=" mb-0 fw-bold text-gray-800" id="voltageValue">0</div>
                  
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Power Consumption</h6>
                    <div class=" mb-0 fw-bold text-gray-800" id="powerValue">0</div>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
</div>

            <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between">
                  <div class="left">
                    <h6 class="text-medium mb-10">Realtime Chart Power Consumption</h6>
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
           
            <!-- End Col -->
          </div>
            <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between">
                  <div class="left">
                    <h6 class="text-medium mb-10">Realtime Chart Light Intesity</h6>
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
           
            <!-- End Col -->
          </div>
          <script>
	  const lightIntesity = document.getElementById("Chart2").getContext("2d");
      const chart2 = new Chart(lightIntesity, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [],
            
          // Information about the dataset
          datasets: [
            {

              label: "",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: [],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            }
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
                  max: 500,
                  min: 0,
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
	  const ctx1 = document.getElementById("Chart1").getContext("2d");
      const chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [],
            
          // Information about the dataset
          datasets: [
            {

              label: "",
              backgroundColor: "transparent",
              borderColor: "#4A6CF7",
              data: [],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4A6CF7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 5,
              pointBorderWidth: 5,
              pointRadius: 8,
              pointHoverRadius: 8,
            }
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
                  max: 200,
                  min: 0,
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
async function getDataPower(idLamp = <?= $idLamp ?>){
  let url = "<?php echo base_url('/api/getDataEnergy')?>/" +idLamp;
  let req = await fetch(url);
  let res = await req.json();
  let energyValue = document.getElementById("energyValue");
  let currentValue = document.getElementById("currentValue");
  let voltageValue = document.getElementById("voltageValue");
  let powerValue = document.getElementById("powerValue");
  var times=res[0]['created_at'];
  var a= times.split(" ");
    var b=a[1];

  energyValue.textContent = res[0]["kwh"];
  currentValue.textContent = res[0]["current"];
  voltageValue.textContent = res[0]["volt"];
  powerValue.textContent = res[0]["power"];
  if (chart1.data.labels.length==20) {
        chart1.data.labels=[];
        chart1.data.datasets[0].data=[];
    }
    chart1.data.labels.push(b);
  chart1.data.datasets[0].data.push(res[0]["power"]);
  chart1.update();
}
async function getDataLight(idLamp = <?= $idLamp ?>){
  let url = "<?php echo base_url('/api/getDataLight')?>/" +idLamp;
  let req = await fetch(url);
  let res = await req.json();
  // let energyValue = document.getElementById("energyValue");
  // let currentValue = document.getElementById("currentValue");
  // let voltageValue = document.getElementById("voltageValue");
  // let powerValue = document.getElementById("powerValue");
  var times=res[0]['created_at'];
  var a= times.split(" ");
    var b=a[1];

  // energyValue.textContent = res[0]["kwh"];
  // currentValue.textContent = res[0]["current"];
  // voltageValue.textContent = res[0]["volt"];
  // powerValue.textContent = res[0]["power"];
  if (chart2.data.labels.length==20) {
        chart2.data.labels=[];
        chart2.data.datasets[0].data=[];
    }
    chart2.data.labels.push(b);
  chart2.data.datasets[0].data.push(res[0]["value"]);
  chart2.update();
}
setInterval(function() {getDataPower(),getDataLight()},1000)
</script>
<?php



$this->endSection();
?>

