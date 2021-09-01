@extends('layouts.app')

@section('title', 'Pengilang')

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
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Pengilang</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('pengilang.create') : route('pengilang.update',$pengilangs->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_nama"><span class="text-danger">*</span>Nama pengilang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_nama" name="pengilang_nama" class="form-control" placeholder="Nama pengilang" value="{{ old('pengilang_nama',isset($pengilangs->pengilang_nama)?$pengilangs->pengilang_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_no_roc" name="pengilang_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('pengilang_no_roc',isset($pengilangs->pengilang_no_roc)?$pengilangs->pengilang_no_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pengilang_alamat"><span class="text-danger">*</span>Alamat pengilang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_bangunan" name="pengilang_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('pengilang_bangunan',isset($pengilangs->pengilang_bangunan)?$pengilangs->pengilang_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="pengilang_jalan" name="pengilang_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('pengilang_jalan',isset($pengilangs->pengilang_jalan)?$pengilangs->pengilang_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pengilang_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="pengilang_poskod" name="pengilang_poskod" class="form-control" placeholder="Poskod" value="{{ old('pengilang_poskod',isset($pengilangs->pengilang_poskod)?$pengilangs->pengilang_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="pengilang_bandar" name="pengilang_bandar" class="form-control" placeholder="Bandar" value="{{ old('pengilang_bandar',isset($pengilangs->pengilang_bandar)?$pengilangs->pengilang_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="pengilang_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('pengilang_negeri',isset($pengilangs->pengilang_surat_negeri)?$pengilangs->pengilang_surat_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('pengilang_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_negeri_luar_malaysia"><span class="text-danger">*</span>Negeri (luar malaysia) pengilang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_negeri_luar_malaysia" name="pengilang_negeri_luar_malaysia" class="form-control" placeholder="Negeri (luar malaysia) pengilang" value="{{ old('pengilang_negeri_luar_malaysia',isset($pengilangs->pengilang_negeri_luar_malaysia)?$pengilangs->pengilang_negeri_luar_malaysia:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_negeri_luar_malaysia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_negara"><span class="text-danger">*</span>Negara pengilang:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="pengilang_negara" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negara...</option>
                                            @foreach($list_negara as $negara)
                                                <option value=" {{ $negara->negara_nama }}" {{ old('pengilang_negara' , isset($pengilangs->pengilang_negara)?$pengilangs->pengilang_negara:null ) == $negara->negara_nama ? 'selected' : '' }} >{{ $negara->negara_nama }}</option>
                                            @endforeach
                                        </select>   
                                        @error('pengilang_negara') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_no_tel" name="pengilang_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('pengilang_no_tel',isset($pengilangs->pengilang_no_tel)?$pengilangs->pengilang_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_no_faks"><span class="text-danger">*</span>Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pengilang_no_faks" name="pengilang_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('pengilang_no_faks',isset($pengilangs->pengilang_no_faks)?$pengilangs->pengilang_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pengilang_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="pengilang_emel" name="pengilang_emel" class="form-control" placeholder="Emel" value="{{ old('pengilang_emel',isset($pengilangs->pengilang_emel)?$pengilangs->pengilang_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pengilang_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="pengilang_submit" id="pengilang_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }}
                                        </button>
                                        <button type="reset" name="pengilang_batal" id="pengilang_batal" class="btn btn-light waves-effect">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.pengilang') }}'" name="pengilang_batal" id="pengilang_batal" class="btn btn-light waves-effect">
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
   

</script>  
@endsection