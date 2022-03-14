@extends('layouts.app')

@section('title', 'Laporan')

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
    <h4 class="page-title-main">Laporan Bulanan</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
        <li class="breadcrumb-item active">Bulanan</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">

        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-3">Tetapan Laporan</h4>
                <form class="form-inline">
                    <div class="form-group">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                    </div>
                    <div class="form-group mx-md-3">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>
    
        <div class="col-12">
            <div class="card-box">
                <div class="row mb-2 mb-sm-3">
                    <div class="col-12 col-md-10">
                        <h4 class="header-title">Senarai Peracun Rosak</div></h4>
                    <div class="col-12 col-md-2">
                        <!-- <button type="button" class="btn btn-primary waves-light waves-effect float-right">Tambah Syarikat</button>
                        <button type="button" class="btn waves-effect waves-light btn-primary float-md-right ml-1"
                        onclick="window.location='{{ route("baru.syarikat") }}'">Daftar Baru</button> -->
                        <button type="button" class="btn waves-effect waves-light btn-primary float-md-right btn-excel"
                        >Excel</button>
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
                            <th>Bil</th>
                            <th>LRMP</th>
                            <th>Pendaftar</th>
                            <th>Nama Dagangan</th>
                            <th>Perawis Aktif (P.A.)</th>
                            <th>P.A. (%W/W)</th>
                            <th>Perumusan</th>
                            <!-- <th class="hidden-sm">Tetapan</th> -->
                        </tr>
                    </thead>
                </table>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end div -->
@component('components.modal_confirm', ['id'=>'id_syarikat'])
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
    var table = $('#datatable').DataTable({
        lengthChange: true,
        responsive: false,
        // scrollX: true,
        // dom: 'Bfrtip',
        buttons: [
            'excel',
        ]
        // language: {
        //     "paginate": {
        //         "previous": "<i class='mdi mdi-chevron-left'>",
        //         "next": "<i class='mdi mdi-chevron-right'>"
        //     }
        // },
        // "drawCallback": function () {
        //     $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        // }
    });

    $(".btn-excel").on("click", function() {
        table.button( '.buttons-excel' ).trigger();
    });

    // To get syarikat id
    $('.padam').on('click', function(){
        
        id = $(this).attr('id');
        id = id.split('_');

        $('.bs-example-modal-sm').modal('show');
        $('#padam_submit').attr('action','form/syarikat/delete/' + id[1]);

    });

    // Submit
    $('#teruskan').on('click', function(){
        $('#padam_submit').submit();
    });

});
</script>
@endsection