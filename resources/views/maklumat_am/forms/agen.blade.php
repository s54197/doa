@extends('layouts.app')

@section('title', 'Agen')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Agen</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Agen</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Agen</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('agen.create') : route('agen.update',$agens->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_nama"><span class="text-danger">*</span>Nama agen:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_nama" name="agen_nama" class="form-control" placeholder="Nama Agen" value="{{ old('agen_nama',isset($agens->agen_nama)?$agens->agen_nama:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_ic"><span class="text-danger">*</span>No kad pengenalan agen:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_ic" name="agen_ic" class="form-control" placeholder="No kad pengenalan agen" value="{{ old('agen_ic',isset($agens->agen_ic)?$agens->agen_ic:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_ic') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_syarikat"><span class="text-danger">*</span>Syarikat agen:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_syarikat" name="agen_syarikat" class="form-control" placeholder="Syarikat Agen" value="{{ old('agen_syarikat',isset($agens->agen_syarikat)?$agens->agen_syarikat:null)}}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_syarikat') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_roc" name="agen_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('agen_roc',isset($agens->agen_roc)?$agens->agen_roc:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="agen_alamat"><span class="text-danger">*</span>Alamat agen:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_bangunan" name="agen_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('agen_bangunan',isset($agens->agen_bangunan)?$agens->agen_bangunan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        <input type="text" id="agen_jalan" name="agen_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('agen_jalan',isset($agens->agen_jalan)?$agens->agen_jalan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="agen_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="agen_poskod" name="agen_poskod" class="form-control" placeholder="Poskod" value="{{ old('agen_poskod',isset($agens->agen_poskod)?$agens->agen_poskod:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="agen_bandar" name="agen_bandar" class="form-control" placeholder="Bandar" value="{{ old('agen_bandar',isset($agens->agen_bandar)?$agens->agen_bandar:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="agen_negeri" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('agen_negeri',isset($agens->agen_surat_negeri)?$agens->agen_surat_negeri:null) == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('agen_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_no_tel" name="agen_no_tel" class="form-control" placeholder="Nama telefon" value="{{ old('agen_no_tel',isset($agens->agen_no_tel)?$agens->agen_no_tel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_no_faks"><span class="text-danger">*</span>Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="agen_no_faks" name="agen_no_faks" class="form-control" placeholder="Nombor faks" value="{{ old('agen_no_faks',isset($agens->agen_no_faks)?$agens->agen_no_faks:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="agen_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="agen_emel" name="agen_emel" class="form-control" placeholder="Emel" value="{{ old('agen_emel',isset($agens->agen_emel)?$agens->agen_emel:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('agen_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="agen_submit" id="agen_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }}
                                        </button>
                                        <button type="reset" name="agen_batal" id="agen_batal" class="btn btn-light waves-effect">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.agen') }}'" name="agen_batal" id="agen_batal" class="btn btn-light waves-effect">
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
    $('input[name="agen_tarikh_roc"]').datepicker();
    $('input[name="agen_tarikh_roc"]').attr("placeholder","Tarikh Pendaftaran (ROC) - Pilih dari kalendar");

// copy changes to alamat surat menyurat if checkbox is checked
$("input[name='agen_bangunan']").keyup(function(){
    if ($('#agen_surat').is(":checked")){
        $("input[name='agen_surat_bangunan']").val($(this).val());
    }
});
$("input[name='agen_jalan']").keyup(function(){
    if ($('#agen_surat').is(":checked")){
        $("input[name='agen_surat_jalan']").val($(this).val());
    }
});
$("input[name='agen_poskod']").keyup(function(){
    if ($('#agen_surat').is(":checked")){
        $("input[name='agen_surat_poskod']").val($(this).val());
    }
});
$("input[name='agen_bandar']").keyup(function(){
    if ($('#agen_surat').is(":checked")){
        $("input[name='agen_surat_bandar']").val($(this).val());
    }
});
$("select[name='agen_negeri']").on('change', function(){
    if ($('#agen_surat').is(":checked")){
        $("select[name='agen_surat_negeri']").val($(this).val());
    }
});

// copy to alamat surat menyurat if checkbox is checked
$('#agen_surat').click(function(){
    changeInputReadonly();
});

// everytime page is reloaded check if the same alamat surat-menyurat is checked
changeInputReadonly();

});

function changeInputReadonly(){
    if($('#agen_surat').is(":checked")){
        $("input[name='agen_surat_bangunan']").val($("input[name='agen_bangunan']").val())
                                            .attr('readonly', true);
        $("input[name='agen_surat_jalan']").val($("input[name='agen_jalan']").val())
                                            .attr('readonly', true);
        $("input[name='agen_surat_poskod']").val($("input[name='agen_poskod']").val())
                                            .attr('readonly', true);
        $("input[name='agen_surat_bandar']").val($("input[name='agen_bandar']").val())
                                            .attr('readonly', true);
        $("select[name='agen_surat_negeri']").val($("select[name='agen_negeri'] option:selected").val())
                                            .attr('readonly', true);
    }
    else {     
        $("input[name='agen_surat_bangunan']").attr('readonly', false);
        $("input[name='agen_surat_jalan']").attr('readonly', false);
        $("input[name='agen_surat_poskod']").attr('readonly', false);
        $("input[name='agen_surat_bandar']").attr('readonly', false);
        $("select[name='agen_surat_negeri']").attr('readonly', false);
    }
}
</script>  
@endsection