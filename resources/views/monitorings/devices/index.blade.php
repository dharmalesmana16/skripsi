@extends('template.index')
@section('content')

<div class="row">
    <!-- Bagian KWH -->

    <!-- End Col -->
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="fa-sharp fa-solid fa-toggle-on"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Controlled Lamp</h6>
                <div class="h4 fw-bold text-gray-800 "><span class="text-sm" id="controlledLamp"> </span></div>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Col -->
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon orange">
                <i class="fa-solid fa-temperature-half"></i> </div>
            <div class="content">
                <h6 class="mb-10">Device Temperature</h6>
                <div class=" mb-0 fw-bold text-gray-800" id="temp_">Temp : <span class="" id="temp"
                        class=" mb-0 fw-bold text-gray-800">-</span></div>
                <div class="mb-0 fw-bold text-gray-800" id="humi_">Humidity : <span class="" id="humi"
                        class=" mb-0 fw-bold text-gray-800">-</span></div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon green">
                <i class="fa-solid fa-wifi"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Device Status</h6>
                <div class=" mb-0 fw-bold text-gray-800">Status : <span class="text-sm" id="statusDevice"> </span>
                </div>
                <div class=" mb-0 fw-bold text-gray-800">Packet Time :<span class="text-sm" id="packetTime"> </span></div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10">Data</h6>

            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>No</h6>
                            </th>
                            <th>
                                <h6>Name</h6>
                            </th>
                            <th>
                                <h6>Brand</h6>
                            </th>
                            <th>
                                <h6>Type</h6>
                            </th>
                            <th>
                                <h6>Mode</h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>


                        <?php
                $no = 1;
              foreach($lamps as $dataLamps):
              ?>
                        <tr>
                            <td class="min-width">
                                <p><?= $no++ ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->nama_lampu; ?></p>
                            </td>

                            <td class="min-width">
                                <p><?= $dataLamps->mode; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->started_at; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->ended_at; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?= $dataLamps->status; ?></p>
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
<div class="row">
    <div class="col-lg-6 col-xl-6 col-sm-6">
        <div class="card-style mb-30">
            <div class="title d-flex flex-wrap justify-content-between">
                <div class="left">
                    <h6 class="text-medium mb-10">Power Consumption</h6>
                </div>
                <div class="right">
                    <div class="select-style-1">
                        <div class="select-position select-sm">
                            <select class="light-bg">
                                <option value="">LAMP001</option>
                                <option value="">LAMP002</option>
                                <option value="">LAMP003</option>
                            </select>
                        </div>
                    </div>
                    <!-- end select -->
                </div>
            </div>
            <!-- End Title -->
            <div class="chart">
                <figure class="highcharts-figure">
                    <div id="chartEnergyMenuMonitoringDevice"></div>

                </figure>
            </div>
            <!-- End Chart -->
        </div>
    </div>
    <!-- End Col -->
    <div class="col-lg-6 col-xl-6 col-sm-6">
        <div class="card-style mb-30">
            <div class="
                        title
                        d-flex
                        flex-wrap
                        align-items-center
                        justify-content-between
                      ">
                <div class="left">
                    <h6 class="text-medium mb-30">Device Temperature & Humidity Statistic</h6>
                </div>
                <div class="right">
                    <div class="select-style-1">
                        <div class="select-position select-sm">
                            <select class="light-bg">
                                <option value="weekly">Weekly</option>
                            </select>
                        </div>
                    </div>
                    <!-- end select -->
                </div>
            </div>
            <!-- End Title -->
            <div class="chart">
                <figure class="highcharts-figure">
                    <div id="chartTempMenuMonitoringDevice"></div>

                </figure>
            </div>
            <!-- End Chart -->
        </div>
    </div>
    <!-- End Col -->
</div>

@endsection
