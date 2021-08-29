<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.login');});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function() {

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /***********************************
                  borang A
    ***********************************/
    // view borang A
    Route::get('/form/pendaftaran', function () { return view('pendaftaran.forms.borang_A');})->name('form.pendaftaran');


    /***********************************
                   syarikat
    ***********************************/
    Route::get('syarikat', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'index'])->name('main.syarikat')->middleware('auth');
    Route::get('syarikat/papar/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'view'])->name('papar.syarikat');
    Route::get('syarikat/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update_view'])->name('kemaskini.syarikat');
    // view syarikat 
    Route::get('form/syarikat', function () {
        return view('maklumat_am.forms.syarikat')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);
    })->name('form.syarikat');
    // delete syarikat
    Route::delete('syarikat/delete/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'delete'])->name('syarikat.delete');
    // create syarikat
    Route::post('form/syarikat/create', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'store'])->name('syarikat.create');
    // update syarikat
    Route::post('form/syarikat/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update'])->name('syarikat.update');


    /***********************************
                   agen
    ***********************************/
    Route::get('agen', [App\Http\Controllers\MaklumatAm\AgenController::class, 'index'])->name('main.agen');
    Route::get('agen/papar/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'view'])->name('papar.agen');
    Route::get('agen/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'update_view'])->name('kemaskini.agen');
    // delete agen
    Route::delete('agen/delete/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'delete'])->name('agen.delete');
    // view agen 
    Route::get('form/agen', function () { 
        return view('maklumat_am.forms.agen')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.agen');
    // create agen
    Route::post('form/agen/create', [App\Http\Controllers\MaklumatAm\AgenController::class, 'store'])->name('agen.create');
    // update agen
    Route::post('form/agen/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'update'])->name('agen.update');


    /***********************************
                 pembekal
    ***********************************/
    Route::get('pembekal', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'index'])->name('main.pembekal');
    Route::get('pembekal/papar/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'view'])->name('papar.pembekal');
    Route::get('pembekal/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'update_view'])->name('kemaskini.pembekal');
    // delete pembekal
    Route::delete('pembekal/delete/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'delete'])->name('pembekal.delete');
    // view pembekal 
    Route::get('form/pembekal', function () { 
        return view('maklumat_am.forms.pembekal')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.pembekal');
    // create pembekal
    Route::post('form/pembekal/create', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'store'])->name('pembekal.create');
    // update pembekal
    Route::post('formm/pembekal/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'update'])->name('pembekal.update');


    /***********************************
                pengilang
    ***********************************/
    Route::get('pengilang', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'index'])->name('main.pengilang');
    Route::get('pengilang/papar/{id}', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'view'])->name('papar.pengilang');
    Route::get('pengilang/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'update_view'])->name('kemaskini.pengilang');
    // delete pengilang
    Route::delete('pengilang/delete/{id}', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'delete'])->name('pengilang.delete');
    // view pengilang 
    Route::get('form/pengilang', function () { 
        return view('maklumat_am.forms.pengilang')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.pengilang');
    // create pengilang
    Route::post('form/pengilang/create', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'store'])->name('pengilang.create');
    // update pengilang
    Route::post('form/pengilang/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'update'])->name('pengilang.update');


    /***********************************
                gudang
    ***********************************/
    Route::get('gudang', [App\Http\Controllers\MaklumatAm\GudangController::class, 'index'])->name('main.gudang');
    Route::get('gudang/papar/{id}', [App\Http\Controllers\MaklumatAm\GudangController::class, 'view'])->name('papar.gudang');
    Route::get('gudang/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\GudangController::class, 'update_view'])->name('kemaskini.gudang');
    // delete gudang
    Route::delete('gudang/delete/{id}', [App\Http\Controllers\MaklumatAm\GudangController::class, 'delete'])->name('gudang.delete');
    // view gudang 
    Route::get('form/gudang', function () { 
        return view('maklumat_am.forms.gudang')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.gudang');
    // create gudang
    Route::post('form/gudang/create', [App\Http\Controllers\MaklumatAm\GudangController::class, 'store'])->name('gudang.create');
    // update gudang
    Route::post('form/gudang/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\GudangController::class, 'update'])->name('gudang.update');


    /***********************************
               penginvoisan
    ***********************************/
    Route::get('penginvoisan', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'index'])->name('main.penginvoisan');
    Route::get('penginvoisan/papar/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'view'])->name('papar.penginvoisan');
    Route::get('penginvoisan/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'update_view'])->name('kemaskini.penginvoisan');
    // delete penginvoisan
    Route::delete('penginvoisan/delete/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'delete'])->name('penginvoisan.delete');
    // view penginvoisan 
    Route::get('form/penginvoisan', function () { 
        return view('maklumat_am.forms.penginvoisan')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.penginvoisan');
    // create penginvoisan
    Route::post('form/penginvoisan/create', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'store'])->name('penginvoisan.create');
    // update penginvoisan
    Route::post('form/penginvoisan/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'update'])->name('penginvoisan.update');


    /***********************************
               produk
    ***********************************/
    Route::get('/produk', function () { return view('maklumat_am.main_produk');})->name('main.produk');
    // view form produk 
    Route::get('/form/produk', function () { return view('maklumat_am.forms.produk');})->name('form.produk');


    /***********************************
               perawis
    ***********************************/
    Route::get('/perawis', function () { return view('maklumat_am.main_perawis');})->name('main.perawis');
    // view form produk 
    Route::get('/form/perawis', function () { return view('maklumat_am.forms.perawis');})->name('form.perawis');


    /***********************************
               borang A
    ***********************************/
    // view borang A
    Route::get('/form/pendaftaran', function () { return view('pendaftaran.forms.borang_A');})->name('form.pendaftaran');

});


