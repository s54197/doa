@extends('layouts.app')

@section('title', 'Pembekal')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Pembekal</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Pembekal</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Pembekal</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('pembekal.create') : route('pembekal.update',$pembekals->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_nama"><span class="text-danger">*</span>Nama pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_nama" name="pembekal_nama" class="form-control" placeholder="Nama pembekal" value="{{ old('pembekal_nama',isset($pembekals->pembekal_nama)?$pembekals->pembekal_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_no_roc" name="pembekal_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('pembekal_no_roc',isset($pembekals->pembekal_no_roc)?$pembekals->pembekal_no_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pembekal_alamat"><span class="text-danger">*</span>Alamat pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_bangunan" name="pembekal_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('pembekal_bangunan',isset($pembekals->pembekal_bangunan)?$pembekals->pembekal_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="pembekal_jalan" name="pembekal_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('pembekal_jalan',isset($pembekals->pembekal_jalan)?$pembekals->pembekal_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pembekal_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="pembekal_poskod" name="pembekal_poskod" class="form-control" placeholder="Poskod" value="{{ old('pembekal_poskod',isset($pembekals->pembekal_poskod)?$pembekals->pembekal_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="pembekal_bandar" name="pembekal_bandar" class="form-control" placeholder="Bandar" value="{{ old('pembekal_bandar',isset($pembekals->pembekal_bandar)?$pembekals->pembekal_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="pembekal_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('pembekal_negeri',isset($pembekals->pembekal_surat_negeri)?$pembekals->pembekal_surat_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('pembekal_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_negeri_luar_malaysia"><span class="text-danger">*</span>Negeri (luar malaysia) pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_negeri_luar_malaysia" name="pembekal_negeri_luar_malaysia" class="form-control" placeholder="Negeri (luar malaysia) pembekal" value="{{ old('pembekal_negeri_luar_malaysia',isset($pembekals->pembekal_negeri_luar_malaysia)?$pembekals->pembekal_negeri_luar_malaysia:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_negeri_luar_malaysia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_negara"><span class="text-danger">*</span>Negara pembekal:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="pembekal_negara" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negara...</option>
                                            @foreach($list_negara as $negara)
                                                <option value=" {{ $negara->negara_nama }}" {{ old('pembekal_negara' , isset($pembekals->pembekal_negara)?$pembekals->pembekal_negara:null ) }} >{{ $negara->negara_nama }}</option>
                                            @endforeach
                                        </select>   
                                        @error('pembekal_negara') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_no_tel" name="pembekal_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('pembekal_no_tel',isset($pembekals->pembekal_no_tel)?$pembekals->pembekal_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_no_faks"><span class="text-danger">*</span>Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pembekal_no_faks" name="pembekal_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('pembekal_no_faks',isset($pembekals->pembekal_no_faks)?$pembekals->pembekal_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pembekal_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="pembekal_emel" name="pembekal_emel" class="form-control" placeholder="Emel" value="{{ old('pembekal_emel',isset($pembekals->pembekal_emel)?$pembekals->pembekal_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pembekal_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="pembekal_submit" id="pembekal_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="pembekal_batal" id="pembekal_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.pembekal') }}'" name="pembekal_batal" id="pembekal_batal" class="btn btn-light waves-effect">
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