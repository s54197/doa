@extends('layouts.app')

@section('title', 'Produk')

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Produk</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        <li class="breadcrumb-item"><a href="#">Rekod Maklumat Am</a></li>
        <li class="breadcrumb-item active">Produk</li>
    </ol>
</li>
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box px-4">
                <h4 class="header-title">{{$tajuk}} Produk</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" action="{{ $jenis == 'new' ? route('produk.create') : route('produk.update',$produks->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_nama"><span class="text-danger">*</span>Nama Produk:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_nama" name="produk_nama" class="form-control" placeholder="Nama Produk" value="{{ old('produk_nama',isset($produks->produk_nama)?$produks->produk_nama:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_lrmp"><span class="text-danger">*</span>LRMP:</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="produk_lrmp_r" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Nilai R...</option>
                                            <option value='R1' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R1' ? 'selected' : '' }}>R1</option>
                                            <option value='R2' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R2' ? 'selected' : '' }}>R2</option>
                                            <option value='R3' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R3' ? 'selected' : '' }}>R3</option>
                                            <option value='R4' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R4' ? 'selected' : '' }}>R4</option>
                                            <option value='R5' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R5' ? 'selected' : '' }}>R5</option>
                                            <option value='R6' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R6' ? 'selected' : '' }}>R6</option>
                                            <option value='R7' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R7' ? 'selected' : '' }}>R7</option>
                                            <option value='R8' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R8' ? 'selected' : '' }}>R8</option>
                                            <option value='R9' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R9' ? 'selected' : '' }}>R9</option>
                                            <option value='R10' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R10' ? 'selected' : '' }}>R10</option>
                                            <option value='R11' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R11' ? 'selected' : '' }}>R11</option>
                                            <option value='R12' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R12' ? 'selected' : '' }}>R12</option>
                                            <option value='R13' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R13' ? 'selected' : '' }}>R13</option>
                                            <option value='R14' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R14' ? 'selected' : '' }}>R14</option>
                                            <option value='R15' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R15' ? 'selected' : '' }}>R15</option>
                                            <option value='R16' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R16' ? 'selected' : '' }}>R16</option>
                                            <option value='R17' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R17' ? 'selected' : '' }}>R17</option>
                                            <option value='R18' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R18' ? 'selected' : '' }}>R18</option>
                                            <option value='R19' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R19' ? 'selected' : '' }}>R19</option>
                                            <option value='R20' {{ old('produk_lrmp_r',isset($produks->produk_lrmp_r)?$produks->produk_lrmp_r:null) == 'R20' ? 'selected' : '' }}>R20</option>
                                        </select>
                                        @error('produk_lrmp_r') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="produk_lrmp_no" name="produk_lrmp_no" class="form-control" placeholder="Nombor LRMP" value="{{ old('produk_lrmp_no',isset($produks->produk_lrmp_no)?$produks->produk_lrmp_no:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_lrmp_no') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_no_fail"><span class="text-danger">*</span>Nombor Fail:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="produk_no_fail" name="produk_no_fail" class="form-control" placeholder="Nombor Fail" value="{{ old('produk_no_fail',isset($produks->produk_no_fail)?$produks->produk_no_fail:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_no_fail') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_gazet"><span class="text-danger">*</span>Tarikh Gazet:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_gazet" type="text" name="produk_tarikh_gazet" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_gazet',isset($produks->produk_tarikh_gazet)?$produks->produk_tarikh_gazet:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_tarikh_gazet') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_tamat"><span class="text-danger">*</span>Tarikh Tamat:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_tamat" type="text" name="produk_tarikh_tamat" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_tamat',isset($produks->produk_tarikh_tamat)?$produks->produk_tarikh_tamat:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_tarikh_tamat') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_penwartaan"><span class="text-danger">*</span>Tarikh Penwartaan:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_penwartaan" type="text" name="produk_tarikh_penwartaan" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_penwartaan',isset($produks->produk_tarikh_penwartaan)?$produks->produk_tarikh_penwartaan:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_tarikh_penwartaan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_kelas_racun"><span class="text-danger">*</span>Kelas Racun:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="produk_kelas_racun" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Kelas Racun...</option>
                                            <option value='1a' {{ old('produk_kelas_racun',isset($produks->produk_kelas_racun)?$produks->produk_kelas_racun:null) == '1a' ? 'selected' : '' }}>1a</option>
                                            <option value='1b' {{ old('produk_kelas_racun',isset($produks->produk_kelas_racun)?$produks->produk_kelas_racun:null) == '1b' ? 'selected' : '' }}>1b</option>
                                            <option value='II' {{ old('produk_kelas_racun',isset($produks->produk_kelas_racun)?$produks->produk_kelas_racun:null) == 'II' ? 'selected' : '' }}>II</option>
                                            <option value='III' {{ old('produk_kelas_racun',isset($produks->produk_kelas_racun)?$produks->produk_kelas_racun:null) == 'III' ? 'selected' : '' }}>III</option>
                                            <option value='IV' {{ old('produk_kelas_racun',isset($produks->produk_kelas_racun)?$produks->produk_kelas_racun:null) == 'IV' ? 'selected' : '' }}>IV</option>
                                        </select>
                                        @error('produk_kelas_racun') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label my-md-0" for="produk_categori"><span class="text-danger">*</span>Kategori:</label>
                                    <div class="col-md-8 pt-md-2">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='pertanian' name='produk_categori'  value='Pertanian'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Pertanian' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='pertanian'>Pertanian</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='isi-rumah' name='produk_categori'  value='Isi rumah'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Isi rumah' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='isi-rumah'>Isi rumah</label>
                                                </div>                                      
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='kesihatan-awam' name='produk_categori'  value='Kesihatan Awam'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Kesihatan Awam' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='kesihatan-awam'>Kesihatan Awam</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='perindustrian' name='produk_categori'  value='Perindustrian'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Perindustrian' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='perindustrian'>Perindustrian</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='veterinar' name='produk_categori'  value='Veterinar'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Veterinar' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='veterinar'>Veterinar</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='perkilangan' name='produk_categori'  value='Perkilangan'
                                                    {{ old('produk_categori', isset($produks->produk_categori)?$produks->produk_categori:null) == 'Perkilangan' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='perkilangan'>Perkilangan</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='lain-lain-nyatakan' name='produk_categori'  value='Lain-lain (nyatakan)'
                                                    {{ old('produk_categori',isset($produks->produk_categori)?$produks->produk_categori:null) == 'Lain-lain (nyatakan)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='lain-lain-nyatakan'>Lain-lain (nyatakan)</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('produk_categori') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                          
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="text" id="produk_categori_lain" name="produk_categori_lain" class="form-control custom_border" placeholder="Maklumat lain-lain" value="{{ old('produk_categori_lain') }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_categori_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label my-md-0" for="produk_kegunaan"><span class="text-danger">*</span>Kegunaan:</label>
                                    <div class="col-md-8 pt-md-2">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-rumpai' name='produk_kegunaan'  value='Racun rumpai'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun rumpai' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-rumpai'>Racun rumpai</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-serangga' name='produk_kegunaan'  value='Racun serangga'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun serangga' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-serangga'>Racun serangga</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-kulat' name='produk_kegunaan'  value='Racun kulat'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun kulat' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-kulat'>Racun kulat</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-hamama' name='produk_kegunaan'  value='Racun hamama'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun hamama' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-hamama'>Racun hamama</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-nematod' name='produk_kegunaan'  value='Racun nematod'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun nematod' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-nematod'>Racun nematod</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-tikus' name='produk_kegunaan'  value='Racun tikus'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun tikus' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-tikus'>Racun tikus</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-siput' name='produk_kegunaan'  value='Racun siput'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun siput' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-siput'>Racun siput</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-bakteria' name='produk_kegunaan'  value='Racun bakteria'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun bakteria' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-bakteria'>Racun bakteria</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">                                        
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='fumigan' name='produk_kegunaan'  value='Fumigan'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Fumigan' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='fumigan'>Fumigan</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='fumigan-tanah' name='produk_kegunaan'  value='Fumigan tanah'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Fumigan tanah' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='fumigan-tanah'>Fumigan tanah</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-kutu/pinjal' name='produk_kegunaan'  value='Racun kutu/pinjal'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun kutu/pinjal' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-kutu/pinjal'>Racun kutu/pinjal</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='pengawet' name='produk_kegunaan'  value='Pengawet'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Pengawet' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='pengawet'>Pengawet</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='penghalau' name='produk_kegunaan'  value='Penghalau'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Penghalau' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='penghalau'>Penghalau</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='racun-anai-anai' name='produk_kegunaan'  value='Racun anai-anai'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Racun anai-anai' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='racun-anai-anai'>Racun anai-anai</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='bahan-teknikal-untuk-tujuan-perkilangan-sahaja' name='produk_kegunaan'  value='Bahan teknikal untuk tujuan perkilangan sahaja'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Bahan teknikal untuk tujuan perkilangan sahaja' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='bahan-teknikal-untuk-tujuan-perkilangan-sahaja'>Bahan teknikal untuk tujuan perkilangan sahaja</label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <input type='radio' id='lain-lain-nyatakan-kegunaan' name='produk_kegunaan'  value='Lain-lain (nyatakan)'
                                                    {{ old('produk_kegunaan', isset($produks->produk_kegunaan)?$produks->produk_kegunaan:null) == 'Lain-lain (nyatakan)' ? 'checked' : '' }} {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                                    <label  for='lain-lain-nyatakan-kegunaan'>Lain-lain (nyatakan)</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('produk_kegunaan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror                                    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="text" id="produk_kegunaan_lain" name="produk_kegunaan_lain" class="form-control custom_border" placeholder="Maklumat lain-lain" value="{{ old('produk_kegunaan_lain',isset($produks->produk_kegunaan_lain)?$produks->produk_kegunaan_lain:null) }}">
                                        @error('produk_kegunaan_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz"><span class="text-danger">*</span>Saiz Bungkusan 1:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_1" name="produk_saiz_isian_1" class="form-control" placeholder="Saiz Bungkusan 1" value="{{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) }}">
                                        @error('produk_saiz_isian_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_isian_1" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_1',isset($produks->produk_saiz_isian_1)?$produks->produk_saiz_isian_1:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_1" name="produk_saiz_lain_1" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_1',isset($produks->produk_saiz_lain_1)?$produks->produk_saiz_lain_1:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 2:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_2" name="produk_saiz_isian_2" class="form-control" placeholder="Saiz Bungkusan 2" value="{{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_isian_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_isian_2" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_2,isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_2',isset($produks->produk_saiz_isian_2)?$produks->produk_saiz_isian_2:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_2" name="produk_saiz_lain_2" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_2',isset($produks->produk_saiz_lain_2)?$produks->produk_saiz_lain_2:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 3:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_3" name="produk_saiz_isian_3" class="form-control" placeholder="Saiz Bungkusan 3" value="{{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_isian_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_3" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_3',isset($produks->produk_saiz_isian_3)?$produks->produk_saiz_isian_3:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_3" name="produk_saiz_lain_3" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_3',isset($produks->produk_saiz_lain_3)?$produks->produk_saiz_lain_3:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 4:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_4" name="produk_saiz_isian_4" class="form-control" placeholder="Saiz Bungkusan 4" value="{{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_isian_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_4" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_4',isset($produks->produk_saiz_isian_4)?$produks->produk_saiz_isian_4:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_4" name="produk_saiz_lain_4" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_4',isset($produks->produk_saiz_lain_4)?$produks->produk_saiz_lain_4:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 5:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_5" name="produk_saiz_isian_5" class="form-control" placeholder="Saiz Bungkusan 5" value="{{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_isian_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_5" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_5',isset($produks->produk_saiz_isian_5)?$produks->produk_saiz_isian_5:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_5" name="produk_saiz_lain_5" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_5',isset($produks->produk_saiz_lain_5)?$produks->produk_saiz_lain_5:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 6:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_6" name="produk_saiz_isian_6" class="form-control" placeholder="Saiz Bungkusan 6" value="{{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_isian_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_6" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_6',isset($produks->produk_saiz_isian_6)?$produks->produk_saiz_isian_6:null) == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_6" name="produk_saiz_lain_6" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_6',isset($produks->produk_saiz_lain_6)?$produks->produk_saiz_lain_6:null) }}" {{ $tajuk == "Paparan" ? 'disabled' : '' }}>
                                        @error('produk_saiz_lain_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                    @if($jenis=='new' || $jenis=='kemaskini' )
                                        <button type="submit" name="produk_submit" id="produk_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            {{ $jenis == "kemaskini" ? 'Kemaskini' : 'Daftar' }} <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i>
                                        </button>
                                        <button type="reset" name="pembekal_batal" id="produk_batal" class="btn btn-light waves-effect mr-1">Kosongkan</button>
                                        @endif
                                        <button type="button" onclick="window.location='{{ route('main.produk') }}'" name="produk_batal" id="produk_batal" class="btn btn-light waves-effect">
                                            {{ $jenis == "papar" ? 'Kembali' : 'Batal' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
    
                </div>
                <!-- end row -->
            </div> 
            <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end div -->
@endsection

@section('local_js')
<script>
$(document).ready(function(){

    // initialize date field using datepicker plugin
    $('input[name="produk_tarikh_gazet"]').datepicker();
    $('input[name="produk_tarikh_gazet"]').attr("placeholder","Tarikh Gazet - Pilih dari kalendar");
    $('input[name="produk_tarikh_tamat"]').datepicker();
    $('input[name="produk_tarikh_tamat"]').attr("placeholder","Tarikh Tamat - Pilih dari kalendar");
    $('input[name="produk_tarikh_penwartaan"]').datepicker();
    $('input[name="produk_tarikh_penwartaan"]').attr("placeholder","Tarikh Penwartaan - Pilih dari kalendar");

});
</script>
@endsection