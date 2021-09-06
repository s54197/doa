@extends('layouts.app')

@section('title', 'Invoicing')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Invoicing</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Invoicing</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Invoicing</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('penginvoisan.create') : route('penginvoisan.update',$penginvoisans->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_nama"><span class="text-danger">*</span>Nama Invoicing:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_nama" name="penginvoisan_nama" class="form-control" placeholder="Nama penginvoisan" value="{{ old('penginvoisan_nama',isset($penginvoisans->penginvoisan_nama)?$penginvoisans->penginvoisan_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_no_roc" name="penginvoisan_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('penginvoisan_no_roc',isset($penginvoisans->penginvoisan_no_roc)?$penginvoisans->penginvoisan_no_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_alamat"><span class="text-danger">*</span>Alamat penginvoisan:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_bangunan" name="penginvoisan_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('penginvoisan_bangunan',isset($penginvoisans->penginvoisan_bangunan)?$penginvoisans->penginvoisan_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="penginvoisan_jalan" name="penginvoisan_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('penginvoisan_jalan',isset($penginvoisans->penginvoisan_jalan)?$penginvoisans->penginvoisan_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="penginvoisan_poskod" name="penginvoisan_poskod" class="form-control" placeholder="Poskod" value="{{ old('penginvoisan_poskod',isset($penginvoisans->penginvoisan_poskod)?$penginvoisans->penginvoisan_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="penginvoisan_bandar" name="penginvoisan_bandar" class="form-control" placeholder="Bandar" value="{{ old('penginvoisan_bandar',isset($penginvoisans->penginvoisan_bandar)?$penginvoisans->penginvoisan_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="penginvoisan_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('penginvoisan_negeri',isset($penginvoisans->penginvoisan_negeri)?$penginvoisans->penginvoisan_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('penginvoisan_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_negeri_luar_malaysia">Negeri (luar malaysia) penginvoisan:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_negeri_luar_malaysia" name="penginvoisan_negeri_luar_malaysia" class="form-control" placeholder="Negeri (luar malaysia) penginvoisan" value="{{ old('penginvoisan_negeri_luar_malaysia',isset($penginvoisans->penginvoisan_negeri_luar_malaysia)?$penginvoisans->penginvoisan_negeri_luar_malaysia:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_negeri_luar_malaysia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_negara"><span class="text-danger">*</span>Negara penginvoisan:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="penginvoisan_negara" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negara...</option>
                                            @foreach($list_negara as $negara)
                                                <option value="{{ $negara->negara_nama }}" {{ old('penginvoisan_negara' , isset($penginvoisans->penginvoisan_negara)?$penginvoisans->penginvoisan_negara:null ) == $negara->negara_nama ? 'selected' : '' }} >{{ $negara->negara_nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('penginvoisan_negara') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_no_tel" name="penginvoisan_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('penginvoisan_no_tel',isset($penginvoisans->penginvoisan_no_tel)?$penginvoisans->penginvoisan_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_no_faks">Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="penginvoisan_no_faks" name="penginvoisan_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('penginvoisan_no_faks',isset($penginvoisans->penginvoisan_no_faks)?$penginvoisans->penginvoisan_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="penginvoisan_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="penginvoisan_emel" name="penginvoisan_emel" class="form-control" placeholder="Emel" value="{{ old('penginvoisan_emel',isset($penginvoisans->penginvoisan_emel)?$penginvoisans->penginvoisan_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('penginvoisan_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="penginvoisan_submit" id="penginvoisan_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="penginvoisan_batal" id="penginvoisan_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.penginvoisan') }}'" name="penginvoisan_batal" id="penginvoisan_batal" class="btn btn-light waves-effect">
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // search poskod in DB
    $("input[name='penginvoisan_poskod']").on('blur', function(){
        // alert(poskod = $(this).val());
        $.ajax({
            url : "{{ route('poskod.info') }}",
            type : "post",
            data: {'poskod': $(this).val()},
            datatype: 'json',
            // beforeSend: function() {
            //     $('#spinner_confirm_delete').show();
            // },
            success : function(data) {
                // $('#spinner_confirm_delete').hide();
                console.log(data);
                if (data.length>0){
                    $("input[name='penginvoisan_bandar']").val(data[0].bandar);
                    $("select[name='penginvoisan_negeri']").val(data[0].negeri);
                    $("select[name='penginvoisan_negara']").val('Malaysia');
                }
                else {
                    $("input[name='penginvoisan_bandar']").val('');
                    $("select[name='penginvoisan_negeri']").val('');
                    $("select[name='penginvoisan_negara']").val('');
                }
                // alert(data);
            }  
        });
    });
});
</script>  
@endsection