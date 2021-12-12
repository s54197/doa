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
                <h4 class="header-title">{{$tajuk}} Perawis</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('perawis.create') : route('perawis.update',$perawiss->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_nama"><span class="text-danger">*</span>Nama perawis:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_nama" name="perawis_nama" class="form-control" placeholder="Nama Perawis" value="{{ old('perawis_nama',isset($perawiss->perawis_nama)?$perawiss->perawis_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_nama_kimia">Nama Kimia:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_nama_kimia" name="perawis_nama_kimia" class="form-control" placeholder="Nama Kimia" value="{{ old('perawis_nama_kimia',isset($perawiss->perawis_nama_kimia)?$perawiss->perawis_nama_kimia:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_nama_kimia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_sinonim">Sinonim:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_sinonim" name="perawis_sinonim" class="form-control" placeholder="Sinonim" value="{{ old('perawis_sinonim',isset($perawiss->perawis_sinonim)?$perawiss->perawis_sinonim:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_sinonim') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_cas"><span class="text-danger">*</span>CAS No:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_cas" name="perawis_cas" class="form-control" placeholder="CAS No" value="{{ old('perawis_cas',isset($perawiss->perawis_cas)?$perawiss->perawis_cas:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_cas') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_hscode"><span class="text-danger">*</span>MalaysianHSCodes:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_hscode" name="perawis_hscode" class="form-control" placeholder="XXXX.XX XXX" value="{{ old('perawis_hscode',isset($perawiss->perawis_hscode)?$perawiss->perawis_hscode:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} data-toggle="input-mask" data-mask-format="0000.00 000">
                                        @error('perawis_hscode') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_ahtncode"><span class="text-danger">*</span>AHTNCodes:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_ahtncode" name="perawis_ahtncode" class="form-control" placeholder="XXXX.XX.XX XX" value="{{ old('perawis_ahtncode',isset($perawiss->perawis_ahtncode)?$perawiss->perawis_ahtncode:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} data-toggle="input-mask" data-mask-format="0000.00.00 00">
                                        @error('perawis_ahtncode') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_piawaian">Piawaian Analisis:</label>
                                    <div class="col-md-8">
                                        <div class="checkbox checkbox-primary">
                                            <input id="perawis_piawaian" name="perawis_piawaian" type="checkbox" value="1" {{ old('perawis_piawaian',isset($perawiss->perawis_piawaian)?$perawiss->perawis_piawaian:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <label for="perawis_piawaian">
                                                
                                            </label>
                                        </div>
                                        <!-- <input type="text" id="perawis_piawaian" name="perawis_piawaian" class="form-control" placeholder="Piawaian Analisis" value="{{ old('perawis_piawaian',isset($perawiss->perawis_piawaian)?$perawiss->perawis_piawaian:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}> -->
                                        @error('perawis_piawaian') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_sampel">Sampel Analisis:</label>
                                    <div class="col-md-8">
                                        <div class="checkbox checkbox-primary">
                                            <input id="perawis_sampel" name="perawis_sampel" type="checkbox" value="1" {{ old('perawis_sampel',isset($perawiss->perawis_sampel)?$perawiss->perawis_sampel:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <label for="perawis_sampel">
                                                
                                            </label>
                                        </div>
                                        <!-- <input type="text" id="perawis_sampel" name="perawis_sampel" class="form-control" placeholder="Sampel Analisis" value="{{ old('perawis_sampel',isset($perawiss->perawis_sampel)?$perawiss->perawis_sampel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}> -->
                                        @error('perawis_sampel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_pihak_ketiga">Laporan Analisis Makmal Pihak Ketiga:</label>
                                    <div class="col-md-8">
                                        <div class="checkbox checkbox-primary">
                                            <input id="perawis_pihak_ketiga" name="perawis_pihak_ketiga" type="checkbox" value="1" {{ old('perawis_pihak_ketiga',isset($perawiss->perawis_pihak_ketiga)?$perawiss->perawis_pihak_ketiga:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <label for="perawis_pihak_ketiga">
                                                
                                            </label>
                                        </div>
                                        <!-- <input type="text" id="perawis_pihak_ketiga" name="perawis_pihak_ketiga" class="form-control" placeholder="Laporan Analisis Makmal Pihak Ketiga" value="{{ old('perawis_pihak_ketiga',isset($perawiss->perawis_pihak_ketiga)?$perawiss->perawis_pihak_ketiga:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}> -->
                                        @error('perawis_pihak_ketiga') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_kumpulan_kimia"><span class="text-danger">*</span>Kategori (P/K):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="perawis_kumpulan_kimia" name="perawis_kumpulan_kimia" class="form-control" placeholder="Kumpulan Kimia" value="{{ old('perawis_kumpulan_kimia',isset($perawiss->perawis_kumpulan_kimia)?$perawiss->perawis_kumpulan_kimia:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_kumpulan_kimia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_kaedah"><span class="text-danger">*</span>Kaedah:</label>
                                    <div class="col-md-8">
                                        {{-- <input type="text" id="perawis_kaedah" name="perawis_kaedah" class="form-control" placeholder="Kaedah" value="{{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}> --}}

                                        <select class="form-control" name="perawis_kaedah" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Kaedah...</option>
                                            <option value="HPLC" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "HPLC" ? 'selected' : '' }}>HPLC</option>
                                            <option value="GC-FID" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "GC-FID" ? 'selected' : '' }}>GC-FID</option>
                                            <option value="GC" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "GC" ? 'selected' : '' }}>GC</option>
                                            <option value="Microscopic method" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "Microscopic method" ? 'selected' : '' }}>Microscopic method</option>
                                            <option value="Reversed Liquid Chromatography" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "Reversed Liquid Chromatography" ? 'selected' : '' }}>Reversed Liquid Chromatography</option>
                                            <option value="Reversed-Phase Liquid Chromatography" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "Reversed-Phase Liquid Chromatography" ? 'selected' : '' }}>Reversed-Phase Liquid Chromatography</option>
                                            <option value="Synthesizing" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "Synthesizing" ? 'selected' : '' }}>Synthesizing</option>
                                            <option value="Titration" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "Titration" ? 'selected' : '' }}>Titration</option>
                                            <option value="This is one of Btk strain from US" {{ old('perawis_kaedah',isset($perawiss->perawis_kaedah)?$perawiss->perawis_kaedah:null) == "This is one of Btk strain from US" ? 'selected' : '' }}>This is one of Btk strain from US</option>
                                        </select>

                                        @error('perawis_kaedah') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_tarikh_lulus">Tarikh kali pertama AI didaftarkan:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="perawis_tarikh_lulus" type="text" autocomplete="off" name="perawis_tarikh_lulus" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('perawis_tarikh_lulus',isset($perawiss->perawis_tarikh_lulus)?$perawiss->perawis_tarikh_lulus:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_tarikh_lulus') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_tarikh_terhad"><span class="text-danger">*</span>Tarikh Terhad:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="perawis_tarikh_terhad" type="text" autocomplete="off" name="perawis_tarikh_terhad" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('perawis_tarikh_terhad',isset($perawiss->perawis_tarikh_terhad)?$perawiss->perawis_tarikh_terhad:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_tarikh_terhad') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_tarikh_haram"><span class="text-danger">*</span>Tarikh Haram:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="perawis_tarikh_haram" type="text" autocomplete="off" name="perawis_tarikh_haram" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('perawis_tarikh_haram',isset($perawiss->perawis_tarikh_haram)?$perawiss->perawis_tarikh_haram:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_tarikh_haram') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="perawis_peratusan"><span class="text-danger">*</span>Peratusan:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="perawis_peratusan" name="perawis_peratusan" class="form-control" placeholder="Peratusan" value="{{ old('perawis_peratusan',isset($perawiss->perawis_peratusan)?$perawiss->perawis_peratusan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} min=0 step=0.01>
                                        @error('perawis_peratusan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="perawis_unit" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Unit...</option>
                                            <option value='%w/w' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='mg/mat' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='I.U./mg' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == 'I.U./mg' ? 'selected' : '' }}>I.U./mg</option>
                                            <option value='ITU/mg' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == 'ITU/mg' ? 'selected' : '' }}>ITU/mg</option>
                                            <option value='mg/unit' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('perawis_unit',isset($perawiss->perawis_unit)?$perawiss->perawis_unit:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('perawis_unit') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="perawis_unit_lain" name="perawis_unit_lain" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('perawis_unit_lain',isset($perawiss->perawis_unit_lain)?$perawiss->perawis_unit_lain:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('perawis_unit_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                    @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="perawis_submit" id="perawis_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="perawis_batal" id="perawis_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.perawis') }}'" name="perawis_batal" id="perawis_batal" class="btn btn-light waves-effect">
                                            {{ $jenis == "papar" ? 'Kembali' : 'Batal' }}
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
