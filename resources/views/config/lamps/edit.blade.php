<div class="modal fade" id="device_edit" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Lamp</h5>

      </div>
      <div class="modal-body table-responsive">

            <form action="" method="post">

        <div class="row mb-3">
                <label for="mac" class="col-sm-2 col-form-label" >Mac Address</label>
                <div class="col-sm-10">
                    <input type="text" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  value="<?= $dataLamp['nama_lampu'] ?>" required />
                </div>
            </div>
        <div class="row mb-3">
                <label for="mac" class="col-sm-2 col-form-label" >Mac Address</label>
                <div class="col-sm-10">
                    <input type="text" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  value="<?= $dataLamp['brand'] ?>" required />
                    </div>
            </div>
        <div class="row mb-3">
                <label for="mac" class="col-sm-2 col-form-label" >Mac Address</label>
                <div class="col-sm-10">
                    <input type="text" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  value="<?= $dataLamp['type'] ?>" required />
                </div>
            </div>



            </form>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>      </div>
    </div>
    </div>
    </div>
</div>
