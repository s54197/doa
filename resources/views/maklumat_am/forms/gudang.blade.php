@extends('layouts.app')

@section('title', 'Gudang')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Gudang</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Gudang</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Gudang</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('gudang.create') : route('gudang.update',$gudangs->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_nama"><span class="text-danger">*</span>Nama gudang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_nama" name="gudang_nama" class="form-control" placeholder="Nama gudang" value="{{ old('gudang_nama',isset($gudangs->gudang_nama)?$gudangs->gudang_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_no_roc" name="gudang_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('gudang_no_roc',isset($gudangs->gudang_no_roc)?$gudangs->gudang_no_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="gudang_alamat"><span class="text-danger">*</span>Alamat gudang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_bangunan" name="gudang_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('gudang_bangunan',isset($gudangs->gudang_bangunan)?$gudangs->gudang_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="gudang_jalan" name="gudang_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('gudang_jalan',isset($gudangs->gudang_jalan)?$gudangs->gudang_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="gudang_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="gudang_poskod" name="gudang_poskod" class="form-control" placeholder="Poskod" value="{{ old('gudang_poskod',isset($gudangs->gudang_poskod)?$gudangs->gudang_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="gudang_bandar" name="gudang_bandar" class="form-control" placeholder="Bandar" value="{{ old('gudang_bandar',isset($gudangs->gudang_bandar)?$gudangs->gudang_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="gudang_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('gudang_negeri',isset($gudangs->gudang_negeri)?$gudangs->gudang_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('gudang_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_negeri_luar_malaysia">Negeri (luar malaysia) gudang:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_negeri_luar_malaysia" name="gudang_negeri_luar_malaysia" class="form-control" placeholder="Negeri (luar malaysia) gudang" value="{{ old('gudang_negeri_luar_malaysia',isset($gudangs->gudang_negeri_luar_malaysia)?$gudangs->gudang_negeri_luar_malaysia:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_negeri_luar_malaysia') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_negara"><span class="text-danger">*</span>Negara gudang:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="gudang_negara" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negara...</option>
                                            @foreach($list_negara as $negara)
                                                <option value="{{ $negara->negara_nama }}" {{ old('gudang_negara' , isset($gudangs->gudang_negara)?$gudangs->gudang_negara:null ) == $negara->negara_nama ? 'selected' : '' }} >{{ $negara->negara_nama }}</option>
                                            @endforeach
                                        </select>   
                                        @error('gudang_negara') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_no_tel" name="gudang_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('gudang_no_tel',isset($gudangs->gudang_no_tel)?$gudangs->gudang_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_no_faks">Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="gudang_no_faks" name="gudang_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('gudang_no_faks',isset($gudangs->gudang_no_faks)?$gudangs->gudang_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="gudang_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="gudang_emel" name="gudang_emel" class="form-control" placeholder="Emel" value="{{ old('gudang_emel',isset($gudangs->gudang_emel)?$gudangs->gudang_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('gudang_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="gudang_submit" id="gudang_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="gudang_batal" id="gudang_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.gudang') }}'" name="gudang_batal" id="gudang_batal" class="btn btn-light waves-effect">
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
    $("input[name='gudang_poskod']").on('blur', function(){
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
                    $("input[name='gudang_bandar']").val(data[0].bandar);
                    $("select[name='gudang_negeri']").val(data[0].negeri);
                    $("select[name='gudang_negara']").val('Malaysia');
                }
                else {
                    $("input[name='gudang_bandar']").val('');
                    $("select[name='gudang_negeri']").val('');
                    $("select[name='gudang_negara']").val('');
                }
                // alert(data);
            }  
        });
    });
    
    $("#gudang_no_tel, #gudang_no_faks").keyup(function(){
        $(this).val($(this).val().replace('-','').replace(' ',''));
    })

});
</script>  
@endsection
