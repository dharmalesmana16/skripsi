<div class="modal fade" id="device_detail" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Device</h5>
      
      </div>
      <div class="modal-body table-responsive">
          
          <div class="card h-100">
            <div class="card-header">
                <div class="font-weight-bold display-6"><?= $pageheader; ?></div>
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
                    <button type="submit" class="btn btn-primary btncreate">Tambah Data</button>
                </div>


            </div>
            </div>
            </div>
            <!-- End Button Data -->    
            </form>
            
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>      </div>
    </div>
    </div>
    </div>  
</div>