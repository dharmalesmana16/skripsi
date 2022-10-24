<div class="modal fade" id="device_create" tabindex="-1"  aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Lamp</h5>
      
      </div>
      <div class="modal-body table-responsive">
          
            <form action="" method="post">

        <div class="row mb-3">
                <label for="mac" class="col-sm-2 col-form-label" >Name of Lamp</label>
                <div class="col-sm-10">
                    <input type="text" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  required />
                </div>
            </div>
        <div class="row mb-3">
                <label for="mac" class="col-sm-2 col-form-label" >Lamp Brand</label>
                <div class="col-sm-10">
                    <input type="text" id="mac" name="mac" class="form-control" placeholder="Enter your Device Mac Address"  required />
                </div>
            </div>
            <div class="row mb-3">
		<label for="device_connectivity" class="col-sm-2 col-form-label" >Lamp Type</label>
		<div class="col-sm-10">
			<select name="device_connectivity" id="device_connectivity" class="form-control" aria-label="Default select example" >
        <option selected value="-">-</option>
				<option value="LED">LED</option>
				<option value="NON LED">NON LED</option>
				<!-- <option value="RASPBERRY PI">RASPBERRY PI</option> -->
			</select>
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