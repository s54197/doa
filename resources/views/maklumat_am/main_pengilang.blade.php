@extends('layouts.app')

@section('title', 'Pengilang')

@section('local_css')
<style>
    .tilebox-one i{
        font-size: 3.7rem !important;
        line-height: 3.5rem
    }
</style>
@endsection

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Pengilang</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Pengilang</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="mdi mdi-chart-pie float-right text-primary"></i>
                <h6 class="text-muted text-uppercase mt-0">Jumlah Rekod</h6>
                <h2 class="mb-1" data-plugin="counterup">{{$totalpengilang}}</h2>
                {{-- <span class="badge badge-primary"> +11% </span> <span class="text-muted">From previous period</span> --}}
            </div>
        </div>
    
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="mdi mdi-battery-charging-100 float-right text-primary mt-0"></i>
                <h6 class="text-muted text-uppercase mt-0">Aktif</h6>
                <h2 class="mb-1"><span data-plugin="counterup">{{$totalpengilangaktif}}</span></h2>
                {{-- <span class="badge badge-danger"> -29% </span> <span class="text-muted">From previous period</span> --}}
            </div>
        </div>
    
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="mdi mdi-battery-charging-10 float-right text-primary"></i>
                <h6 class="text-muted text-uppercase mt-0">Tidak Aktif</h6>
                <h2 class="mb-1"><span data-plugin="counterup">{{$totalpengilangtidakaktif}}</span></h2>
                {{-- <span class="badge badge-primary"> 0% </span> <span class="text-muted">From previous period</span> --}}
            </div>
        </div>
    
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class=" mdi mdi-chart-arc float-right text-primary"></i>
                <h6 class="text-muted text-uppercase mt-0">Rekod {{$bulan}} 2021</h6>
                <h2 class="mb-1" data-plugin="counterup">{{$totalpengilangbulanterkini}}</h2>
                {{-- <span class="badge badge-primary"> +89% </span> <span class="text-muted">Last year</span> --}}
            </div>
        </div>
    
        <div class="col-12">
            <div class="card-box">
                <div class="row mb-2 mb-sm-3">
                    <div class="col-12 col-md-10">
                        <h4 class="header-title">Senarai Pengilang</div></h4>
                    <div class="col-12 col-md-2">
                        {{-- <button type="button" class="btn btn-primary waves-light waves-effect float-right">Tambah Pengilang</button> --}}
                        <button type="button" class="btn waves-effect waves-light btn-primary float-md-right"
                        onclick="window.location='{{ route("baru.pengilang") }}'">Daftar Baru</button>
                    </div>
                </div>

                @if( Session::has( 'success' ))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get( 'success' ) }}
                </div>

                @elseif( Session::has( 'warning' ))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get( 'warning' ) }}
                </div>
                @endif
                
                <table class="table table-bordered m-0 table-centered tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                    <thead>
                        <tr>
                            <th>Nama Pengilang</th>
                            <th>ROC</th>
                            <th>Telefon</th>
                            <th>Negeri</th>
                            <th>Status</th>
                            <th class="hidden-sm">Tetapan</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach($pengilangs as $pengilang)
                        <tr>
                            <td>{{$pengilang->pengilang_nama}}</td>
                            <td>{{$pengilang->pengilang_no_roc}}</td>
                            <td>{{$pengilang->pengilang_no_tel}}</td>
                            <td>{{$pengilang->pengilang_negeri}}</td>
                            <td>{{$pengilang->pengilang_status}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('papar.pengilang', $pengilang->id) }}"><i class="mdi mdi-file-document-box-search-outline mr-2 text-muted font-18 vertical-middle"></i>Papar</a>
                                        <a class="dropdown-item" href="{{ route('kemaskini.pengilang', $pengilang->id) }}"><i class="mdi mdi-file-document-box-plus-outline mr-2 text-muted font-18 vertical-middle"></i>Kemaskini</a>
                                        <a class="dropdown-item padam" href="#" id="padam_{{ $pengilang->id }}" ><i class="mdi mdi-file-document-box-remove-outline mr-2 text-muted font-18 vertical-middle"></i>Padam</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end div -->
@component('components.modal_confirm', ['id'=>'id_pengilang'])
Adakah anda bersetuju untuk memadam data?
@endcomponent

<form id="padam_submit" method='post'>
    @csrf
    @method('delete')
</form>
@endsection
@section('local_js')
<script>
$(document).ready(function () {
    $('#datatable').DataTable({
        "responsive": false,
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        // "drawCallback": function () {
        //     $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        // }
    });

    // To get pengilang id
    $('.padam').on('click', function(){
        
        id = $(this).attr('id');
        id = id.split('_');

        $('.bs-example-modal-sm').modal('show');
        $('#padam_submit').attr('action','pengilang/delete/' + id[1]);

    });

    // Submit
    $('#teruskan').on('click', function(){
        $('#padam_submit').submit();
    });

});
</script>
@endsection