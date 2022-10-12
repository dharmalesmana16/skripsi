<div class="row">
<!-- Bagian KWH -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-cart-full"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Network Status</h6>
                 
                  <div class=" mb-0 fw-bold text-gray-800">IP Add :  <span class="text-sm"><?= $ipDevice; ?></span></div>
                    <div class=" mb-0 fw-bold text-gray-800">Mac Add : <?= $macDevice; ?> </div>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-dollar"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Controlled Lamp</h6>
                  <div class="h4 fw-bold text-gray-800 "><?= $controlledLamp; ?></div>
                    <span></span>
                   
                  </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-credit-cards"></i>
                </div>
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
                <div class="icon orange">
                  <i class="lni lni-user"></i>
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