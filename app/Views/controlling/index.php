<?= $this->extend('template/index')    ?>


<?= $this->section('content') ;?>

<?php

?>
<div class="row">
	<div class="col-lg-12">
	<div class="card-style mb-30">
		<h6 class="mb-10" id="root" >Controlling by Device (Lamp Group)</h6>
	
		<p class="text-sm mb-20">
		</p>
		<div class="table-wrapper table-responsive">
		<table class="table users">
		<thead >
				<tr class="" style="">
					
					<th scope="" >NO</th>
					<th scope="">NAME</th>
					<th  scope="" >STATE</th>
				<th  	scope="" >LAMP CONTROLLED</th>
					<th  scope="" >STATUS</th>
					<th scope=""  >ACTION</th>
				</tr>
				

			</thead>
			<tbody>
			<?php
				$db = \Config\Database::connect();
				$querydata = $db->query("SELECT nama_device FROM datadevice");
				$query = $db->query("SELECT datadevice.id as deviceid,datadevice.nama_device,devicecontrol.port as port,.devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
				FROM devicecontrol INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id GROUP BY deviceid");
				$result = $query->getResultArray(); 
				// $result2 = $querydata->getResultArray(); 

			?>
	
				
	<?php foreach ($result as $dataControls) :
			// $dataRelay = [$dataControls['']]
			
				?>
			<tr>
			<td scope="min-width">
			<?= $dataControls['deviceid']; ?>
	
			</td>
			<td scope="min-width">
			<?= $dataControls['nama_device']; ?>

			</td>
			<?php
			if ($dataControls["state"] == "ON"){
				$checked = "checked";
			}
			else {
				$checked = "";
			}
			
			?>
			
			
			<td scope="col">
				<?= '<label class="switch"><input type="checkbox" data-toggle="toggle" data-size="md" data-onstyle="success"  data-offstyle="danger" onchange="executeAction(this)" port="'.$dataControls["port"].'" name="'.$dataControls["port"].'" id="' . $dataControls["datadevice_id"] . '" ' . $checked . '><span class="slider"></span></label><br>'?>
			</td>
			<?php
			
			if($dataControls["mode"] == "AUTO"){
				echo "<script>document.getElementById('{$dataControls['datadevice_id']}').disabled = true;</script>";
			} 
			?>
			<td scope="min-width">
			<?= $dataControls["nama_device"]; ?>
			</td>
			<td scope="min-width">
			<span  class="status-btn fw-bold success-btn">Active</span>
			</td>
			<td scope="col">
			<div class="d-flex">
				<div class="action">
					<button class="btn btn-md text-primary">
					<a href="/user/<?= $dataControls['deviceid'] ?>/edit" >
						<i class="fa fa-wrench"></i>
					</a>
					</button>
				
			</td>
		</tr>
		<?php endforeach ?>
			
		</tbody>
		</table>

		<!-- end table -->
		</div>
	</div>
	</div>
                <!-- end card -->
</div>	
              <!-- end col -->
<div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10" id="root" >Controlling Lamp </h6>
              
                  <p class="text-sm mb-20">
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table users">
                    <thead >
                            <tr class="" style="">
                                
                                <th scope="" >NO</th>
                                <th scope="">NAME</th>
                                <th scope=""  >MODE</th>
                                <th  scope="" >STATE</th>
                                <th  scope="" >CONTROLLED BY</th>
                                <th  scope="" >STATUS</th>
                                <th scope=""  >ACTION</th>
                            </tr>
                          

                        </thead>
                      <tbody>
                        <?php
                            $db = \Config\Database::connect();
                            $querydata = $db->query("SELECT nama_device FROM datadevice");
                            // $query = $db->query("SELECT datadevice.id,datadevice.nama_device,devicecontrol.port as port,.devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
                            // -- FROM devicecontrol INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id ");
                            $query = $db->query("SELECT datalampu.id,datalampu.nama_lampu,datadevice.nama_device,devicecontrol.port as port , devicecontrol.mode as mode,devicecontrol.state,devicecontrol.nama_state,devicecontrol.id as datadevice_id
                            FROM ((devicecontrol INNER JOIN datalampu ON devicecontrol.datalampu_id = datalampu.id) INNER JOIN datadevice ON devicecontrol.datadevice_id = datadevice.id) ");
                 
                 
                        $result = $query->getResultArray(); 
                 $result2 = $querydata->getResultArray(); 
   
                      ?>
                
                            
                <?php foreach ($result as $dataControls) :
                        // $dataRelay = [$dataControls['']]
                        
                            ?>
                        <tr>
                        <td scope="min-width">
                        <?= $dataControls['datadevice_id']; ?>
                
                        </td>
                        <td scope="min-width">
                        <?= $dataControls['nama_lampu']; ?>

                        </td>
                        <?php
                        if ($dataControls["state"] == "ON"){
                            $checked = "checked";
                        }
                        else {
                            $checked = "";
                        }
                        
                        ?>
                        <td scope="min-width">
                        <div >

                            <?= $dataControls["mode"]; ?>
                            <div class="text-muted fs-6 fw-light">
                                 <p>Started At : 18.00</p> 
                                 <p>Ended At : 18.00</p> 
                            </div>
                        </div>
                        </td>
                        
                        <td scope="col">
                            <?= '<label class="switch"><input type="checkbox" data-toggle="toggle" data-size="md" data-onstyle="success"  data-offstyle="danger" onchange="executeAction(this)" port="'.$dataControls["port"].'" name="'.$dataControls["port"].'" id="' . $dataControls["datadevice_id"] . '" ' . $checked . '><span class="slider"></span></label><br>'?>
                        </td>
                        <?php
                        
                        if($dataControls["mode"] == "AUTO"){
                            echo "<script>document.getElementById('{$dataControls['datadevice_id']}').disabled = true;</script>";
                        } 
                        ?>
                      <td scope="min-width">
                        <?= $dataControls["nama_device"]; ?>
                        </td>
                      <td scope="min-width">
                      <span  class="status-btn fw-bold success-btn">Active</span>
                        </td>
                        <td scope="col">
                        <div class="d-flex">
                            <div class="action">
                                <button class="btn btn-md text-primary">
                                <a href="/user/<?= $dataControls['id'] ?>/edit" >
                                    <i class="fa fa-wrench"></i>
                                </a>
                                </button>
                           
                        </td>
                    </tr>
                    <?php endforeach ?>
                        
                    </tbody>
                    </table>

                    <!-- end table -->
                  </div>
                  </div>
                </div>
                <!-- end card -->
              </div>



<script>
  function executeAction(element){

        $(document).ready(function () {
          // var lampStatus= ("#lampStatus");
          var id = (element.id);
          var port = (element.name);
          if(element.checked){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('/api/storedata');?>",
              // data: '{"id":"'+id+'","mode":"MANUAL","state":"on"}',
              data: '{"id":"'+id+'","mode":"MANUAL","state":"ON","port":"'+port+'"}',
              dataType: "json",
              success: function (response) {
                // console.log(response);

              }
            });
          }else{
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('/api/storedata');?>",
              // data: '{"id":"'+id+'","mode":"MANUAL","state":"on"}',
              data: '{"id":"'+id+'","mode":"MANUAL","state":"OFF","port":"'+port+'"}',
              dataType: "json",
              success: function (response) {
                // console.log(response);
              }
            });
          }
          
       
        });
  }
</script>
<?= $this->endSection() ;?>