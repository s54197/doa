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
                <div class="card-box text-center pt-1">
                    <!-- <h4 class="header-title">Jumlah Daftar Permohonan Baru dan Semula Bulanan / Tahunan</h4> -->

                    <!-- <div class="google-chart text-center"> -->
                    <div class="chart mt-4" id="chart_div"></div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Pie Chart</h4>

                    <div class="google-chart text-center">
                        <div class="chart mt-4" id="pie-chart"></div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

    // stacked bar graph - pendaftaran semula / baru
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bulan', 'Semula', 'Baru'],
          ['Jan', 1000, 400],
          ['Feb', 1170, 460],
          ['Mac', 660, 1120],
          ['Apr', 660, 1120],
          ['Mei', 660, 1120],
          ['Jun', 660, 1120],
          ['Jul', 660, 1120],
          ['Ogos', 660, 1120],
          ['Sep', 1030, 540],
          ['Oct', 1030, 540],
          ['Nov', 1030, 540],
          ['Dec', 1030, 540],
        ]);

        var options = {
          chart: {
            title: 'Jumlah Daftar Permohonan Baru dan Semula 2022',
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2d7bf4','#4eb7eb','#02c0ce', '#e3eaef', '#32c861']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

    }


    // Load the Visualization API and the corechart package.
    //   google.charts.load('current', {'packages':['corechart']});

    //   // Set a callback to run when the Google Visualization API is loaded.
    //   google.charts.setOnLoadCallback(drawChart);

    //   // Callback that creates and populates a data table,
    //   // instantiates the pie chart, passes in the data and
    //   // draws it.
    //   function drawChart() {

    //     // Create the data table.
    //     var data = new google.visualization.DataTable();
    //     data.addColumn('string', 'Topping');
    //     data.addColumn('number', 'Slices');
    //     data.addRows([
    //       ['Mushrooms', 3],
    //       ['Onions', 1],
    //       ['Olives', 1],
    //       ['Zucchini', 1],
    //       ['Pepperoni', 2]
    //     ]);

    //     // Set chart options
    //     // var options = {
    //     //     // 'title':'How Much Pizza I Ate Last Night',
    //     //     // 'width':'100%',
    //     //     // 'height':'100%',
    //     //     // legend.position:'left',
    //     //     is3D: true,
    //     // };

    //     var options = {
    //         fontName: 'Roboto',
    //         fontSize: 13,
    //         height: 300,
    //         chartArea: {
    //             left: 50,
    //             width: '90%',
    //             height: '90%'
    //         },
    //         // colors: colors
    //     };

    //     // Instantiate and draw our chart, passing in some options.
    //     var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
    //     chart.draw(data, options);
    //   }
</script>
@endsection
