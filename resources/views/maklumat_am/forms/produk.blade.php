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
                <h4 class="header-title">Pendaftaran Produk</h4>
                <hr class="mb-3">
                {{-- <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                </p> --}}
    
                <div class="row">
                    <div class="col-12">
                        <div>
                            <form method="POST" class="form-horizontal" role="form" {{--action="{{ route('syarikat.create') }}"--}}>
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_nama"><span class="text-danger">*</span>Nama Produk:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_nama" name="produk_nama" class="form-control" placeholder="Nama Produk" value="{{ old('produk_nama') }}">
                                        @error('produk_nama') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_lrmp"><span class="text-danger">*</span>LRMP:</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="produk_lrmp_r">
                                            <option value="">Pilih Nilai R...</option>
                                            <option value='R1' {{ old('produk_lrmp_r') == 'R1' ? 'selected' : '' }}>R1</option>
                                            <option value='R2' {{ old('produk_lrmp_r') == 'R2' ? 'selected' : '' }}>R2</option>
                                            <option value='R3' {{ old('produk_lrmp_r') == 'R3' ? 'selected' : '' }}>R3</option>
                                            <option value='R4' {{ old('produk_lrmp_r') == 'R4' ? 'selected' : '' }}>R4</option>
                                            <option value='R5' {{ old('produk_lrmp_r') == 'R5' ? 'selected' : '' }}>R5</option>
                                            <option value='R6' {{ old('produk_lrmp_r') == 'R6' ? 'selected' : '' }}>R6</option>
                                            <option value='R7' {{ old('produk_lrmp_r') == 'R7' ? 'selected' : '' }}>R7</option>
                                            <option value='R8' {{ old('produk_lrmp_r') == 'R8' ? 'selected' : '' }}>R8</option>
                                            <option value='R9' {{ old('produk_lrmp_r') == 'R9' ? 'selected' : '' }}>R9</option>
                                            <option value='R10' {{ old('produk_lrmp_r') == 'R10' ? 'selected' : '' }}>R10</option>
                                            <option value='R11' {{ old('produk_lrmp_r') == 'R11' ? 'selected' : '' }}>R11</option>
                                            <option value='R12' {{ old('produk_lrmp_r') == 'R12' ? 'selected' : '' }}>R12</option>
                                            <option value='R13' {{ old('produk_lrmp_r') == 'R13' ? 'selected' : '' }}>R13</option>
                                            <option value='R14' {{ old('produk_lrmp_r') == 'R14' ? 'selected' : '' }}>R14</option>
                                            <option value='R15' {{ old('produk_lrmp_r') == 'R15' ? 'selected' : '' }}>R15</option>
                                            <option value='R16' {{ old('produk_lrmp_r') == 'R16' ? 'selected' : '' }}>R16</option>
                                            <option value='R17' {{ old('produk_lrmp_r') == 'R17' ? 'selected' : '' }}>R17</option>
                                            <option value='R18' {{ old('produk_lrmp_r') == 'R18' ? 'selected' : '' }}>R18</option>
                                            <option value='R19' {{ old('produk_lrmp_r') == 'R19' ? 'selected' : '' }}>R19</option>
                                            <option value='R20' {{ old('produk_lrmp_r') == 'R20' ? 'selected' : '' }}>R20</option>
                                        </select>
                                        @error('produk_lrmp_r') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="produk_lrmp_r" name="produk_lrmp_r" class="form-control" placeholder="Nombor LRMP" value="{{ old('produk_lrmp_r') }}">
                                        @error('produk_lrmp_r') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_no_fail"><span class="text-danger">*</span>Nombor Fail:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="syarikat_nama" name="produk_no_fail" class="form-control" placeholder="Nombor Fail" value="{{ old('produk_no_fail') }}">
                                        @error('produk_no_fail') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_gazet"><span class="text-danger">*</span>Tarikh Gazet:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_gazet" type="text" name="produk_tarikh_gazet" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_gazet') }}">
                                        @error('produk_tarikh_gazet') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_tamat"><span class="text-danger">*</span>Tarikh Tamat:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_tamat" type="text" name="produk_tarikh_tamat" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_tamat') }}">
                                        @error('produk_tarikh_tamat') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_tarikh_penwartaan"><span class="text-danger">*</span>Tarikh Penwartaan:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="produk_tarikh_penwartaan" type="text" name="produk_tarikh_penwartaan" data-date-orientation="bottom" data-date-format="dd-mm-yyyy" value="{{ old('produk_tarikh_penwartaan') }}">
                                        @error('produk_tarikh_penwartaan') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_kelas_racun"><span class="text-danger">*</span>Kelas Racun:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="produk_kelas_racun">
                                            <option value="">Pilih Kelas Racun...</option>
                                            <option value='1a' {{ old('produk_lrmp_r') == '1a' ? 'selected' : '' }}>1a</option>
                                            <option value='1b' {{ old('produk_lrmp_r') == '1b' ? 'selected' : '' }}>1b</option>
                                            <option value='II' {{ old('produk_lrmp_r') == 'II' ? 'selected' : '' }}>II</option>
                                            <option value='III' {{ old('produk_lrmp_r') == 'III' ? 'selected' : '' }}>III</option>
                                            <option value='IV' {{ old('produk_lrmp_r') == 'IV' ? 'selected' : '' }}>IV</option>
                                        </select>
                                        @error('produk_kelas_racun') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label my-md-0" for="produk_categori"><span class="text-danger">*</span>Kategori:</label>
                                    <div class="col-md-8 pt-md-2"> 
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='pertanian' name='produk_categori' class='custom-control-input' value='Pertanian'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Pertanian' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='pertanian'>Pertanian</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='isi-rumah' name='produk_categori' class='custom-control-input' value='Isi rumah'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Isi rumah' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='isi-rumah'>Isi rumah</label>
                                        </div>                                      
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='kesihatan-awam' name='produk_categori' class='custom-control-input' value='Kesihatan Awam'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Kesihatan Awam' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='kesihatan-awam'>Kesihatan Awam</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='perindustrian' name='produk_categori' class='custom-control-input' value='Perindustrian'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Perindustrian' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='perindustrian'>Perindustrian</label>
                                        </div>        
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='veterinar' name='produk_categori' class='custom-control-input' value='Veterinar'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Veterinar' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='veterinar'>Veterinar</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='perkilangan' name='produk_categori' class='custom-control-input' value='Perkilangan'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Perkilangan' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='perkilangan'>Perkilangan</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='lain-lain-nyatakan' name='produk_categori' class='custom-control-input' value='Lain-lain (nyatakan)'
                                            {{ old('produk_categori', $produk_categori ?? '') == 'Lain-lain (nyatakan)' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='lain-lain-nyatakan'>Lain-lain (nyatakan)</label>
                                        </div>                                          
                                    </div>
                                    @error('produk_categori') 
                                    <small class='text-danger'>{{ $message }}</small> 
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="text" id="produk_categori_lain" name="produk_categori_lain" class="form-control custom_border" placeholder="Maklumat lain-lain" value="{{ old('produk_categori_lain') }}">
                                        @error('produk_categori_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label my-md-0" for="produk_kegunaan"><span class="text-danger">*</span>Kegunaan:</label>
                                    <div class="col-md-8 pt-md-2">
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-rumpai' name='produk_kegunaan' class='custom-control-input' value='Racun rumpai'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun rumpai' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-rumpai'>Racun rumpai</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-serangga' name='produk_kegunaan' class='custom-control-input' value='Racun serangga'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun serangga' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-serangga'>Racun serangga</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-kulat' name='produk_kegunaan' class='custom-control-input' value='Racun kulat'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun kulat' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-kulat'>Racun kulat</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-hamama' name='produk_kegunaan' class='custom-control-input' value='Racun hamama'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun hamama' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-hamama'>Racun hamama</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-nematod' name='produk_kegunaan' class='custom-control-input' value='Racun nematod'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun nematod' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-nematod'>Racun nematod</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-tikus' name='produk_kegunaan' class='custom-control-input' value='Racun tikus'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun tikus' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-tikus'>Racun tikus</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-siput' name='produk_kegunaan' class='custom-control-input' value='Racun siput'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun siput' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-siput'>Racun siput</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-bakteria' name='produk_kegunaan' class='custom-control-input' value='Racun bakteria'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun bakteria' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-bakteria'>Racun bakteria</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='fumigan' name='produk_kegunaan' class='custom-control-input' value='Fumigan'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Fumigan' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='fumigan'>Fumigan</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='fumigan-tanah' name='produk_kegunaan' class='custom-control-input' value='Fumigan tanah'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Fumigan tanah' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='fumigan-tanah'>Fumigan tanah</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-kutu/pinjal' name='produk_kegunaan' class='custom-control-input' value='Racun kutu/pinjal'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun kutu/pinjal' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-kutu/pinjal'>Racun kutu/pinjal</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='pengawet' name='produk_kegunaan' class='custom-control-input' value='Pengawet'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Pengawet' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='pengawet'>Pengawet</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='penghalau' name='produk_kegunaan' class='custom-control-input' value='Penghalau'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Penghalau' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='penghalau'>Penghalau</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='racun-anai-anai' name='produk_kegunaan' class='custom-control-input' value='Racun anai-anai'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Racun anai-anai' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='racun-anai-anai'>Racun anai-anai</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='bahan-teknikal-untuk-tujuan-perkilangan-sahaja' name='produk_kegunaan' class='custom-control-input' value='Bahan teknikal untuk tujuan perkilangan sahaja'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Bahan teknikal untuk tujuan perkilangan sahaja' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='bahan-teknikal-untuk-tujuan-perkilangan-sahaja'>Bahan teknikal untuk tujuan perkilangan sahaja</label>
                                        </div>
                                        <div class='custom-control custom-radio custom-control-inline'>
                                            <input type='radio' id='lain-lain-nyatakan' name='produk_kegunaan' class='custom-control-input' value='Lain-lain (nyatakan)'
                                            {{ old('produk_kegunaan', $produk_kegunaan ?? '') == 'Lain-lain (nyatakan)' ? 'checked' : '' }}>
                                            <label class='custom-control-label' for='lain-lain-nyatakan'>Lain-lain (nyatakan)</label>
                                        </div>                                     
                                    </div>
                                    @error('produk_kegunaan') 
                                    <small class='text-danger'>{{ $message }}</small> 
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-3">
                                        <input type="text" id="produk_kegunaan_lain" name="produk_kegunaan_lain" class="form-control custom_border" placeholder="Maklumat lain-lain" value="{{ old('produk_kegunaan_lain') }}">
                                        @error('produk_kegunaan_lain') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz"><span class="text-danger">*</span>Saiz Bungkusan 1:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_1" name="produk_saiz_isian_1" class="form-control" placeholder="Saiz Bungkusan 1" value="{{ old('produk_saiz_isian_1') }}">
                                        @error('produk_saiz_isian_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_1">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_1') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_1') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_1') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_1') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_1') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_1') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_1') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_1') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_1') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_1') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_1') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_1') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_1') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_1') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_1') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_1') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_1') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_1') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_1') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_1" name="produk_saiz_lain_1" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_1') }}">
                                        @error('produk_saiz_lain_1') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 2:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_2" name="produk_saiz_isian_2" class="form-control" placeholder="Saiz Bungkusan 2" value="{{ old('produk_saiz_isian_2') }}">
                                        @error('produk_saiz_isian_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_2">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_2') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_2') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_2') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_2') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_2') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_2') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_2') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_2') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_2') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_2') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_2') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_2') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_2') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_2') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_2') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_2') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_2') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_2') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_2') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_2" name="produk_saiz_lain_2" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_2') }}">
                                        @error('produk_saiz_lain_2') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 3:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_3" name="produk_saiz_isian_3" class="form-control" placeholder="Saiz Bungkusan 3" value="{{ old('produk_saiz_isian_3') }}">
                                        @error('produk_saiz_isian_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_3">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_3') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_3') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_3') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_3') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_3') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_3') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_3') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_3') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_3') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_3') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_3') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_3') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_3') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_3') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_3') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_3') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_3') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_3') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_3') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_3" name="produk_saiz_lain_3" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_3') }}">
                                        @error('produk_saiz_lain_3') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 4:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_4" name="produk_saiz_isian_4" class="form-control" placeholder="Saiz Bungkusan 4" value="{{ old('produk_saiz_isian_4') }}">
                                        @error('produk_saiz_isian_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_4">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_4') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_4') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_4') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_4') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_4') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_4') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_4') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_4') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_4') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_4') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_4') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_4') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_4') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_4') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_4') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_4') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_4') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_4') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_4') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_4" name="produk_saiz_lain_4" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_4') }}">
                                        @error('produk_saiz_lain_4') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 5:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_5" name="produk_saiz_isian_5" class="form-control" placeholder="Saiz Bungkusan 5" value="{{ old('produk_saiz_isian_5') }}">
                                        @error('produk_saiz_isian_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_5">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_5') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_5') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_5') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_5') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_5') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_5') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_5') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_5') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_5') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_5') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_5') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_5') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_5') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_5') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_5') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_5') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_5') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_5') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_5') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_5" name="produk_saiz_lain_5" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_5') }}">
                                        @error('produk_saiz_lain_5') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="produk_saiz">Saiz Bungkusan 6:</label>
                                    <div class="col-md-3">
                                        <input type="number" id="produk_saiz_isian_6" name="produk_saiz_isian_6" class="form-control" placeholder="Saiz Bungkusan 6" value="{{ old('produk_saiz_isian_6') }}">
                                        @error('produk_saiz_isian_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="produk_saiz_metrik_6">
                                            <option value="">Pilih Saiz Metrik...</option>
                                            <option value='%w/w' {{ old('produk_saiz_isian_6') == '%w/w' ? 'selected' : '' }}>%w/w</option>
                                            <option value='cans' {{ old('produk_saiz_isian_6') == 'cans' ? 'selected' : '' }}>cans</option>
                                            <option value='CFU' {{ old('produk_saiz_isian_6') == 'CFU' ? 'selected' : '' }}>CFU</option>
                                            <option value='coils' {{ old('produk_saiz_isian_6') == 'coils' ? 'selected' : '' }}>coils</option>
                                            <option value='g/l' {{ old('produk_saiz_isian_6') == 'g/l' ? 'selected' : '' }}>g/l</option>
                                            <option value='gm' {{ old('produk_saiz_isian_6') == 'gm' ? 'selected' : '' }}>gm</option>
                                            <option value='i.t.u/mg' {{ old('produk_saiz_isian_6') == 'i.t.u/mg' ? 'selected' : '' }}>i.t.u/mg</option>
                                            <option value='i.u/mg' {{ old('produk_saiz_isian_6') == 'i.u/mg' ? 'selected' : '' }}>i.u/mg</option>
                                            <option value='kg' {{ old('produk_saiz_isian_6') == 'kg' ? 'selected' : '' }}>kg</option>
                                            <option value='liter' {{ old('produk_saiz_isian_6') == 'liter' ? 'selected' : '' }}>liter</option>
                                            <option value='mats' {{ old('produk_saiz_isian_6') == 'mats' ? 'selected' : '' }}>mats</option>
                                            <option value='metric tan' {{ old('produk_saiz_isian_6') == 'metric tan' ? 'selected' : '' }}>metric tan</option>
                                            <option value='mg' {{ old('produk_saiz_isian_6') == 'mg' ? 'selected' : '' }}>mg</option>
                                            <option value='mg/mat' {{ old('produk_saiz_isian_6') == 'mg/mat' ? 'selected' : '' }}>mg/mat</option>
                                            <option value='mg/ml' {{ old('produk_saiz_isian_6') == 'mg/ml' ? 'selected' : '' }}>mg/ml</option>
                                            <option value='mg/unit' {{ old('produk_saiz_isian_6') == 'mg/unit' ? 'selected' : '' }}>mg/unit</option>
                                            <option value='mi ' {{ old('produk_saiz_isian_6') == 'mi ' ? 'selected' : '' }}>mi </option>
                                            <option value='sheets' {{ old('produk_saiz_isian_6') == 'sheets' ? 'selected' : '' }}>sheets</option>
                                            <option value='Lain-lain (nyatakan)' {{ old('produk_saiz_isian_6') == 'Lain-lain (nyatakan)' ? 'selected' : '' }}>Lain-lain (nyatakan)</option>
                                        </select>
                                        @error('produk_saiz_metrik_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror 
                                    </div>
                                    <div class="col-md-3">
                                        <input type="type" id="produk_saiz_lain_6" name="produk_saiz_lain_6" class="form-control" placeholder="Maklumat lain-lain" value="{{ old('produk_saiz_lain_6') }}">
                                        @error('produk_saiz_lain_6') 
                                        <small class='text-danger'>{{ $message }}</small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-8 offset-3">
                                        <button type="submit" name="produk_submit" id="produk_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Daftar
                                        </button>
                                        <button type="reset" name="produk_batal" id="produk_batal" class="btn btn-light waves-effect">
                                            Batal
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