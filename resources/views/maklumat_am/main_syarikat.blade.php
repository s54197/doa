@extends('layouts.app')

@section('title', 'Syarikat')

@section('local_css')
<style>
    .tilebox-one i{
        font-size: 3.5rem !important;
        line-height: 3rem
    }
</style>
@endsection

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Syarikat</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Syarikat</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="mdi mdi-chart-pie float-right text-primary"></i>
            <h6 class="text-muted text-uppercase mt-0">Jumlah Rekod</h6>
            <h2 class="mb-1" data-plugin="counterup">100</h2>
            {{-- <span class="badge badge-primary"> +11% </span> <span class="text-muted">From previous period</span> --}}
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="mdi mdi-battery-charging-100 float-right text-primary mt-0"></i>
            <h6 class="text-muted text-uppercase mt-0">Aktif</h6>
            <h2 class="mb-1"><span data-plugin="counterup">90</span></h2>
            {{-- <span class="badge badge-danger"> -29% </span> <span class="text-muted">From previous period</span> --}}
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="mdi mdi-battery-charging-10 float-right text-primary"></i>
            <h6 class="text-muted text-uppercase mt-0">Tidak Aktif</h6>
            <h2 class="mb-1"><span data-plugin="counterup">10</span></h2>
            {{-- <span class="badge badge-primary"> 0% </span> <span class="text-muted">From previous period</span> --}}
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class=" mdi mdi-chart-arc float-right text-primary"></i>
            <h6 class="text-muted text-uppercase mt-0">Rekod Ogos 2021</h6>
            <h2 class="mb-1" data-plugin="counterup">5</h2>
            {{-- <span class="badge badge-primary"> +89% </span> <span class="text-muted">Last year</span> --}}
        </div>
    </div>
</div>
<!-- end row -->
@endsection