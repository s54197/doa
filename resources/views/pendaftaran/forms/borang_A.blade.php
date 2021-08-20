@extends('layouts.app')

@section('title', 'Pendaftaran')

@section('local_css')
<style>
    .wizard > .content > .body input.custom_border {
        border: 1px solid #e3eaef;
    }
    .wizard > .content > .body input:active {
        border: 1px solid #e3eaef;
    }
</style>
@endsection

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Pendaftaran</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        {{-- <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li> --}}
        <li class="breadcrumb-item active">Pendaftaran</li>
    </ol>
</li>
@endsection

@section('contents')
<!-- Start Content-->
<div class="container-fluid">

    <!-- Vertical Steps Example -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title mb-3">Borang A</h4>
                {{-- <p class="sub-header">
                    Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.
                </p> --}}

                <form method="post" id="wizard-vertical">
                    @csrf
                    <h3>Butiran Pemohon</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_syarikat"><span class="text-danger">*</span>Syarikat Pendaftar:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="pemohon_syarikat">
                                    <option value="">Pilih Syarikat...</option>
                                    <option value="Johor" {{ old('pemohon_syarikat') == "Johor" ? 'selected' : '' }}>Johor</option>
                                </select>    
                                @error('pemohon_syarikat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_agen"><span class="text-danger">*</span>Wakil/Agen:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="pemohon_agen">
                                    <option value="">Pilih Agen/Wakil...</option>
                                    {{-- <option value="Johor" {{ old('pemohon_agen') == "Johor" ? 'selected' : '' }}>Johor</option> --}}
                                </select>    
                                @error('pemohon_agen') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_tarikh_terima_kaunter"><span class="text-danger">*</span>Tarikh Terima Kaunter:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="pemohon_tarikh_terima_kaunter" type="text" name="pemohon_tarikh_terima_kaunter" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('pemohon_tarikh_terima_kaunter') }}">
                                @error('pemohon_tarikh_terima_kaunter') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_tarikh_lulus"><span class="text-danger">*</span>Tarikh Lulus:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="pemohon_tarikh_lulus" type="text" name="pemohon_tarikh_lulus" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('pemohon_tarikh_lulus') }}">
                                @error('pemohon_tarikh_lulus') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_tarikh_tamat"><span class="text-danger">*</span>Tarikh Tamat:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="pemohon_tarikh_tamat" type="text" name="pemohon_tarikh_tamat" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('pemohon_tarikh_tamat') }}">
                                @error('pemohon_tarikh_tamat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_wakil_syarikat"><span class="text-danger">*</span>Wakil Syarikat:</label>
                            <div class="col-md-9">
                                <input type="text" id="pemohon_wakil_syarikat" name="pemohon_wakil_syarikat" class="form-control custom_border" placeholder="Nama wakil" value="{{ old('pemohon_wakil_syarikat') }}">
                                @error('pemohon_wakil_syarikat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Keluaran</h3>
                    <section>
                    </section>
                    <h3>Butiran Aktiviti Perniagaan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_aktiviti"><span class="text-danger">*</span>Nyatakan aktiviti utama perniagaan:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="perniagaan_aktiviti">
                                    <option value="">Pilih Agen/Wakil...</option>
                                    {{-- <option value="Johor" {{ old('perniagaan_aktiviti') == "Johor" ? 'selected' : '' }}>Johor</option> --}}
                                </select>    
                                @error('perniagaan_aktiviti') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_pengilang"><span class="text-danger">*</span>Pengilang:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="perniagaan_pengilang" id="perniagaan_pengilang" multiple="multiple">
                                    {{-- <optgroup label="Alaskan/Hawaiian Time Zone"></optgroup> --}}
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>  
                                @error('perniagaan_pengilang') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>

                        {{-- <select class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="">
                            <optgroup label="Alaskan/Hawaiian Time Zone"></optgroup>
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                        </select> --}}

                    </section>
                    <h3>Butiran Perawis Aktif, Lengai, Kandungan & Rumusan</h3>
                    <section>
                    </section>
                </form>
                <!-- End #wizard-vertical -->
            </div>
        </div>
    </div><!-- End row -->

</div> <!-- end container-fluid -->
@endsection


@section('local_js')
<script>
$(document).ready(function(){
    $('input[name="pemohon_tarikh_terima_kaunter"]').datepicker();
    $('input[name="pemohon_tarikh_terima_kaunter"]').attr("placeholder","Tarikh Terima Kaunter - Pilih dari kalendar");
    $('input[name="pemohon_tarikh_lulus"]').datepicker();
    $('input[name="pemohon_tarikh_lulus"]').attr("placeholder","Tarikh Lulus - Pilih dari kalendar");
    $('input[name="pemohon_tarikh_tamat"]').datepicker();
    $('input[name="pemohon_tarikh_tamat"]').attr("placeholder","Tarikh Tamat - Pilih dari kalendar");
    $('.select2').select2({
        width:"100%",
        maximumSelectionLength: 4,
        // placeholder: "Pilih Pengilang (maksimum 4)",
    });
});
</script>
@endsection