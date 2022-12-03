<?= $this->extend('template/index') ;?>

<?= $this->section('content') ;?>

<?php
$dataPort = ["PORT1", "PORT2", "PORT3", "PORT4"];
$dataPorts=[];
$no =0;
foreach($dataControl as $resControl){
    $dataControlPort[] = $resControl["port"];

}
$dataPorts[] = array_diff($dataPort, $dataControlPort);


// var_dump($dataPorts);
// if($dataControlPort )
?>
<div class="card-style mb-30">
    <form action="" method="post">
        <div class="input-style-1">
        <label>Name of State</label>
            <input type="text" name="nama_state" placeholder="Enter your Name of State (Ex : RELAY002 or Anything you want )" />
        </div>
        <!-- end input -->
        <div class="select-style-1">
            <label>PORT</label>
            <div class="select-position">
                <select name="port">
                        <option value="PORT1">PORT1</option>
                        <option value="PORT2">PORT2</option>
                        <option value="PORT3">PORT3</option>
                        <option value="PORT4">PORT4</option>
                </select>
            </div>
        </div>
        <div class="select-style-1">
        <label>Controlled Device</label>
            <div class="select-position">
                <select name="idDevice">
                    <?php foreach ($dataDevice as $resDevice): ?>
                        <option value="<?= $resDevice["id"] ?>"><?= $resDevice["nama_device"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <!-- end input -->
        <div class="select-style-1">
            <label>Controlled Lamp</label>
            <div class="select-position">
                <select>
                    <?php foreach ($dataLamp as $resLamp): ?>
                        <option value="<?= $resLamp["id"] ?>"><?= $resLamp["nama_lampu"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="text-end">

            <button type="submit" class="main-btn primary-btn rounded-md btn-hover">Create New Data</button>
        </div>
        <!-- end input -->
    </form>
</div>
<?= $this->endSection() ;?>