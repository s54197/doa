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
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_nama"><span class="text-danger">*</span>Nama pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_nama" name="pihak_ketiga_nama" class="form-control" placeholder="Nama pembekal" value="{{ old('pihak_ketiga_nama',isset($pembekals->pihak_ketiga_nama)?$pembekals->pihak_ketiga_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_no_roc" name="pihak_ketiga_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('pihak_ketiga_no_roc',isset($pembekals->pihak_ketiga_no_roc)?$pembekals->pihak_ketiga_no_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_alamat"><span class="text-danger">*</span>Alamat pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_bangunan" name="pihak_ketiga_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('pihak_ketiga_bangunan',isset($pembekals->pihak_ketiga_bangunan)?$pembekals->pihak_ketiga_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="pihak_ketiga_jalan" name="pihak_ketiga_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('pihak_ketiga_jalan',isset($pembekals->pihak_ketiga_jalan)?$pembekals->pihak_ketiga_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="pihak_ketiga_poskod" name="pihak_ketiga_poskod" class="form-control" placeholder="Poskod" value="{{ old('pihak_ketiga_poskod',isset($pembekals->pihak_ketiga_poskod)?$pembekals->pihak_ketiga_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="pihak_ketiga_bandar" name="pihak_ketiga_bandar" class="form-control" placeholder="Bandar" value="{{ old('pihak_ketiga_bandar',isset($pembekals->pihak_ketiga_bandar)?$pembekals->pihak_ketiga_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="pihak_ketiga_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('pihak_ketiga_negeri',isset($pembekals->pihak_ketiga_negeri)?$pembekals->pihak_ketiga_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('pihak_ketiga_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_negeri_luar_malaysia">Negeri (luar malaysia) pembekal:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_negeri_luar_malaysia" name="pihak_ketiga_negeri_luar_malaysia" class="form-control" placeholder="Negeri (luar malaysia) pembekal" value="{{ old('pihak_ketiga_negeri_luar_malaysia',isset($pembekals->pihak_ketiga_negeri_luar_malaysia)?$pembekals->pihak_ketiga_negeri_luar_malaysia:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_negeri_luar_malaysia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_negara"><span class="text-danger">*</span>Negara pembekal:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="pihak_ketiga_negara" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negara...</option>
                                            @foreach($list_negara as $negara)
                                                <option value="{{ $negara->negara_nama }}" {{ old('pihak_ketiga_negara' , isset($pembekals->pihak_ketiga_negara)?$pembekals->pihak_ketiga_negara:null ) == $negara->negara_nama ? 'selected' : '' }} >{{ $negara->negara_nama }}</option>
                                            @endforeach
                                        </select>   
                                        @error('pihak_ketiga_negara') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_no_tel" name="pihak_ketiga_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('pihak_ketiga_no_tel',isset($pembekals->pihak_ketiga_no_tel)?$pembekals->pihak_ketiga_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_no_faks">Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="pihak_ketiga_no_faks" name="pihak_ketiga_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('pihak_ketiga_no_faks',isset($pembekals->pihak_ketiga_no_faks)?$pembekals->pihak_ketiga_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="pihak_ketiga_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="pihak_ketiga_emel" name="pihak_ketiga_emel" class="form-control" placeholder="Emel" value="{{ old('pihak_ketiga_emel',isset($pembekals->pihak_ketiga_emel)?$pembekals->pihak_ketiga_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('pihak_ketiga_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="pihak_ketiga_submit" id="pihak_ketiga_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="pihak_ketiga_batal" id="pihak_ketiga_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.pembekal') }}'" name="pihak_ketiga_batal" id="pihak_ketiga_batal" class="btn btn-light waves-effect">
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
$("input[name='pihak_ketiga_poskod']").on('blur', function(){
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
                    $("input[name='pihak_ketiga_bandar']").val(data[0].bandar);
                    $("select[name='pihak_ketiga_negeri']").val(data[0].negeri);
                    $("select[name='pihak_ketiga_negara']").val('Malaysia');
                }
                else {
                    $("input[name='pihak_ketiga_bandar']").val('');
                    $("select[name='pihak_ketiga_negeri']").val('');
                    $("select[name='pihak_ketiga_negara']").val('');
                }
                // alert(data);
            }  
        });
    });
    
    

    $("#pihak_ketiga_no_tel, #pihak_ketiga_no_faks").keyup(function(){
        $(this).val($(this).val().replace('-','').replace(' ',''));
    })
});
</script>  
@endsection
