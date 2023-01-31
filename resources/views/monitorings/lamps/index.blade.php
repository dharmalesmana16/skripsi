@extends('template.index')
{{-- @push('moreAssets')

@endpush --}}
@section('content')

<div class="row">
    <!-- Bagian KWH -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon orange">
                <i class="fa-solid fa-lightbulb"></i>    </div>
            <div class="content">
            <h6 class="mb-10">Light Intesity</h6>
                <div class=" mb-0 fw-bold text-gray-800" id="lightValue">0</div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
            <i class="fa-solid fa-bolt-lightning"></i>
            </div>
            <div class="content">
            <h6 class="mb-10">Voltage</h6>
                <div class=" mb-0 fw-bold text-gray-800" id="voltageValue">0</div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
            <i class="fa-solid fa-bolt-lightning"></i>
            </div>
            <div class="content">
            <h6 class="mb-10">Power</h6>
                <div class=" mb-0 fw-bold text-gray-800" id="powerValue">0</div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
            <i class="fa-solid fa-bolt-lightning"></i>
            </div>
            <div class="content">
            <h6 class="mb-10">Current</h6>
                <div class=" mb-0 fw-bold text-gray-800" id="currentValue">0</div>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->

</div>


<div class="row">
    <div class="col-lg-12 col-xl-12 col-sm-12">
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
                    <div id="chartMonitoringLamps"></div>

                </figure>
            </div>
            <!-- End Chart -->
        </div>
    </div>

</div>
@endsection

