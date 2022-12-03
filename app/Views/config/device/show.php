<div class="modal fade" id="device_detail" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Device</h5>
      
      </div>
      <div class="modal-body table-responsive">
          
          <table class="table table-hover table-white ">
                <tbody>
                    <tr>
                        <th style="" >Device ID</th>
                        <td><span id="deviceid"><?= $dataDevice['id']; ?></span></td>

                    </tr>
                    <tr>
                        <th style="" >Device Name</th>
                        <td><span id="devicename"><?= $dataDevice['nama_device']; ?></span></td>

                    </tr>
                    <tr>
                        <th style="" >Mac Address</th>
                        <td><span id="devicemac"><?= $dataDevice['mac']; ?></span></td>

                    </tr>
                    <tr>
                        <th style="" >Device Brand</th>
                        <td><span id="devicebrand"><?= $dataDevice['brand']; ?></span></td>

                    </tr>
                    
                    <tr>
                        <th style="" >Connectivity</th>
                        <td><span id="koneksi"></span><?= $dataDevice['tipekoneksi']; ?></td>

                    </tr>
                    
                    
                    <tr>
                        <th style="" >Device Location</th>
                        <td><span id="lokasi"></span><?= $dataDevice['latitude'].",".$dataDevice['longitude']; ?></td>

                    </tr>
                  
      
            
                </tbody>

          </table>
            
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>      </div>
    </div>
    </div>
    </div>  
</div>