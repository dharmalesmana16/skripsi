<div class="modal fade" id="device_detail" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Lamp</h5>
      
      </div>
      <div class="modal-body table-responsive">
          
          <table class="table table-hover table-white table-bordered">
                <tbody>
                    <tr>
                        <th style="" >Lamp ID</th>
                        <td><span id="Lampid"><?= $dataLamp['id']; ?></span></td>

                    </tr>
                    <tr>
                        <th style="" >Lamp Name</th>
                        <td><span id="Lampname"><?= $dataLamp['nama_lampu']; ?></span></td>

                    </tr>
         
                    <tr>
                        <th style="" >Lamp Brand</th>
                        <td><span id="Lampbrand"><?= $dataLamp['brand']; ?></span></td>

                    </tr>
                    
                    <tr>
                        <th style="" >Lamp Type</th>
                        <td><span id="koneksi"></span><?= $dataLamp['type']; ?></td>

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