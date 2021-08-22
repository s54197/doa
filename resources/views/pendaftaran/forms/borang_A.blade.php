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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="keluaran_dagangan"><span class="text-danger">*</span>Nama Dagangan:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="keluaran_dagangan">
                                    <option value="">Pilih Produk...</option>
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
                                <input type="text" id="keluaran_no_pendaftaran" name="keluaran_no_pendaftaran" class="form-control custom_border" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('keluaran_no_pendaftaran') }}">
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
                            <div class="col-md-9">
                                <select class="form-control" name="perniagaan_aktiviti" id="perniagaan_aktiviti">
                                    <option value="">Pilih Aktiviti...</option>
                                    <option value='Mengimport' {{ old('perniagaan_aktiviti') == 'Mengimport' ? 'selected' : '' }}>Mengimport</option>
                                    <option value='Mengilang' {{ old('perniagaan_aktiviti') == 'Mengilang' ? 'selected' : '' }}>Mengilang</option>
                                    <option value='Lain-lain (nyatakan)' {{ old('perniagaan_aktiviti') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                </select>    
                                @error('perniagaan_aktiviti') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-none row" id="perniagaan_aktiviti_lain_div">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="perniagaan_aktiviti_lain" name="perniagaan_aktiviti_lain" class="form-control custom_border" placeholder="Lain-lain (nyatakan)" value="{{ old('perniagaan_aktiviti_lain') }}">
                                @error('perniagaan_aktiviti_lain') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-none row" id="perniagaan_aktiviti_dijalankan_div">
                            <label class="col-md-3 col-form-label my-md-0" for="perniagaan_aktiviti_dijalankan"><span class="text-danger">*</span>Jika aktiviti adalah mengilang, nyatakan aktiviti yang ingin dijalankan:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="perniagaan_aktiviti_dijalankan" id="perniagaan_aktiviti_dijalankan">
                                    <option value="">Pilih Aktiviti Dijalankan (Mengilang)...</option>
                                    <option value='Menyedia' {{ old('perniagaan_aktiviti_dijalankan') == 'Menyedia' ? 'selected' : '' }}>Menyedia</option>
                                    <option value='Mensebati' {{ old('perniagaan_aktiviti_dijalankan') == 'Mensebati' ? 'selected' : '' }}>Mensebati</option>
                                    <option value='Mencampur' {{ old('perniagaan_aktiviti_dijalankan') == 'Mencampur' ? 'selected' : '' }}>Mencampur</option>
                                    <option value='Melabel/Melabel semula' {{ old('perniagaan_aktiviti_dijalankan') == 'Melabel/Melabel semula' ? 'selected' : '' }}>Melabel/Melabel semula</option>
                                    <option value='Mempek/Mempek semula' {{ old('perniagaan_aktiviti_dijalankan') == 'Mempek/Mempek semula' ? 'selected' : '' }}>Mempek/Mempek semula</option>
                                    <option value='Membuat' {{ old('perniagaan_aktiviti_dijalankan') == 'Membuat' ? 'selected' : '' }}>Membuat</option>
                                    <option value='Lain-lain (nyatakan)' {{ old('perniagaan_aktiviti_dijalankan') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                </select>    
                                @error('perniagaan_aktiviti_dijalankan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-none" id="perniagaan_aktiviti_dijalankan_lain_div">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="perniagaan_aktiviti_dijalankan_lain" name="perniagaan_aktiviti_dijalankan_lain" class="form-control custom_border" placeholder="Lain-lain (nyatakan)" value="{{ old('perniagaan_aktiviti_dijalankan_lain') }}">
                                @error('perniagaan_aktiviti_dijalankan_lain') 
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

    $('#perniagaan_aktiviti').on('change', function(){
        // alert($(this).val());
        if ($(this).val()=='Lain-lain (nyatakan)') $('#perniagaan_aktiviti_lain_div').removeClass('d-none');
        else {
            $('#perniagaan_aktiviti_lain_div').addClass('d-none');
            $('#perniagaan_aktiviti_lain').val('');
        }
        
        if ($(this).val()=='Mengilang') $('#perniagaan_aktiviti_dijalankan_div').removeClass('d-none');
        else {
            $('#perniagaan_aktiviti_dijalankan_div').addClass('d-none');
            $('#perniagaan_aktiviti_dijalankan_lain_div').addClass('d-none');
            $('#perniagaan_aktiviti_dijalankan_lain_div').val('');
        }
    });

    $('#perniagaan_aktiviti_dijalankan').on('change', function(){
        if ($(this).val()=='Lain-lain (nyatakan)') $('#perniagaan_aktiviti_dijalankan_lain_div').removeClass('d-none');
        else {
            $('#perniagaan_aktiviti_dijalankan_lain_div').addClass('d-none');
            $('#perniagaan_aktiviti_dijalankan_lain').val('');
        }
    });


});
</script>
@endsection