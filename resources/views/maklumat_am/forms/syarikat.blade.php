@extends('layouts.app')

@section('title', 'Syarikat')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Syarikat</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Syarikat</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">Pendaftaran Syarikat</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ route('syarikat.create') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_nama"><span class="text-danger">*</span>Nama syarikat:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_nama" name="syarikat_nama" class="form-control" placeholder="Nama Syarikat" value="{{ old('syarikat_nama') }}">
                                        @error('syarikat_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_no_roc"><span class="text-danger">*</span>Nombor pendaftaran (ROC):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_no_roc" name="syarikat_no_roc" class="form-control" placeholder="Nombor Pendaftaran (ROC)" value="{{ old('syarikat_no_roc') }}">
                                        @error('syarikat_no_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_tarikh_roc"><span class="text-danger">*</span>Tarikh pendaftaran (ROC)</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="syarikat_tarikh_roc" type="text" name="syarikat_tarikh_roc" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('syarikat_tarikh_roc') }}">
                                        @error('syarikat_tarikh_roc') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="syarikat_alamat"><span class="text-danger">*</span>Alamat syarikat:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_bangunan" name="syarikat_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('syarikat_bangunan') }}">
                                        <input type="text" id="syarikat_jalan" name="syarikat_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('syarikat_jalan') }}">
                                        @error('syarikat_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-0 mt-sm-2 mb-0 mb-sm-2">
                                    <label class="col-md-3 col-form-label" for="syarikat_alamat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="syarikat_poskod" name="syarikat_poskod" class="form-control" placeholder="Poskod" 
                                        value="{{ old('syarikat_poskod') }}">
                                        @error('syarikat_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="syarikat_bandar" name="syarikat_bandar" class="form-control" placeholder="Bandar" value="{{ old('syarikat_bandar') }}">
                                        @error('syarikat_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="syarikat_negeri">
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('syarikat_negeri') == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('syarikat_negeri') == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('syarikat_negeri') == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('syarikat_negeri') == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('syarikat_negeri') == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('syarikat_negeri') == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('syarikat_negeri') == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('syarikat_negeri') == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('syarikat_negeri') == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('syarikat_negeri') == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('syarikat_negeri') == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('syarikat_negeri') == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('syarikat_negeri') == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('syarikat_negeri') == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('syarikat_negeri') == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('syarikat_negeri') == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('syarikat_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mb-sm-2">
                                    <div class="col-md-8 offset-md-3 col-12 pl-4 pl-sm-2">
                                        <div class="checkbox checkbox-primary">
                                            <input id="syarikat_surat" name="syarikat_surat" type="checkbox" value="alamat_sama" {{ old('syarikat_surat') == "alamat_sama" ? 'checked' : '' }}>
                                            <label for="syarikat_surat">
                                                Alamat yang sama untuk urusan surat-menyurat
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-sm-2 mb-0">
                                    <label class="col-md-3 col-form-label" for="syarikat_surat"><span class="text-danger">*</span>Alamat syarikat (surat-menyurat):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_bangunan" name="syarikat_surat_bangunan" class="form-control" placeholder="Bangunan" value="{{ old('syarikat_surat_bangunan') }}">
                                        <input type="text" id="syarikat_surat_jalan" name="syarikat_surat_jalan" class="form-control mt-2" placeholder="Jalan" value="{{ old('syarikat_surat_jalan') }}">
                                        @error('syarikat_surat_bangunan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_surat_tambahan"></label>
                                    <div class="col-md-2 mb-2 mb-sm-0">
                                        <input type="number" id="syarikat_surat_poskod" name="syarikat_surat_poskod" class="form-control" placeholder="Poskod" value="{{ old('syarikat_surat_poskod') }}">
                                        @error('syarikat_surat_poskod') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3 mb-2 mb-sm-0">
                                        <input type="text" id="syarikat_surat_bandar" name="syarikat_surat_bandar" class="form-control" placeholder="Bandar" value="{{ old('syarikat_surat_bandar') }}">
                                        @error('syarikat_surat_bandar') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="syarikat_surat_negeri">
                                            <option value="">Pilih Negeri...</option>
                                            <option value="Johor" {{ old('syarikat_surat_negeri') == "Johor" ? 'selected' : '' }}>Johor</option>
                                            <option value="Melaka" {{ old('syarikat_surat_negeri') == "Melaka" ? 'selected' : '' }}>Melaka</option>
                                            <option value="Negeri Sembilan" {{ old('syarikat_surat_negeri') == "Negeri Sembilan" ? 'selected' : '' }}>Negeri Sembilan</option>
                                            <option value="Selangor" {{ old('syarikat_surat_negeri') == "Selangor" ? 'selected' : '' }}>Selangor</option>
                                            <option value="Wilayah Persekutuan Putrajaya, Selangor" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Putrajaya, Selangor" ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya, Selangor</option>
                                            <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Kuala Lumpur" ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                            <option value="Pahang" {{ old('syarikat_surat_negeri') == "Pahang" ? 'selected' : '' }}>Pahang</option>
                                            <option value="Terengganu" {{ old('syarikat_surat_negeri') == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                                            <option value="Kelantan" {{ old('syarikat_surat_negeri') == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                                            <option value="Perak" {{ old('syarikat_surat_negeri') == "Perak" ? 'selected' : '' }}>Perak</option>
                                            <option value="Kedah" {{ old('syarikat_surat_negeri') == "Kedah" ? 'selected' : '' }}>Kedah</option>
                                            <option value="Perlis" {{ old('syarikat_surat_negeri') == "Perlis" ? 'selected' : '' }}>Perlis</option>
                                            <option value="Pulau Pinang" {{ old('syarikat_surat_negeri') == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                                            <option value="Sabah" {{ old('syarikat_surat_negeri') == "Sabah" ? 'selected' : '' }}>Sabah</option>
                                            <option value="Sarawak" {{ old('syarikat_surat_negeri') == "Sarawak" ? 'selected' : '' }}>Sarawak</option>
                                            <option value="Wilayah Persekutuan Labuan, Sabah" {{ old('syarikat_surat_negeri') == "Wilayah Persekutuan Labuan, Sabah" ? 'selected' : '' }}>Wilayah Persekutuan Labuan, Sabah</option>
                                        </select>                                    
                                        @error('syarikat_surat_negeri') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_no_tel"><span class="text-danger">*</span>Nombor telefon:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_no_tel" name="syarikat_no_tel" class="form-control" placeholder="Nama Syarikat" value="{{ old('syarikat_no_tel') }}">
                                        @error('syarikat_no_tel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_no_faks"><span class="text-danger">*</span>Nombor faks:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_no_faks" name="syarikat_no_faks" class="form-control" placeholder="Nombor telefon" value="{{ old('syarikat_no_faks') }}">
                                        @error('syarikat_no_faks') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_emel"><span class="text-danger">*</span>Emel:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="syarikat_emel" name="syarikat_emel" class="form-control" placeholder="Emel" value="{{ old('syarikat_emel') }}">
                                        @error('syarikat_emel') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="syarikat_wakil">Nama wakil yang dibenarkan:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_wakil" name="syarikat_wakil" class="form-control" placeholder="Nama wakil" value="{{ old('syarikat_wakil') }}">
                                        @error('syarikat_wakil') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        <button type="submit" name="syarikat_submit" id="syarikat_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Daftar
                                        </button>
                                        <button type="reset" name="syarikat_batal" id="syarikat_batal" class="btn btn-light waves-effect">
                                            Batal
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
    $('input[name="syarikat_tarikh_roc"]').datepicker();
    $('input[name="syarikat_tarikh_roc"]').attr("placeholder","Tarikh Pendaftaran (ROC) - Pilih dari kalendar");

// copy changes to alamat surat menyurat if checkbox is checked
$("input[name='syarikat_bangunan']").keyup(function(){
    if ($('#syarikat_surat').is(":checked")){
        $("input[name='syarikat_surat_bangunan']").val($(this).val());
    }
});
$("input[name='syarikat_jalan']").keyup(function(){
    if ($('#syarikat_surat').is(":checked")){
        $("input[name='syarikat_surat_jalan']").val($(this).val());
    }
});
$("input[name='syarikat_poskod']").keyup(function(){
    if ($('#syarikat_surat').is(":checked")){
        $("input[name='syarikat_surat_poskod']").val($(this).val());
    }
});
$("input[name='syarikat_bandar']").keyup(function(){
    if ($('#syarikat_surat').is(":checked")){
        $("input[name='syarikat_surat_bandar']").val($(this).val());
    }
});
$("select[name='syarikat_negeri']").on('change', function(){
    if ($('#syarikat_surat').is(":checked")){
        $("select[name='syarikat_surat_negeri']").val($(this).val());
    }
});

// copy to alamat surat menyurat if checkbox is checked
$('#syarikat_surat').click(function(){
    changeInputReadonly();
});

// everytime page is reloaded check if the same alamat surat-menyurat is checked
changeInputReadonly();

});

function changeInputReadonly(){
    if($('#syarikat_surat').is(":checked")){
        $("input[name='syarikat_surat_bangunan']").val($("input[name='syarikat_bangunan']").val())
                                            .attr('readonly', true);
        $("input[name='syarikat_surat_jalan']").val($("input[name='syarikat_jalan']").val())
                                            .attr('readonly', true);
        $("input[name='syarikat_surat_poskod']").val($("input[name='syarikat_poskod']").val())
                                            .attr('readonly', true);
        $("input[name='syarikat_surat_bandar']").val($("input[name='syarikat_bandar']").val())
                                            .attr('readonly', true);
        $("select[name='syarikat_surat_negeri']").val($("select[name='syarikat_negeri'] option:selected").val())
                                            .attr('readonly', true);
    }
    else {     
        $("input[name='syarikat_surat_bangunan']").attr('readonly', false);
        $("input[name='syarikat_surat_jalan']").attr('readonly', false);
        $("input[name='syarikat_surat_poskod']").attr('readonly', false);
        $("input[name='syarikat_surat_bandar']").attr('readonly', false);
        $("select[name='syarikat_surat_negeri']").attr('readonly', false);
    }
}
</script>  
@endsection