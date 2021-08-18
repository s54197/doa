@extends('layouts.app-new')

@section('title', 'Info Kilang')

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
    <div class="col-12">
        <div class="card-box px-4">
            <h4 class="header-title">Pendaftaran Syarikat</h4>
            <hr class="mb-3">
            {{-- <p class="sub-header">
                Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
            </p> --}}

            <div class="row">
                <div class="col-12">
                    <div>
                        <form class="form-horizontal" role="form">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_nama"><span class="text-danger">*</span>Nama syarikat:</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_nama" name="syarikat_nama" class="form-control" value="Nama Syarikat">
                                    <small class="text-danger" id="syarikat_nama_error" name="syarikat_nama_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_no_roc" name="syarikat_no_roc" class="form-control" value="Nombor Pendaftaran (ROC)">
                                    <small class="text-danger" id="syarikat_no_roc_error" name="syarikat_no_roc_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_tarikh_roc"><span class="text-danger">*</span>Tarikh pendaftaran (ROC)</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="syarikat_tarikh_roc" type="text" name="syarikat_tarikh_roc" data-date-orientation="bottom" data-date-format="dd-mm-yyyy">
                                    <small class="text-danger" id="syarikat_tarikh_roc_error" name="syarikat_tarikh_roc_error"></small>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-3 col-form-label" for="syarikat_alamat"><span class="text-danger">*</span>Alamat syarikat:</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_bangunan" name="syarikat_bangunan" class="form-control" value="Bangunan">
                                    <input type="text" id="syarikat_jalan" name="syarikat_jalan" class="form-control mt-2" value="Jalan">
                                    <small class="text-danger" id="syarikat_bangunan_error" name="syarikat_bangunan_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_alamat_tambahan"></label>
                                <div class="col-md-2">
                                    <input type="text" id="syarikat_poskod" name="syarikat_poskod" class="form-control" value="Poskod">
                                    <small class="text-danger" id="syarikat_poskod_error" name="syarikat_poskod_error"></small>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="syarikat_bandar" name="syarikat_bandar" class="form-control" value="Bandar">
                                    <small class="text-danger" id="syarikat_bandar_error" name="syarikat_bandar_error"></small>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="syarikat_negeri">
                                        <option value="">Pilih Negeri...</option>
                                        <option value="Johor" {{ old('syarikat_negeri') == "Johor" ? 'selected' : '' }}>Johor</option>
                                        <option value="Melaka" {{ old('syarikat_negeri') == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                        <option value="Negeri Sembilan" {{ old('syarikat_negeri') == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                        <option value="Selangor" {{ old('syarikat_negeri') == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                        <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('syarikat_negeri') == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                        <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('syarikat_negeri') == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                        <option value="Pahang" {{ old('syarikat_negeri') == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                        <option value="Terengganu" {{ old('syarikat_negeri') == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                        <option value="Kelantan" {{ old('syarikat_negeri') == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                        <option value="Perak" {{ old('syarikat_negeri') == "Perak" ? 'selected' : '' }}>Perak</option>
                                        <option value="Kedah" {{ old('syarikat_negeri') == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                        <option value="Perlis" {{ old('syarikat_negeri') == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                        <option value="Pulau Pinang" {{ old('syarikat_negeri') == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                        <option value="Sabah" {{ old('syarikat_negeri') == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                        <option value="Sarawak" {{ old('syarikat_negeri') == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                        <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('syarikat_negeri') == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                    </select>                                    
                                    <small class="text-danger" id="syarikat_negeri_error" name="syarikat_negeri_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-8 offset-3">
                                    <div class="checkbox checkbox-primary">
                                        <input id="syarikat_surat" type="checkbox">
                                        <label for="syarikat_surat">
                                            Alamat yang sama untuk urusan surat-menyurat
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-3 col-form-label" for="syarikat_surat"><span class="text-danger">*</span>Alamat syarikat (surat-menyurat):</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_bangunan" name="syarikat_surat_bangunan" class="form-control" value="Bangunan">
                                    <input type="text" id="syarikat_surat_jalan" name="syarikat_surat_jalan" class="form-control mt-2" value="Jalan">
                                    <small class="text-danger" id="syarikat_surat_bangunan_error" name="syarikat_surat_bangunan_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_surat_tambahan"></label>
                                <div class="col-md-2">
                                    <input type="text" id="syarikat_surat_poskod" name="syarikat_surat_poskod" class="form-control" value="Poskod">
                                    <small class="text-danger" id="syarikat_surat_poskod_error" name="syarikat_surat_poskod_error"></small>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="syarikat_surat_bandar" name="syarikat_surat_bandar" class="form-control" value="Bandar">
                                    <small class="text-danger" id="syarikat_surat_bandar_error" name="syarikat_surat_bandar_error"></small>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="syarikat_surat_negeri">
                                        <option value="">Pilih Negeri...</option>
                                        <option value="Johor" {{ old('syarikat_surat_negeri') == "Johor" ? 'selected' : '' }}>Johor</option>
                                        <option value="Melaka" {{ old('syarikat_surat_negeri') == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                        <option value="Negeri Sembilan" {{ old('syarikat_surat_negeri') == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                        <option value="Selangor" {{ old('syarikat_surat_negeri') == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                        <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                        <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                        <option value="Pahang" {{ old('syarikat_surat_negeri') == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                        <option value="Terengganu" {{ old('syarikat_surat_negeri') == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                        <option value="Kelantan" {{ old('syarikat_surat_negeri') == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                        <option value="Perak" {{ old('syarikat_surat_negeri') == "Perak" ? 'selected' : '' }}>Perak</option>
                                        <option value="Kedah" {{ old('syarikat_surat_negeri') == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                        <option value="Perlis" {{ old('syarikat_surat_negeri') == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                        <option value="Pulau Pinang" {{ old('syarikat_surat_negeri') == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                        <option value="Sabah" {{ old('syarikat_surat_negeri') == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                        <option value="Sarawak" {{ old('syarikat_surat_negeri') == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                        <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                    </select>                                    
                                    <small class="text-danger" id="syarikat_surat_negeri_error" name="syarikat_surat_negeri_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_no_tel" name="syarikat_no_tel" class="form-control" value="Nama Syarikat">
                                    <small class="text-danger" id="syarikat_no_tel_error" name="syarikat_no_tel_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_no_faks"><span class="text-danger">*</span>Nombor telefon:</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_no_faks" name="syarikat_no_faks" class="form-control" value="Nombor telefon">
                                    <small class="text-danger" id="syarikat_no_faks_error" name="syarikat_no_faks_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_emel"><span class="text-danger">*</span>Emel:</label>
                                <div class="col-md-8">
                                    <input type="email" id="syarikat_emel" name="syarikat_emel" class="form-control" value="Emel">
                                    <small class="text-danger" id="syarikat_emel_error" name="syarikat_emel_error"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="syarikat_wakil">Nama wakil yang dibenarkan:</label>
                                <div class="col-md-8">
                                    <input type="text" id="syarikat_wakil" name="syarikat_wakil" class="form-control" value="Nama wakil">
                                    <small class="text-danger" id="syarikat_wakil_error" name="syarikat_wakil_error"></small>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-8 offset-3">
                                    <button type="submit" name="syarikat_submit" id="syarikat_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Daftar
                                    </button>
                                    <button type="reset" name="syarikat_batal" id="syarikat_batal" class="btn btn-light waves-effect">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection

@section('local_js')
<script>
$(document).ready(function(){
    $('input[name="syarikat_tarikh_roc"]').datepicker();
    $('input[name="syarikat_tarikh_roc"]').attr("placeholder","Tarikh Pendaftaran (ROC) - Pilih dari kalendar");
});
</script>  
@endsection