
<div class="row">
  <div class="col-lg-12">
    <div class="card-style mb-30">
      <h6 class="mb-10">Data</h6>
     
      <div class="table-wrapper table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><h6>No</h6></th>
              <th><h6>Name</h6></th>
              <th><h6>Brand</h6></th>
              <th><h6>Type</h6></th>
              <th><h6>Mode</h6></th>
              <th><h6>Status</h6></th>
              <th><h6>Action</h6></th>
            </tr>
            <!-- end table row-->
          </thead>
          <tbody>
            
          
            <?php 
              $no = 1;
            foreach($dataLamp as $dataLamps):
            ?>
            <tr>
              <td class="min-width">
                <p><?= $no++ ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['nama_lampu']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['brand']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['type']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['mode']; ?></p>
              </td>
              <td class="min-width">
                <p><?= $dataLamps['status']; ?></p>
              </td>
            
              <td>
                <div class="action">
                  <button class="text-danger">
                    <i class="lni lni-trash-can"></i>
                  </button>
                </div>
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