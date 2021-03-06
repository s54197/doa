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
    .input-group-btn label {
        margin-top: 0px !important
    }

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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        Terdapat kesilapan pada data semasa mengisi borang, sila semak. {{ $errors }}
                    </div>
                @endif
                <form method="post" id="wizard-vertical" action="{{ $jenis == 'new' ? route('pendaftaran.create') : route('pendaftaran.update',$borangIds->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <h3>Butiran Pemohon</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_syarikat"><span class="text-danger">*</span>Syarikat Pendaftar:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_syarikat" id="borangA_syarikat" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Syarikat...</option>
                                    @foreach($syarikats as $syarikat)
                                        <option value=" {{ $syarikat->id }}" id="{{ $syarikat->id }}" {{ old('borangA_syarikat' , isset($borangIds->syarikat->syarikat_nama)?$borangIds->syarikat->syarikat_nama:null ) == $syarikat->syarikat_nama ? 'selected' : '' }} >{{ $syarikat->syarikat_nama }}</option>
                                    @endforeach
                                </select>    
                                @error('borangA_syarikat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_agen"><span class="text-danger">*</span>Wakil/Agen:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_agen" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Agen/Wakil...</option>
                                    @foreach($agens as $agen)
                                        <option value=" {{ $agen->id }}" {{ old('borangA_agen' , isset($borangIds->agen->agen_nama)?$borangIds->agen->agen_nama:null ) == $agen->agen_nama ? 'selected' : '' }} >{{ $agen->agen_nama }}</option>
                                    @endforeach
                                </select>    
                                @error('borangA_agen') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_tarikh_terima_kaunter">{{--<span class="text-danger">*</span>--}}Tarikh Terima Kaunter:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="borangA_tarikh_terima_kaunter" type="text" name="borangA_tarikh_terima_kaunter" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('borangA_tarikh_terima_kaunter',isset($borangIds->borangA_tarikh_terima_kaunter)?$borangIds->borangA_tarikh_terima_kaunter:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_tarikh_terima_kaunter') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_tarikh_lulus">{{--<span class="text-danger">*</span>--}}Tarikh Lulus:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="borangA_tarikh_lulus" type="text" name="borangA_tarikh_lulus" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('borangA_tarikh_lulus',isset($borangIds->borangA_tarikh_lulus)?$borangIds->borangA_tarikh_lulus:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_tarikh_lulus') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_tarikh_tamat">{{--<span class="text-danger">*</span>--}}Tarikh Tamat:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="borangA_tarikh_tamat" type="text" name="borangA_tarikh_tamat" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('borangA_tarikh_tamat',isset($borangIds->borangA_tarikh_tamat)?$borangIds->borangA_tarikh_tamat:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_tarikh_tamat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_wakil_syarikat">Wakil Syarikat:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_wakil_syarikat" name="borangA_wakil_syarikat" class="form-control custom_border" placeholder="Nama wakil" value="{{ old('borangA_wakil_syarikat',isset($borangIds->borangA_wakil_syarikat)?$borangIds->borangA_wakil_syarikat:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_wakil_syarikat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Keluaran</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_dagangan"><span class="text-danger">*</span>Nama Dagangan:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_dagangan" id="borangA_dagangan" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Dagangan...</option>
                                    @foreach($produks as $produk)
                                        <option id="{{ $produk->id }}" value=" {{ $produk->id }}" {{ old('borangA_dagangan' , isset($borangIds->produk->produk_nama)?$borangIds->produk->produk_nama:null ) == $produk->produk_nama ? 'selected' : '' }} >{{ $produk->produk_nama }}</option>
                                    @endforeach
                                </select>    
                                @error('borangA_dagangan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row {{ $tajuk == "BorangA" ? 'd-none' : '' }}">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_jenis_pendaftaran"><span class="text-danger">*</span>Jenis Pendaftaran:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_jenis_pendaftaran_1" name="borangA_jenis_pendaftaran_1" class="form-control custom_border" placeholder="Jenis Pendaftaran " value="{{ old('borangA_jenis_pendaftaran',isset($borangIds->borangA_jenis_pendaftaran)?$borangIds->borangA_jenis_pendaftaran:null) }}" disabled >
                                <input type="hidden" id="borangA_jenis_pendaftaran" name="borangA_jenis_pendaftaran" class="form-control custom_border" placeholder="Jenis Pendaftaran " value="{{ old('borangA_jenis_pendaftaran',isset($borangIds->borangA_jenis_pendaftaran)?$borangIds->borangA_jenis_pendaftaran:null) }}">

                                @error('borangA_jenis_pendaftaran') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_no_pendaftaran"><span class="text-danger">*</span>Nombor Pendaftaran:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_no_pendaftaran" name="borangA_no_pendaftaran" class="form-control custom_border" placeholder="Nombor Pendaftaran " value="{{ old('borangA_no_pendaftaran',isset($borangIds->borangA_no_pendaftaran)?$borangIds->borangA_no_pendaftaran:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_no_pendaftaran') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Aktiviti Perniagaan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perniagaan_aktiviti"><span class="text-danger">*</span>Nyatakan aktiviti utama perniagaan:</label>
                            <div class="col-md-5">
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_perniagaan_mengimport" name="borangA_perniagaan_mengimport" type="checkbox" value="1" {{ old('borangA_perniagaan_mengimport',isset($borangIds->borangA_perniagaan_mengimport)?$borangIds->borangA_perniagaan_mengimport:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_perniagaan_mengimport">
                                        Mengimport
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_perniagaan_lain" name="borangA_perniagaan_lain" type="checkbox" value="1" {{ old('borangA_perniagaan_lain',isset($borangIds->borangA_perniagaan_lain)?$borangIds->borangA_perniagaan_lain:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_perniagaan_lain">
                                        Lain-lain (nyatakan)
                                    </label>
                                </div>
                                @error('borangA_perniagaan_lain') 
                                    <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_perniagaan_mengilang" name="borangA_perniagaan_mengilang" type="checkbox" value="1" {{ old('borangA_perniagaan_mengilang',isset($borangIds->borangA_perniagaan_mengilang)?$borangIds->borangA_perniagaan_mengilang:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_perniagaan_mengilang">
                                        Mengilang
                                    </label>
                                </div>
                            </div>
                            @error('borangA_perniagaan_aktiviti') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="borangA_perniagaan_lain_maklumat" name="borangA_perniagaan_lain_maklumat" class="form-control custom_border" placeholder="Lain-lain Aktiviti" value="{{ old('borangA_perniagaan_lain_maklumat',isset($borangIds->borangA_perniagaan_lain_maklumat)?$borangIds->borangA_perniagaan_lain_maklumat:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_perniagaan_lain_maklumat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_mengilang">Jika aktiviti adalah mengilang, nyatakan aktiviti yang ingin dijalankan:</label>
                            <div class="col-md-5">
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_menyedia" name="borangA_mengilang_menyedia" type="checkbox" value="1" {{ old('borangA_mengilang_menyedia',isset($borangIds->borangA_mengilang_menyedia)?$borangIds->borangA_mengilang_menyedia:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_menyedia">
                                        Menyedia
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_merumus" name="borangA_mengilang_merumus" type="checkbox" value="1" {{ old('borangA_mengilang_merumus',isset($borangIds->borangA_mengilang_merumus)?$borangIds->borangA_mengilang_merumus:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_merumus">
                                        Merumus
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_mensebati" name="borangA_mengilang_mensebati" type="checkbox" value="1" {{ old('borangA_mengilang_mensebati',isset($borangIds->borangA_mengilang_mensebati)?$borangIds->borangA_mengilang_mensebati:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_mensebati">
                                        Mensebati
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_mencampur" name="borangA_mengilang_mencampur" type="checkbox" value="1" {{ old('borangA_mengilang_mencampur',isset($borangIds->borangA_mengilang_mencampur)?$borangIds->borangA_mengilang_mencampur:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_mencampur">
                                        Mencampur
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_melabel" name="borangA_mengilang_melabel" type="checkbox" value="1" {{ old('borangA_mengilang_melabel',isset($borangIds->borangA_mengilang_melabel)?$borangIds->borangA_mengilang_melabel:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_melabel">
                                        Melabel/Melabel semula
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_mempek" name="borangA_mengilang_mempek" type="checkbox" value="1" {{ old('borangA_mengilang_mempek',isset($borangIds->borangA_mengilang_mempek)?$borangIds->borangA_mengilang_mempek:null) == "1" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_mempek">
                                        Mempek/Mempek semula
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_membuat" name="borangA_mengilang_membuat" type="checkbox" value="1" {{ old('borangA_mengilang_membuat',isset($borangIds->borangA_mengilang_membuat)?$borangIds->borangA_mengilang_membuat:null) == "TRUE" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_membuat">
                                        Membuat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="borangA_mengilang_lain" name="borangA_mengilang_lain" type="checkbox" value="1" {{ old('borangA_mengilang_lain',isset($borangIds->borangA_mengilang_lain)?$borangIds->borangA_mengilang_lain:null) == "Lain-lain (nyatakan)" ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label for="borangA_mengilang_lain">
                                        Lain-lain (nyatakan)
                                    </label>
                                </div>
                                @error('borangA_mengilang_lain') 
                                    <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                            @error('borangA_mengilang') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                        <div class="form-group row" id="borangA_mengilang_lain_maklumat_div">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="borangA_mengilang_lain_maklumat" name="borangA_mengilang_lain_maklumat" class="form-control custom_border" placeholder="Lain-lain Aktiviti" value="{{ old('borangA_mengilang_lain_maklumat',isset($borangIds->borangA_mengilang_lain_maklumat)?$borangIds->borangA_mengilang_lain_maklumat:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_mengilang_lain_maklumat') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_pengilang">{{--<span class="text-danger">*</span>--}}Pengilang/Sumber:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="borangA_pengilang[]" id="borangA_pengilang" multiple="multiple" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    @foreach($pengilang_pembekals as $pengilang_pembekal)
                                        @if(isset($borangIds) && count($borangIds->pihakketigas)>0)
                                            @foreach($borangIds->pihakketigas as $value)
                                                <option value="{{ $pengilang_pembekal->id }}" {{ old('borangA_pengilang[]' , isset($value->id)?$value->id:null ) == $pengilang_pembekal->id ? 'selected' : '' }}>{{ $pengilang_pembekal->pihak_ketiga_nama }} </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $pengilang_pembekal->id }}" {{ old('borangA_pengilang[]' , isset($value->id)?$value->id:null ) == $pengilang_pembekal->id ? 'selected' : '' }}>{{ $pengilang_pembekal->pihak_ketiga_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_pengilang') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_pengilang_kontrak">{{--<span class="text-danger">*</span>--}}Pengilang Kontrak:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="borangA_pengilang_kontrak[]" id="borangA_pengilang_kontrak" multiple="multiple" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    @foreach($pengilangs as $pengilang)
                                        @if(isset($borangIds) && count($borangIds->pengilangs)>0) 
                                            @foreach($borangIds->pengilangs as $value)
                                                <option value="{{ $pengilang->id }}" {{ old('borangA_pengilang_kontrak[]' , isset($value->id)?$value->id:null ) == $pengilang->id ? 'selected' : '' }} >{{ $pengilang->pihak_ketiga_nama }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $pengilang->id }}" {{ old('borangA_pengilang_kontrak[]' , isset($value->id)?$value->id:null ) == $pengilang->id ? 'selected' : '' }}>{{ $pengilang->pihak_ketiga_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_pengilang_kontrak') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_penginvoisan">{{--<span class="text-danger">*</span>--}}Invoicing:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="borangA_penginvoisan[]" id="borangA_penginvoisan" multiple="multiple" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    @foreach($penginvoisans as $penginvoisan)
                                        @if(isset($borangIds) && count($borangIds->penginvoisans)>0)
                                            @foreach($borangIds->penginvoisans as $value)
                                                <option value="{{ $penginvoisan->id }}" {{ old('borangA_penginvoisan[]' , isset($value->id)?$value->id:null ) == $penginvoisan->id ? 'selected' : '' }} >{{ $penginvoisan->penginvoisan_nama }}</option>                                       
                                            @endforeach
                                        @else
                                            <option value="{{ $penginvoisan->id }}" {{ old('borangA_penginvoisan[]' , isset($value->id)?$value->id:null ) == $penginvoisan->id ? 'selected' : '' }}>{{ $penginvoisan->penginvoisan_nama }} </option>
                                        @endif     
                                    @endforeach
                                </select>  
                                @error('borangA_penginvoisan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_gudang">{{--<span class="text-danger">*</span>--}}Gudang:</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="borangA_gudang[]" id="borangA_gudang" multiple="multiple" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    @foreach($gudangs as $gudang)
                                        @if(isset($borangIds) && count($borangIds->gudangs)>0)
                                            @foreach($borangIds->gudangs as $value)
                                                <option value="{{ $gudang->id }}" {{ old('borangA_gudang[]' , isset($value->id)?$value->id:null ) == $gudang->id ? 'selected' : '' }}>{{ $gudang->gudang_nama }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $gudang->id }}" {{ old('borangA_gudang[]' , isset($value->id)?$value->id:null ) == $gudang->id ? 'selected' : '' }}>{{ $gudang->gudang_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_gudang') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                    </section>
                    <h3>Butiran Perawis Aktif, Lengai, Kandungan & Rumusan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_aktif_1"><span class="text-danger">*</span>Perawis Aktif 1:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_perawis_aktif_1" id="borangA_perawis_aktif_1" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Perawis Aktif 1...</option>
                                    @foreach($perawiss as $perawis)
                                        @if(isset($borangIds))
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_1' , isset($borangIds->borangA_perawis_aktif_1)?$borangIds->borangA_perawis_aktif_1:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }}</option>
                                        @else
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_1' , isset($borangIds->borangA_perawis_aktif_1)?$borangIds->borangA_perawis_aktif_1:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_perawis_aktif_1') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_peratusan_1"><span class="text-danger">*</span>Peratusan 1:</label>
                            <div class="col-md-5">
                                <input type="number" id="borangA_perawis_peratusan_1" name="borangA_perawis_peratusan_1" class="form-control" placeholder="Nyatakan Peratusan 1" value="{{ old('borangA_perawis_peratusan_1',isset($borangIds->borangA_perawis_peratusan_1)?$borangIds->borangA_perawis_peratusan_1:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} min=0 step=0.01>
                                @error('borangA_perawis_peratusan_1') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="borangA_perawis_peratusan_unit_1" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Unit 1...</option>
                                    <option value='%w/w' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                    <option value='mg/mat' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                    <option value='I.U./mg' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == 'I.U./mg' ? 'selected' : '' }}>I.U./mg</option>
                                    <option value='ITU/mg' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == 'ITU/mg' ? 'selected' : '' }}>ITU/mg</option>
                                    <option value='mg/unit' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                    {{--<option value='Lain-lain (nyatakan)' {{ old('borangA_perawis_peratusan_unit_1',isset($borangIds->borangA_perawis_peratusan_unit_1)?$borangIds->borangA_perawis_peratusan_unit_1:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>--}}
                                </select>
                                @error('borangA_perawis_peratusan_unit_1') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_aktif_2">Perawis Aktif 2:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_perawis_aktif_2" id="borangA_perawis_aktif_2" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Perawis Aktif 2...</option>
                                    @foreach($perawiss as $perawis)
                                        @if(isset($borangIds))
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_2' , isset($borangIds->borangA_perawis_aktif_2)?$borangIds->borangA_perawis_aktif_2:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }}</option>
                                        @else
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_2' , isset($borangIds->borangA_perawis_aktif_2)?$borangIds->borangA_perawis_aktif_2:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_perawis_aktif_2') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_peratusan_2">Peratusan 2:</label>
                            <div class="col-md-5">
                                <input type="number" id="borangA_perawis_peratusan_2" name="borangA_perawis_peratusan_2" class="form-control" placeholder="Nyatakan Peratusan 2" value="{{ old('borangA_perawis_peratusan_2',isset($borangIds->borangA_perawis_peratusan_2)?$borangIds->borangA_perawis_peratusan_2:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} min=0 step=0.01>
                                @error('borangA_perawis_peratusan_2') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="borangA_perawis_peratusan_unit_2" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Unit 2...</option>
                                    <option value='%w/w' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->borangA_perawis_peratusan_unit_2)?$borangIds->borangA_perawis_peratusan_unit_2:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                    <option value='mg/mat' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->borangA_perawis_peratusan_unit_2)?$borangIds->borangA_perawis_peratusan_unit_2:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                    <option value='I.U./mg' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->borangA_perawis_peratusan_unit_2)?$borangIds->borangA_perawis_peratusan_unit_2:null) == 'I.U./mg' ? 'selected' : '' }}>I.U./mg</option>
                                    <option value='ITU/mg' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->borangA_perawis_peratusan_unit_2)?$borangIds->borangA_perawis_peratusan_unit_2:null) == 'ITU/mg' ? 'selected' : '' }}>ITU/mg</option>
                                    <option value='mg/unit' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->borangA_perawis_peratusan_unit_2)?$borangIds->borangA_perawis_peratusan_unit_2:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                    {{--<option value='Lain-lain (nyatakan)' {{ old('borangA_perawis_peratusan_unit_2',isset($borangIds->perawis_unit)?$borangIds->borangA_perawis_peratusan_unit_2:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>--}}
                                </select>
                                @error('perawis_unit') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_aktif_3">Perawis Aktif 3:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="borangA_perawis_aktif_3" id="borangA_perawis_aktif_3" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                <option value="">Pilih Perawis Aktif 3...</option>    
                                @foreach($perawiss as $perawis)
                                        @if(isset($borangIds))
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_3' , isset($borangIds->borangA_perawis_aktif_3)?$borangIds->borangA_perawis_aktif_3:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }}</option>
                                        @else
                                            <option value="{{ $perawis->perawis_nama }}" {{ old('borangA_perawis_aktif_3' , isset($borangIds->borangA_perawis_aktif_3)?$borangIds->borangA_perawis_aktif_3:null ) == $perawis->perawis_nama ? 'selected' : '' }}>{{ $perawis->perawis_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_perawis_aktif_3') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_peratusan_3">Peratusan 3:</label>
                            <div class="col-md-5">
                                <input type="number" id="borangA_perawis_peratusan_3" name="borangA_perawis_peratusan_3" class="form-control" placeholder="Nyatakan Peratusan 3..." value="{{ old('borangA_perawis_peratusan_3',isset($borangIds->borangA_perawis_peratusan_3)?$borangIds->borangA_perawis_peratusan_3:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }} min=0 step=0.01>
                                @error('borangA_perawis_peratusan_3') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="borangA_perawis_peratusan_unit_3" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <option value="">Pilih Unit 3...</option>
                                    <option value='%w/w' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                    <option value='mg/mat' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                    <option value='I.U./mg' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == 'I.U./mg' ? 'selected' : '' }}>I.U./mg</option>
                                    <option value='ITU/mg' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == 'ITU/mg' ? 'selected' : '' }}>ITU/mg</option>
                                    <option value='mg/unit' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                    {{--<option value='Lain-lain (nyatakan)' {{ old('borangA_perawis_peratusan_unit_3',isset($borangIds->borangA_perawis_peratusan_unit_3)?$borangIds->borangA_perawis_peratusan_unit_3:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>--}}
                                </select>
                                @error('perawis_unit') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_perumusan"><span class="text-danger">*</span>Jenis Perumusan:</label>
                            <div class="col-md-9">
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_bahan_teknikal_pepejal_tc' name='borangA_perawis_perumusan' class='custom-control-input' value='Bahan Teknikal Pepejal (TC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Bahan Teknikal Pepejal (TC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_bahan_teknikal_pepejal_tc'>Bahan Teknikal Pepejal (TC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_bahan_teknikal_separa_pepejal_tc' name='borangA_perawis_perumusan' class='custom-control-input' value='Bahan Teknikal Separa Pepejal (TC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Bahan Teknikal Separa Pepejal (TC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_bahan_teknikal_separa_pepejal_tc'>Bahan Teknikal Separa Pepejal (TC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_bahan_teknikal_cecair_tc' name='borangA_perawis_perumusan' class='custom-control-input' value='Bahan Teknikal Cecair (TC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Bahan Teknikal Cecair (TC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_bahan_teknikal_cecair_tc'>Bahan Teknikal Cecair (TC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_teknikal_pepejal_tk' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Teknikal Pepejal (TK)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Teknikal Pepejal (TK)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_teknikal_pepejal_tk'>Pekatan Teknikal Pepejal (TK)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_teknikal_separa_pepejal_tk' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Teknikal Separa Pepejal (TK)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Teknikal Separa Pepejal (TK)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_teknikal_separa_pepejal_tk'>Pekatan Teknikal Separa Pepejal (TK)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_teknikal_cecair_tk' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Teknikal Cecair (TK)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Teknikal Cecair (TK)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_teknikal_cecair_tk'>Pekatan Teknikal Cecair (TK)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_serbuk_bancuh_wp' name='borangA_perawis_perumusan' class='custom-control-input' value='Serbuk Bancuh (WP)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Serbuk Bancuh (WP)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_serbuk_bancuh_wp'>Serbuk Bancuh (WP)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_serbuk_bancuh_sp' name='borangA_perawis_perumusan' class='custom-control-input' value='Serbuk Bancuh (SP)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Serbuk Bancuh (SP)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_serbuk_bancuh_sp'>Serbuk Bancuh (SP)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_butir_terserak_air_wg' name='borangA_perawis_perumusan' class='custom-control-input' value='Butir Terserak Air (WG)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Butir Terserak Air (WG)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_butir_terserak_air_wg'>Butir Terserak Air (WG)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_butir_larut_air_sg' name='borangA_perawis_perumusan' class='custom-control-input' value='Butir Larut Air (SG)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Butir Larut Air (SG)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_butir_larut_air_sg'>Butir Larut Air (SG)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_butir_gr' name='borangA_perawis_perumusan' class='custom-control-input' value='Butir (GR)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Butir (GR)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_butir_gr'>Butir (GR)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_butir_terkapsul_cg' name='borangA_perawis_perumusan' class='custom-control-input' value='Butir Terkapsul (CG)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Butir Terkapsul (CG)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_butir_terkapsul_cg'>Butir Terkapsul (CG)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_larut_air_sl' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Larut Air (SL)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Larut Air (SL)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_larut_air_sl'>Pekatan Larut Air (SL)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_larut_minyak_ol' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair Larut Minyak (OL)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair Larut Minyak (OL)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_larut_minyak_ol'>Cecair Larut Minyak (OL)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_isipadu_ultrarendah_ul' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair Isipadu Ultrarendah (UL)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair Isipadu Ultrarendah (UL)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_isipadu_ultrarendah_ul'>Cecair Isipadu Ultrarendah (UL)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_teremulsi_ec' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Teremulsi (EC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Teremulsi (EC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_teremulsi_ec'>Pekatan Teremulsi (EC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_mikro-emulsi_me' name='borangA_perawis_perumusan' class='custom-control-input' value='Mikro-emulsi (ME)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Mikro-emulsi (ME)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_mikro-emulsi_me'>Mikro-emulsi (ME)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_emulsi,_minyak_dalam_air_ew' name='borangA_perawis_perumusan' class='custom-control-input' value='Emulsi, Minyak Dalam Air (EW)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Emulsi, Minyak Dalam Air (EW)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_emulsi,_minyak_dalam_air_ew'>Emulsi, Minyak Dalam Air (EW)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_emulsi,_air_dalam_minyak_eo' name='borangA_perawis_perumusan' class='custom-control-input' value='Emulsi, Air Dalam Minyak (EO)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Emulsi, Air Dalam Minyak (EO)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_emulsi,_air_dalam_minyak_eo'>Emulsi, Air Dalam Minyak (EO)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_ampaian_sc' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Ampaian (SC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Ampaian (SC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_ampaian_sc'>Pekatan Ampaian (SC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_ampaian_od' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Ampaian (OD)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Ampaian (OD)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_ampaian_od'>Pekatan Ampaian (OD)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_ampaian_kapsul_cs' name='borangA_perawis_perumusan' class='custom-control-input' value='Ampaian Kapsul (CS)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Ampaian Kapsul (CS)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_ampaian_kapsul_cs'>Ampaian Kapsul (CS)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_terserak_air_dc' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Terserak Air (DC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Terserak Air (DC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_terserak_air_dc'>Pekatan Terserak Air (DC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_ampaian-emulsi_se' name='borangA_perawis_perumusan' class='custom-control-input' value='Ampaian-emulsi (SE)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Ampaian-emulsi (SE)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_ampaian-emulsi_se'>Ampaian-emulsi (SE)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_lingkaran_nyamuk_mc' name='borangA_perawis_perumusan' class='custom-control-input' value='Lingkaran Nyamuk (MC)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Lingkaran Nyamuk (MC)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_lingkaran_nyamuk_mc'>Lingkaran Nyamuk (MC)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_kepingan_meruap_mv' name='borangA_perawis_perumusan' class='custom-control-input' value='Kepingan Meruap (MV)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Kepingan Meruap (MV)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_kepingan_meruap_mv'>Kepingan Meruap (MV)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_aerosol_ae' name='borangA_perawis_perumusan' class='custom-control-input' value='Aerosol (AE)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Aerosol (AE)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_aerosol_ae'>Aerosol (AE)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_meruap_lv' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair Meruap (LV)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair Meruap (LV)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_meruap_lv'>Cecair Meruap (LV)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_serbuk_sentuh_cp' name='borangA_perawis_perumusan' class='custom-control-input' value='Serbuk Sentuh (CP)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Serbuk Sentuh (CP)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_serbuk_sentuh_cp'>Serbuk Sentuh (CP)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_tin_asap_fd' name='borangA_perawis_perumusan' class='custom-control-input' value='Tin Asap (FD)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Tin Asap (FD)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_tin_asap_fd'>Tin Asap (FD)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_gas_ga' name='borangA_perawis_perumusan' class='custom-control-input' value='Gas (GA)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Gas (GA)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_gas_ga'>Gas (GA)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_perekat_pa' name='borangA_perawis_perumusan' class='custom-control-input' value='Perekat (PA)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Perekat (PA)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_perekat_pa'>Perekat (PA)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_titis_sa' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair Titis (SA)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair Titis (SA)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_titis_sa'>Cecair Titis (SA)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_curah_po' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair Curah (PO)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair Curah (PO)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_curah_po'>Cecair Curah (PO)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_umpan_rb' name='borangA_perawis_perumusan' class='custom-control-input' value='Umpan (RB)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Umpan (RB)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_umpan_rb'>Umpan (RB)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_umpan_berbutir_gb' name='borangA_perawis_perumusan' class='custom-control-input' value='Umpan Berbutir (GB)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Umpan Berbutir (GB)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_umpan_berbutir_gb'>Umpan Berbutir (GB)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_umpan_berbungkah_bb' name='borangA_perawis_perumusan' class='custom-control-input' value='Umpan Berbungkah (BB)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Umpan Berbungkah (BB)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_umpan_berbungkah_bb'>Umpan Berbungkah (BB)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_umpan_cb' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Umpan (CB)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Umpan (CB)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_umpan_cb'>Pekatan Umpan (CB)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_gris_gs' name='borangA_perawis_perumusan' class='custom-control-input' value='Gris (GS)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Gris (GS)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_gris_gs'>Gris (GS)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_pekatan_pengabutan_panas_hn' name='borangA_perawis_perumusan' class='custom-control-input' value='Pekatan Pengabutan Panas (HN)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Pekatan Pengabutan Panas (HN)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_pekatan_pengabutan_panas_hn'>Pekatan Pengabutan Panas (HN)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_debu_dp' name='borangA_perawis_perumusan' class='custom-control-input' value='Debu (DP)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Debu (DP)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_debu_dp'>Debu (DP)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_tablet_dt' name='borangA_perawis_perumusan' class='custom-control-input' value='Tablet (DT)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Tablet (DT)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_tablet_dt'>Tablet (DT)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_cecair_al' name='borangA_perawis_perumusan' class='custom-control-input' value='Cecair (AL)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Cecair (AL)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_cecair_al'>Cecair (AL)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_serbuk_ap' name='borangA_perawis_perumusan' class='custom-control-input' value='Serbuk (AP)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Serbuk (AP)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_serbuk_ap'>Serbuk (AP)</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_krim' name='borangA_perawis_perumusan' class='custom-control-input' value='Krim'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Krim' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_krim'>Krim</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_syampu' name='borangA_perawis_perumusan' class='custom-control-input' value='Syampu'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Syampu' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_syampu'>Syampu</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_kapur_tulis' name='borangA_perawis_perumusan' class='custom-control-input' value='Kapur Tulis'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Kapur Tulis' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_kapur_tulis'>Kapur Tulis</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_ceper' name='borangA_perawis_perumusan' class='custom-control-input' value='Ceper'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Ceper' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_ceper'>Ceper</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_until' name='borangA_perawis_perumusan' class='custom-control-input' value='Until'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Until' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_until'>Until</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_relang_leher' name='borangA_perawis_perumusan' class='custom-control-input' value='Relang Leher'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Relang Leher' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_relang_leher'>Relang Leher</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_umpan_lipas_pepejal' name='borangA_perawis_perumusan' class='custom-control-input' value='Umpan Lipas Pepejal'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Umpan Lipas Pepejal' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_umpan_lipas_pepejal'>Umpan Lipas Pepejal</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_gel' name='borangA_perawis_perumusan' class='custom-control-input' value='Gel'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Gel' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_gel'>Gel</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_uncang_butir' name='borangA_perawis_perumusan' class='custom-control-input' value='Uncang Butir'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Uncang Butir' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_uncang_butir'>Uncang Butir</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_umpan_anai-anai' name='borangA_perawis_perumusan' class='custom-control-input' value='Umpan Anai-anai'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Umpan Anai-anai' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_umpan_anai-anai'>Umpan Anai-anai</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_kelambu' name='borangA_perawis_perumusan' class='custom-control-input' value='Kelambu'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Kelambu' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_kelambu'>Kelambu</label>
                                </div>
                                <div class='custom-control custom-radio custom-control-inline'>
                                    <input type='radio' id='borangA_perawis_perumusan_lain-lain_nyatakan' name='borangA_perawis_perumusan' class='custom-control-input' value='Lain-lain (nyatakan)'
                                    {{ old('borangA_perawis_perumusan', isset($borangIds->borangA_perawis_perumusan)?$borangIds->borangA_perawis_perumusan:null) == 'Lain-lain (nyatakan)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    <label class='custom-control-label' for='borangA_perawis_perumusan_lain-lain_nyatakan'>Lain-lain (nyatakan)</label>
                                </div>
                                @error('borangA_perawis_perumusan') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="text" id="borangA_perawis_perumusan_lain" name="borangA_perawis_perumusan_lain" class="form-control custom_border" placeholder="Lain-lain Perumusan" value="{{ old('borangA_perawis_perumusan_lain',isset($borangIds->borangA_perawis_perumusan_lain)?$borangIds->borangA_perawis_perumusan_lain:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_perawis_perumusan_lain') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_perawis_pengilang"><span class="text-danger">*</span>Sumber bagi racun makhluk perosak (Pengilang tpig):</label>
                            <div class="col-md-9">
                                <select class="select2 form-control form-control-sm select2-multiple" name="borangA_perawis_pengilang[]" id="borangA_perawis_pengilang" multiple="multiple" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                    @foreach($pengilangs as $pengilang)
                                        @if(isset($borangIds))
                                            @foreach($borangIds->perawis_pengilangs as $value)
                                                <option value="{{ $pengilang->id }}" {{ old('borangA_perawis_pengilang[]' , isset($value->id)?$value->id:null ) == $pengilang->id ? 'selected' : '' }}>{{ $pengilang->pihak_ketiga_nama }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $pengilang->id }}" {{ old('borangA_perawis_pengilang[]' , isset($value->id)?$value->id:null ) == $pengilang->id ? 'selected' : '' }}>{{ $pengilang->pihak_ketiga_nama }} </option>
                                        @endif
                                    @endforeach
                                </select>  
                                @error('borangA_perawis_pengilang') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <input id="borang_A" type="hidden" value="{{ $jenis }}"/>
                    </section>
                    <h3>Butiran Surat & Sijil</h3>
                    <section>
                        <h5>Maklumat Surat</h5>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_no_rujukan_1">Nombor Rujukan:</label>
                            <div class="col-md-4">
                                <input type="text" id="borangA_surat_no_rujukan_1" name="borangA_surat_no_rujukan_1" class="form-control custom_border" placeholder="Nombor Rujukan 1" value="{{ old('borangA_surat_no_rujukan_1',isset($borangIds->borangA_surat_no_rujukan_1)?$borangIds->borangA_surat_no_rujukan_1:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_no_rujukan_1') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="borangA_surat_no_rujukan_2" name="borangA_surat_no_rujukan_2" class="form-control custom_border" placeholder="Nombor Rujukan 2" value="{{ old('borangA_surat_no_rujukan_2',isset($borangIds->borangA_surat_no_rujukan_2)?$borangIds->borangA_surat_no_rujukan_2:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_no_rujukan_2') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_tarikh">Tarikh Surat:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="borangA_surat_tarikh" type="text" name="borangA_surat_tarikh" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('borangA_surat_tarikh',isset($borangIds->borangA_surat_tarikh)?$borangIds->borangA_surat_tarikh:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_tarikh') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_resit_bayaran">Nombor Resit Bayaran:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_surat_resit_bayaran" name="borangA_surat_resit_bayaran" class="form-control custom_border" placeholder="Nombor Resit Bayaran" value="{{ old('borangA_surat_resit_bayaran',isset($borangIds->borangA_surat_resit_bayaran)?$borangIds->borangA_surat_resit_bayaran:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_resit_bayaran') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_penama">Penama:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_surat_penama" name="borangA_surat_penama" class="form-control custom_border" placeholder="Penama" value="{{ old('borangA_surat_penama',isset($borangIds->borangA_surat_penama)?$borangIds->borangA_surat_penama:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_penama') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_slogan_1">Slogan 1:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_surat_slogan_1" name="borangA_surat_slogan_1" class="form-control custom_border" placeholder="Slogan 1" value="{{ old('borangA_surat_slogan_1',isset($borangIds->borangA_surat_slogan_1)?$borangIds->borangA_surat_slogan_1:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_slogan_1') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_slogan_2">Slogan 2:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_surat_slogan_2" name="borangA_surat_slogan_2" class="form-control custom_border" placeholder="Slogan 2" value="{{ old('borangA_surat_slogan_2',isset($borangIds->borangA_surat_slogan_2)?$borangIds->borangA_surat_slogan_2:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_surat_slogan_2') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_surat_fail">Muat Naik Surat yang Sah:</label>
                            <div class="col-md-9">
                                <input type="file" class="filestyle" data-btnClass="btn-outline-primary" id="borangA_surat_fail" name="borangA_surat_fail">
                                @error('borangA_surat_fail') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <h5 class="mt-md-4">Maklumat Sijil</h5>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_sijil_no_siri">Nombor Siri:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_sijil_no_siri" name="borangA_sijil_no_siri" class="form-control custom_border" placeholder="Nombor Siri" value="{{ old('borangA_sijil_no_siri',isset($borangIds->borangA_sijil_no_siri)?$borangIds->borangA_sijil_no_siri:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_sijil_no_siri') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_sijil_tarikh">Tarikh Sijil:</label>
                            <div class="col-md-9">
                                <input class="form-control custom_border" id="borangA_sijil_tarikh" type="text" name="borangA_sijil_tarikh" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('borangA_sijil_tarikh',isset($borangIds->borangA_sijil_tarikh)?$borangIds->borangA_sijil_tarikh:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_sijil_tarikh') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_sijil_pengerusi">Pengerusi:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_sijil_pengerusi" name="borangA_sijil_pengerusi" class="form-control custom_border" placeholder="Pengerusi" value="{{ old('borangA_sijil_pengerusi',isset($borangIds->borangA_sijil_pengerusi)?$borangIds->borangA_sijil_pengerusi:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_sijil_pengerusi') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_sijil_setiausaha">Setiausaha:</label>
                            <div class="col-md-9">
                                <input type="text" id="borangA_sijil_setiausaha" name="borangA_sijil_setiausaha" class="form-control custom_border" placeholder="Setiausaha" value="{{ old('borangA_sijil_setiausaha',isset($borangIds->borangA_sijil_setiausaha)?$borangIds->borangA_sijil_setiausaha:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                @error('borangA_sijil_setiausaha') 
                                <small class='text-danger'>{{ $message }}</small> 
                                @enderror                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label my-md-0" for="borangA_sijil_fail">Muat Naik Sijil yang Sah:</label>
                            <div class="col-md-9">
                                <input type="file" class="filestyle" data-btnClass="btn-outline-primary" id="borangA_sijil_fail" name="borangA_sijil_fail">
                                @error('borangA_sijil_fail') 
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
    $('input[name="borangA_tarikh_terima_kaunter"]').datepicker();
    $('input[name="borangA_tarikh_terima_kaunter"]').attr("placeholder","Tarikh Terima Kaunter - Pilih dari kalendar");
    $('input[name="borangA_tarikh_lulus"]').datepicker();
    $('input[name="borangA_tarikh_lulus"]').attr("placeholder","Tarikh Lulus - Pilih dari kalendar");
    $('input[name="borangA_tarikh_tamat"]').datepicker();
    $('input[name="borangA_tarikh_tamat"]').attr("placeholder","Tarikh Tamat - Pilih dari kalendar");
    $('input[name="borangA_sijil_tarikh"]').datepicker();
    $('input[name="borangA_sijil_tarikh"]').attr("placeholder","Tarikh Sijil - Pilih dari kalendar");
    $('input[name="borangA_surat_tarikh"]').datepicker();
    $('input[name="borangA_surat_tarikh"]').attr("placeholder","Tarikh Surat - Pilih dari kalendar");

    //  intialize multiselect option using select2 plugin
    $('.select2').select2({
        width:"100%",
        maximumSelectionLength: 4,
    });
    $('#borangA_pengilang_kontrak').select2({
        width:"100%",
        maximumSelectionLength: 10,
    });
    $('#borangA_gudang').select2({
        width:"100%",
        maximumSelectionLength: 5,
    });

    $('#borangA_syarikat').on("change",function() {
        var id = $(this).find(':selected')[0].id;
        // console.log(id);
		var url = "{{URL('form/pendaftaran/getWakil')}}";
		// console.log(url);
        $.ajax({
            url : url +'/'+ id,
            type : "GET",
            datatype: 'json',
            success : function(data) {
                $.each(data.data, function(key, resp) {    
                    $('#borangA_wakil_syarikat').val(resp.syarikat_wakil);
                });
            }  
        });
    });

    $('#borangA_dagangan').on("change",function() {
        var id = $(this).find(':selected')[0].id;
        // console.log(id);
		var url = "{{URL('form/pendaftaran/getNoPendaftaran')}}";
		// console.log(url);
        $.ajax({
            url : url +'/'+ id,
            type : "GET",
            datatype: 'json',
            success : function(data) {
                $.each(data.data, function(key, resp) {
					if(resp.produk_lrmp_r=='R') {
                        $('#borangA_jenis_pendaftaran').val('baru');
                        $('#borangA_jenis_pendaftaran_1').val('baru');
                        $('#borangA_sijil_no_siri').val('B');
                    } else {
                        $('#borangA_jenis_pendaftaran').val('semula');
                        $('#borangA_jenis_pendaftaran_1').val('semula');
                        $('#borangA_sijil_no_siri').val('C');
                    }
                    //$('#borangA_jenis_pendaftaran').val(resp.produk_lrmp_r); 
                    //$('#borangA_jenis_pendaftaran_1').val(resp.produk_lrmp_r);
                    $('#borangA_no_pendaftaran').val(resp.produk_lrmp_r + '/' + resp.produk_lrmp_no);
                });
            }  
        });
    });

});
</script>
@endsection
