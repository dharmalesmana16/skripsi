<?php
$this->extend('template/index');
$this->section('content');

?>

<div class="row">
    <div class="col-lg-12 col-md-12 ">
        <div class="card shadow mb-4">
        <!-- Card Header (Judul) -->
		
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data
            </div>
		
        <!-- Card Body -->
            <div class="card-body">
				<form id="search" action="/api/alldata" method="post" class="search" >
					<?php csrf_field() ?>
					<div class="d-flex flex-row bd-highlight mb-3">
					<div class="p-2 bd-highlight">
						<select class="form-select" name="lokasidata" id="monitoring" style="cursor:pointer">
							<option value="-" selected>-</option>
							<?php foreach ($datadevice as $datadevices) : ?>
								<option value="data_ngurahrai"><?= $datadevices['nama_device']; ?></option>
								<?php endforeach ?>
						</select>
					</div>
					<div class="p-2 bd-highlight">
						<input type="text" name="tanggal" class="tanggalAwal form-control"  required/>
					</div>
					<div class="p-2 bd-highlight">
						<input type="text" name="tanggal2" class="tanggalAkhir form-control" n required/>
					</div>
					<div class="p-2 bd-highlight">
						<button type="submit" id="buttonsearch" class="btn btn-md btn-primary rounded"><i class="fa-solid fa-magnifying-glass"></i> Search</button>							
					</div>
				
				</div>
					</form>
				
                <div class="table-responsive bg-white">  
                    <table id="table-report" class="table table-hover table-striped table-bordered devices">
                        <thead >
                            <tr class="" >
                                <th scope="col">NO</th>
                                <th scope="col">ENERGY</th>
                                <th scope="col">VOLTAGE</th>
                                <th scope="col">CURRENT</th>
                                <th scope="col">POWER (IN WATT)</th>
                                <th scope="col">PANEL TEMPERATURE</th>
                                <th scope="col">PANEL HUMIDITY</th>
                                <th scope="col">TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_target">
                        
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	
	$(document).ready(function () {
		$(".search").submit(function (e) { 
			e.preventDefault();
			var form = $(this);
			var serializedData = form.serialize();
				$.ajax({
				type: "post",
				url: "<?= base_url('/api/alldata') ?>",
				data: serializedData,
				dataType: "json",
				beforeSend: function(){
					$('#buttonsearch').attr('disable','disabled');
            		$('#buttonsearch').html('<i class="fa fa-spin fa-spinner"></i>');
				},
				complete: function(){
					$('#buttonsearch').removeAttr('disable');
					$('#buttonsearch').html('<i class="fa-solid fa-magnifying-glass"></i> Search');
				},
				success: function (response) {
					var teks = "";

					$.each(response, function (index, val) { //looping table detail bahan
						var no = index + 1
						var kecepatan = val.kecepatan;
						var arah = val.arah;
						var suhu = val.suhu;
						var kelembaban = val.kelembaban;
						var tanggal = val.created_at;
						teks += "<tr class='tr_detail'><th>" + no +
								"</th><td>" + kecepatan +
								"</td><td>" + arah +
								"</td><td>" + suhu +
								"</td><td>" + kelembaban +
								"</td><td>" + tanggal +
								"</td></tr>";
					});
					$(".tbody_target").html(teks);
				}
			});
		});
	});
</script>
<script>
	 document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('.devices');
            });
	$(document).ready(function () {
	//  const buttonData = document.getElementById('monitoring');
	//  buttonData.addEventListener('change',selectData);

    function showdatangurahrai(){
		$.ajax({
				type: "GET",
				url: "<?= base_url('/api/datangurahrai')?>",
				data: {},
				dataType: 'json',
				success: function (response) {
					console.log(response);
					var teks = "";
					var no =0;
					
					<?php $no = 0; ?>
					$.each(response, function (index, val) { //looping table detail bahan
						var no = index + 1
						var kecepatan = val.kecepatan;
						var arah = val.arah;
						var suhu = val.suhu;
						var kelembaban = val.kelembaban;
						var tanggal = val.created_at;
						teks += "<tr class='tr_detail'><th>" + no +
								"</th><td>" + kecepatan +
								"</td><td>" + arah +
								"</td><td>" + suhu +
								"</td><td>" + kelembaban +
								"</td><td>" + tanggal +
								"</td></tr>";
					});
					$(".tbody_target").html(teks);
					}
				});
			}
			function showdatanusadua(){
		$.ajax({
				type: "GET",
				url: "<?= base_url('/api/datanusadua')?>",
				data: {},
				dataType: 'json',
				success: function (response) {
					console.log(response);
					var teks = "";
					var no =0;
					<?php $no = 0; ?>
					$.each(response, function (index, val) { //looping table detail bahan
						var no = index + 1
						var kecepatan = val.kecepatan;
						var arah = val.arah;
						var suhu = val.suhu;
						var kelembaban = val.kelembaban;
						var tanggal = val.created_at;
						teks += "<tr class='tr_detail'><th>" + no +
								"</th><td>" + kecepatan +
								"</td><td>" + arah +
								"</td><td>" + suhu +
								"</td><td>" + kelembaban +
								"</td><td>" + tanggal +
								"</td></tr>";
					});

					$(".tbody_target").html(teks);
					}
				});
			}
			function removedata(){
				$(".tr_detail tr").remove();
			}
			function selectData(){
				var teks = "";
				if(buttonData.value == "datangurahrai"){
					showdatangurahrai();
				}else if(buttonData.value == "datanusadua"){
					showdatanusadua();
				}else{
					teks += "<tr><td>" + "-" +
								"</td>"+
								"</tr>";	
								$(".tbody_target").html(teks)
								;
			}
			}
			// console.log(buttonData.value);
 
      	});
</script>

<script>
  const tanggal_mulai = {
    
    enableTime: true,
    time_24hr:true,
    dateFormat: "Y-m-d H:i"
  };

  flatpickr('.tanggalAwal',tanggal_mulai);
  const tanggal_akhir = {
    
    enableTime: true,
    time_24hr:true,
    dateFormat: "Y-m-d H:i"
  };

  flatpickr('.tanggalAkhir',tanggal_akhir);
  // flatpickr('.tanggalAwal',tanggal_mulai);
</script>
<?php 
$this->endSection();
?>