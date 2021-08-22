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
                {{-- @if ($errors->any()) --}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        Terdapat kesilapan pada data semasa mengisi borang, sila semak.
                    </div>
                {{-- @endif --}}

                <form method="post" id="wizard-vertical">
                    @csrf
                    <h3>Butiran Pemohon</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_syarikat"><span class="text-danger">*</span>Syarikat Pendaftar:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="pemohon_syarikat">
                                    <option value="">Pilih Syarikat...</option>
                                    {{-- <option value="Johor" {{ old('pemohon_syarikat') == "Johor" ? 'selected' : '' }}>Johor</option> --}}
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
                            <label class="col-md-3 col-form-label my-md-0" for="pemohon_wakil_syarikat">Wakil Syarikat:</label>
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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="keluaran_dagangan"><span class="text-danger">*</span>Nama Dagangan:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="keluaran_dagangan">
                                    <option value="">Pilih Dagangan...</option>
                                    {{-- <option value="Johor" {{ old('keluaran_dagangan') == "Johor" ? 'selected' : '' }}>Johor</option> --}}
                                </select>    
                                @error('keluaran_dagangan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="keluaran_dagangan"><span class="text-danger">*</span>Nama Dagangan:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="keluaran_dagangan" type="text" name="keluaran_dagangan" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('keluaran_dagangan') }}">
                                @error('keluaran_dagangan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="keluaran_no_pendaftaran"><span class="text-danger">*</span>Nombor Pendaftaran:</label>
                            <div class="col-md-9">
                                <input type="text" id="keluaran_no_pendaftaran" name="keluaran_no_pendaftaran" class="form-control custom_border" placeholder="Nombor Pendaftaran " value="{{ old('keluaran_no_pendaftaran') }}">
                                @error('keluaran_no_pendaftaran') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Aktiviti Perniagaan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_aktiviti"><span class="text-danger">*</span>Nyatakan aktiviti utama perniagaan:</label>
                            <div class="col-md-5">
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengimport" name="perniagaan_mengimport" type="checkbox" value="TRUE" {{ old('perniagaan_mengimport') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengimport">
                                        Mengimport
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_lain" name="perniagaan_lain" type="checkbox" value="TRUE" {{ old('perniagaan_lain') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_lain">
                                        Lain-lain (nyatakan)
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang" name="perniagaan_mengilang" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang">
                                        Mengilang
                                    </label>
                                </div>
                            </div>
                            @error('perniagaan_aktiviti') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="perniagaan_lain_maklumat" name="perniagaan_lain_maklumat" class="form-control custom_border" placeholder="Lain-lain Aktiviti" value="{{ old('perniagaan_lain_maklumat') }}">
                                @error('perniagaan_lain_maklumat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_mengilang"><span class="text-danger">*</span>Jika aktiviti adalah mengilang, nyatakan aktiviti yang ingin dijalankan:</label>
                            <div class="col-md-5">
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_menyedia" name="perniagaan_mengilang_menyedia" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_menyedia') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_menyedia">
                                        Menyedia
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_merumus" name="perniagaan_mengilang_merumus" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_merumus') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_merumus">
                                        Merumus
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_mensebati" name="perniagaan_mengilang_mensebati" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_mensebati') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_mensebati">
                                        Mensebati
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_mencampur" name="perniagaan_mengilang_mencampur" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_mencampur') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_mencampur">
                                        Mencampur
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_melabel" name="perniagaan_mengilang_melabel" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_melabel') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_melabel">
                                        Melabel/Melabel semula
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_mempek" name="perniagaan_mengilang_mempek" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_mempek') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_mempek">
                                        Mempek/Mempek semula
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_membuat" name="perniagaan_mengilang_membuat" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_membuat') == "TRUE" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_membuat">
                                        Membuat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="perniagaan_mengilang_lain" name="perniagaan_mengilang_lain" type="checkbox" value="TRUE" {{ old('perniagaan_mengilang_lain') == "Lain-lain (nyatakan)" ? 'checked' : '' }}>
                                    <label for="perniagaan_mengilang_lain">
                                        Lain-lain (nyatakan)
                                    </label>
                                </div>
                            </div>
                            @error('perniagaan_mengilang') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                        <div class="form-group row" id="perniagaan_mengilang_lain_maklumat_div">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="perniagaan_mengilang_lain_maklumat" name="perniagaan_mengilang_lain_maklumat" class="form-control custom_border" placeholder="Lain-lain Aktiviti" value="{{ old('perniagaan_mengilang_lain_maklumat') }}">
                                @error('perniagaan_mengilang_lain_maklumat') 
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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_pengilang_kontrak"><span class="text-danger">*</span>Pengilang Kontrak:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="perniagaan_pengilang_kontrak" id="perniagaan_pengilang_kontrak" multiple="multiple">
                                    {{-- <optgroup label="Alaskan/Hawaiian Time Zone"></optgroup> --}}
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>  
                                @error('perniagaan_pengilang_kontrak') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_penginvoisan"><span class="text-danger">*</span>Invoicing:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="perniagaan_penginvoisan" id="perniagaan_penginvoisan" multiple="multiple">
                                    {{-- <optgroup label="Alaskan/Hawaiian Time Zone"></optgroup> --}}
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>  
                                @error('perniagaan_penginvoisan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Perawis Aktif, Lengai, Kandungan & Rumusan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perawis_aktif"><span class="text-danger">*</span>Perawis Aktif:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="perawis_aktif">
                                    <option value="">Pilih Perawis Aktif...</option>
                                    {{-- <option value='Mengimport' {{ old('perawis_aktif') == 'Mengimport' ? 'selected' : '' }}>Mengimport</option> --}}
                                </select>    
                                @error('perawis_aktif') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perawis_kod"><span class="text-danger">*</span>Nombor Kod:</label>
                            <div class="col-md-9">
                                <input type="text" id="perawis_kod" name="perawis_kod" class="form-control custom_border" placeholder="Nombor Kod" value="{{ old('perawis_kod') }}">
                                @error('perawis_kod') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perawis_perumusan"><span class="text-danger">*</span>Jenis Perumusan:</label>
                            <div class="col-md-9">
                                <input type="text" id="perawis_perumusan" name="perawis_perumusan" class="form-control custom_border" placeholder="Jenis Perumusan" value="{{ old('perawis_perumusan') }}">
                                @error('perawis_perumusan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="perawis_pengilang"><span class="text-danger">*</span>Sumber bagi racun makhluk perosak (Pengilang):</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="perawis_pengilang" id="perawis_pengilang" multiple="multiple">
                                    {{-- <optgroup label="Alaskan/Hawaiian Time Zone"></optgroup> --}}
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>  
                                @error('perniagaan_penginvoisan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
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

    // initialize date field using datepicker plugin
    $('input[name="pemohon_tarikh_terima_kaunter"]').datepicker();
    $('input[name="pemohon_tarikh_terima_kaunter"]').attr("placeholder","Tarikh Terima Kaunter - Pilih dari kalendar");
    $('input[name="pemohon_tarikh_lulus"]').datepicker();
    $('input[name="pemohon_tarikh_lulus"]').attr("placeholder","Tarikh Lulus - Pilih dari kalendar");
    $('input[name="pemohon_tarikh_tamat"]').datepicker();
    $('input[name="pemohon_tarikh_tamat"]').attr("placeholder","Tarikh Tamat - Pilih dari kalendar");

    //  intialize multiselect option using select2 plugin
    $('.select2').select2({
        width:"100%",
        maximumSelectionLength: 4,
        // placeholder: "Pilih Pengilang (maksimum 4)",
    });
});
</script>
@endsection