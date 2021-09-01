@extends('layouts.app')

@section('title', 'Perawis Aktif')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Perawis Aktif</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Perawis Aktif</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">Pendaftaran Perawis</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" {{--action="{{ route('syarikat.create') }}"--}}>
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_nama"><span class="text-danger">*</span>Nama perawis:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_nama" name="perawis_nama" class="form-control" placeholder="Nama Syarikat" value="{{ old('perawis_nama') }}">
                                        @error('perawis_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_nama_kimia"><span class="text-danger">*</span>Nama Kimia:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_nama_kimia" name="perawis_nama_kimia" class="form-control" placeholder="Nama Kimia" value="{{ old('perawis_nama_kimia') }}">
                                        @error('perawis_nama_kimia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_sinonim"><span class="text-danger">*</span>Sinonim:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_sinonim" name="perawis_sinonim" class="form-control" placeholder="Sinonim" value="{{ old('perawis_sinonim') }}">
                                        @error('perawis_sinonim') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_cas"><span class="text-danger">*</span>CAS No:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_cas" name="perawis_cas" class="form-control" placeholder="CAS No" value="{{ old('perawis_cas') }}">
                                        @error('perawis_cas') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_hscode"><span class="text-danger">*</span>HSCODE:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_hscode" name="perawis_hscode" class="form-control" placeholder="HSCODE" value="{{ old('perawis_hscode') }}">
                                        @error('perawis_hscode') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_ahtncode"><span class="text-danger">*</span>AHTNCODE:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_ahtncode" name="perawis_ahtncode" class="form-control" placeholder="AHTNCODE" value="{{ old('perawis_ahtncode') }}">
                                        @error('perawis_ahtncode') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_piawaian"><span class="text-danger">*</span>Piawaian Analisis:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_piawaian" name="perawis_piawaian" class="form-control" placeholder="Piawaian Analisis" value="{{ old('perawis_piawaian') }}">
                                        @error('perawis_piawaian') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_sampel"><span class="text-danger">*</span>Sampel Analisis:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_sampel" name="perawis_sampel" class="form-control" placeholder="Sampel Analisis" value="{{ old('perawis_sampel') }}">
                                        @error('perawis_sampel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_pihak_ketiga"><span class="text-danger">*</span>Laporan Analisis Makmal Pihak Ketiga:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_pihak_ketiga" name="perawis_pihak_ketiga" class="form-control" placeholder="Laporan Analisis Makmal Pihak Ketiga" value="{{ old('perawis_pihak_ketiga') }}">
                                        @error('perawis_pihak_ketiga') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_kumpulan_kimia"><span class="text-danger">*</span>Kumpulan Kimia:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_kumpulan_kimia" name="perawis_kumpulan_kimia" class="form-control" placeholder="Kumpulan Kimia" value="{{ old('perawis_kumpulan_kimia') }}">
                                        @error('perawis_kumpulan_kimia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_kaedah"><span class="text-danger">*</span>Kaedah:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_kaedah" name="perawis_kaedah" class="form-control" placeholder="Kaedah" value="{{ old('perawis_kaedah') }}">
                                        @error('perawis_kaedah') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_tarikh_lulus"><span class="text-danger">*</span>Tarikh Lulus:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="perawis_tarikh_lulus" type="text" name="perawis_tarikh_lulus" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('perawis_tarikh_lulus') }}">
                                        @error('perawis_tarikh_lulus') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_tarikh_terhad"><span class="text-danger">*</span>Tarikh Terhad:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="perawis_tarikh_terhad" type="text" name="perawis_tarikh_terhad" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('perawis_tarikh_terhad') }}">
                                        @error('perawis_tarikh_terhad') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_peratusan"><span class="text-danger">*</span>Peratusan:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="perawis_peratusan" name="perawis_peratusan" class="form-control" placeholder="Peratusan" value="{{ old('perawis_peratusan') }}">
                                        @error('perawis_peratusan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="perawis_unit">
                                            <option value="">Pilih Unit...</option>
                                            <option value='%w/w' {{ old('perawis_unit') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='mg/mat' {{ old('perawis_unit') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='I.U./mg' {{ old('perawis_unit') == 'I.U./mg' ? 'selected' : '' }}>I.U./mg</option>
                                            <option value='ITU/mg' {{ old('perawis_unit') == 'ITU/mg' ? 'selected' : '' }}>ITU/mg</option>
                                            <option value='mg/unit' {{ old('perawis_unit') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('perawis_unit') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('perawis_unit') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="perawis_unit_lain" name="perawis_unit_lain" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('perawis_unit_lain') }}">
                                        @error('perawis_unit_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        <button type="submit" name="syarikat_submit" id="syarikat_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Daftar <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="syarikat_batal" id="syarikat_batal" class="btn btn-light waves-effect mr-1">
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

</div>
<!-- end div -->
@endsection

@section('local_js')
<script>
$(document).ready(function(){
    // initialize date field using datepicker plugin
    $('input[name="perawis_tarikh_lulus"]').datepicker();
    $('input[name="perawis_tarikh_lulus"]').attr("placeholder","Tarikh Lulus - Pilih dari kalendar");
    $('input[name="perawis_tarikh_terhad"]').datepicker();
    $('input[name="perawis_tarikh_terhad"]').attr("placeholder","Tarikh Terhad - Pilih dari kalendar");
});
</script>
@endsection