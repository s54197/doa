<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaklumatAm\SyarikatController;
use App\Http\Controllers\MaklumatAm\AgenController;
use App\Http\Controllers\MaklumatAm\PembekalController;
use App\Http\Controllers\MaklumatAm\PengilangController;
use App\Http\Controllers\MaklumatAm\PenginvoisanController;


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

Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /***********************************
                syarikat
    ***********************************/
    Route::get('syarikat', [SyarikatController::class, 'index'])->name('main.syarikat');
    Route::get('syarikat/papar/{id}', [SyarikatController::class, 'view'])->name('papar.syarikat');
    Route::get('syarikat/kemaskini/{id}', [SyarikatController::class, 'update_view'])->name('kemaskini.syarikat');
    // delete syarikat
    Route::delete('syarikat/delete/{id}', [SyarikatController::class, 'delete'])->name('syarikat.delete');
    // view syarikat 
    Route::get('form/syarikat', function () { 
        return view('maklumat_am.forms.syarikat')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.syarikat');
    // create syarikat
    Route::post('form/syarikat/create', [SyarikatController::class, 'store'])->name('syarikat.create');
    // update syarikat
    Route::post('form/kemaskini/{id}', [SyarikatController::class, 'update'])->name('syarikat.update');

    /***********************************
                   agen
    ***********************************/
    Route::get('agen', [AgenController::class, 'index'])->name('main.agen');
    Route::get('agen/papar/{id}', [AgenController::class, 'view'])->name('papar.agen');
    Route::get('agen/kemaskini/{id}', [AgenController::class, 'update_view'])->name('kemaskini.agen');
    // delete agen
    Route::delete('agen/delete/{id}', [AgenController::class, 'delete'])->name('agen.delete');
    // view agen 
    Route::get('form/agen', function () { 
        return view('maklumat_am.forms.agen')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.agen');
    // create agen
    Route::post('form/agen/create', [AgenController::class, 'store'])->name('agen.create');
    // update agen
    Route::post('form/kemaskini/{id}', [AgenController::class, 'update'])->name('agen.update');

    /***********************************
                 pembekal
    ***********************************/
    Route::get('pembekal', [PembekalController::class, 'index'])->name('main.pembekal');
    Route::get('pembekal/papar/{id}', [PembekalController::class, 'view'])->name('papar.pembekal');
    Route::get('pembekal/kemaskini/{id}', [PembekalController::class, 'update_view'])->name('kemaskini.pembekal');
    // delete syarikat
    Route::delete('pembekal/delete/{id}', [PembekalController::class, 'delete'])->name('pembekal.delete');
    // view syarikat 
    Route::get('form/pembekal', function () { 
        return view('maklumat_am.forms.pembekal')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.pembekal');
    // create syarikat
    Route::post('form/pembekal/create', [PembekalController::class, 'store'])->name('pembekal.create');
    // update syarikat
    Route::post('form/kemaskini/{id}', [PembekalController::class, 'update'])->name('pembekal.update');

    /***********************************
                pengilang
    ***********************************/
    Route::get('pengilang', [PengilangController::class, 'index'])->name('main.pengilang');
    Route::get('pengilang/papar/{id}', [PengilangController::class, 'view'])->name('papar.pengilang');
    Route::get('pengilang/kemaskini/{id}', [PengilangController::class, 'update_view'])->name('kemaskini.pengilang');
    // delete pengilang
    Route::delete('pengilang/delete/{id}', [PengilangController::class, 'delete'])->name('pengilang.delete');
    // view pengilang 
    Route::get('form/pengilang', function () { 
        return view('maklumat_am.forms.pengilang')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.pengilang');
    // create pengilang
    Route::post('form/syarikat/create', [PengilangController::class, 'store'])->name('pengilang.create');
    // update pengilang
    Route::post('form/kemaskini/{id}', [PengilangController::class, 'update'])->name('pengilang.update');

    /***********************************
               penginvoisan
    ***********************************/
    Route::get('penginvoisan', [PenginvoisanController::class, 'index'])->name('main.penginvoisan');
    Route::get('penginvoisan/papar/{id}', [PenginvoisanController::class, 'view'])->name('papar.penginvoisan');
    Route::get('penginvoisan/kemaskini/{id}', [PenginvoisanController::class, 'update_view'])->name('kemaskini.penginvoisan');
    // delete penginvoisan
    Route::delete('penginvoisan/delete/{id}', [PenginvoisanController::class, 'delete'])->name('penginvoisan.delete');
    // view penginvoisan 
    Route::get('form/penginvoisan', function () { 
        return view('maklumat_am.forms.penginvoisan')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.penginvoisan');
    // create penginvoisan
    Route::post('form/penginvoisan/create', [PenginvoisanController::class, 'store'])->name('penginvoisan.create');
    // update penginvoisan
    Route::post('form/kemaskini/{id}', [PenginvoisanController::class, 'update'])->name('penginvoisan.update');


});