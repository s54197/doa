@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Dashboard</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <!-- <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li> -->
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</li>
@endsection

@section('local_css')

@endsection

@section('contents')
<div class="content">
                      
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Pie Chart</h4>

                    <div class="google-chart text-center">
                        <div class="chart mt-4" id="pie-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Donut Chart</h4>

                    <div class="google-chart text-center">
                        <div class="chart mt-4" id="donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->


</div>
@endsection

@section('local_js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('pie-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
</script>
@endsection
