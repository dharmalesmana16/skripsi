@extends('template.index')
@section('content')


<a href="{{ url('/control/new') }}" class="main-btn primary-btn btn-sm btn-hover rounded-md fw-bold mb-20">Create
    New Control + </a>

<!-- end col -->
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10" id="root">Controlling </h6>

            <p class="text-sm mb-20">
            </p>
            <div class="table-wrapper table-responsive">
                <table class="table users">
                    <thead>
                        <tr class="" style="">
                            <th scope="">NO</th>
                            <th scope="">NAME</th>
                            <th scope="">MODE</th>
                            <th scope="">STATE</th>
                            <th scope="">CONTROLLED BY</th>
                            <th scope="">STATUS</th>
                            <th scope="">ACTION</th>
                        </tr>


                    </thead>
                    <tbody>



                        <?php
                        // var_dump($controls);
                        $no = 1;
                        foreach ($controls as $dataControls) :

                            ?>
                        <tr>

                            <td scope="min-width">
                                {{ $no=+1 }}

                            </td>
                            <td scope="min-width">
                                {{ $dataControls->nama_lampu }}

                            </td>
                            <?php
                        if ($dataControls->state == "ON"){
                            $checked = "checked";
                        }
                        else {
                            $checked = "";
                        }

                        ?>
                            <td scope="min-width">
                                <div>

                                    {{ $dataControls->mode }}
                                    <div class="text-muted fs-6 fw-light">
                                        <p>Started At : {{ $dataControls->started_at }}</p>
                                        <p>Ended At : {{ $dataControls->ended_at }}  </p>
                                    </div>
                                </div>
                            </td>

                            <td scope="col">
                                <?= '<label class="switch"><input type="checkbox" data-toggle="toggle" data-size="md" data-onstyle="success"  data-offstyle="danger" onchange="executeAction(this)" port="'.$dataControls->port.'" name="'.$dataControls->port.'" id="' . $dataControls->nama_state . '" ' . $checked . '><span class="slider"></span></label><br>'?>
                            </td>
                            <?php

                        if($dataControls->mode == "AUTO"){
                            echo "<script>document.getElementById('{$dataControls->nama_state}').disabled = true;</script>";
                        }
                        ?>
                            <td scope="min-width">
                                <?= $dataControls->nama_device; ?>
                            </td>
                            <td scope="min-width">
                                <span class="status-btn fw-bold success-btn">Active</span>
                            </td>
                            <td scope="col">
                                <div class="d-flex">
                                    <div class="action">
                                        <button class="btn btn-md text-primary">
                                            <a href="/controls/timer/{{ $dataControls->id  }} ">
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
    function executeAction(element) {

        $(document).ready(function () {
            // var lampStatus= ("#lampStatus");
            var id = (element.id);
            var port = (element.name);
            if (element.checked) {
                $.ajax({
                    type: "get",
                    url: "/api/antares/action",
                    // data: '{"id":"'+id+'","mode":"MANUAL","state":"on"}',
                    data: {
                    mode:"MANUAL",
                     ports: port,
                     state: "ON",
                     id: id,

                    },
                    // data: '{"id":"' + id + '","mode":"MANUAL","state":"ON","port":"' + port + '"}',
                    dataType: "json",
                    success: function (response) {
                        console.log(response);

                    }
                });
            } else {
                $.ajax({
                    type: "get",
                    url: "/api/antares/action",
                    // data: '{"id":"'+id+'","mode":"MANUAL","state":"on"}',
                    data: {
                        mode:"MANUAL",
                     ports: port,
                     state: "OFF",
                     id: id,

                  },
                   dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
            }


        });
    }

</script>
@endsection
