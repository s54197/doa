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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Maklumat Am
// Route::get('/syarikat', function () { return view('maklumat_am.main_syarikat');})->name('main.syarikat');
Route::get('/syarikat', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'index'])->name('main.syarikat');
Route::get('/papar/syarikat/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'view'])->name('papar.syarikat');
Route::get('/kemaskini/syarikat/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update'])->name('kemaskini.syarikat');

/***********************************
            FORM
***********************************/
// view syarikat 
Route::get('/form/syarikat', function () { 
    return view('maklumat_am.forms.syarikat')->with([
        'syarikats' => array(
            'syarikat_nama' => '',
            'syarikat_no_roc' => '',
            'syarikat_tarikh_roc' => '',
            'syarikat_bangunan' => '',
            'syarikat_jalan' => '',
            'syarikat_poskod' => '',
            'syarikat_bandar' => '',
            'syarikat_negeri' => '',
            'syarikat_surat_bangunan' => '',
            'syarikat_surat_jalan' => '',
            'syarikat_surat_poskod' => '',
            'syarikat_surat_bandar' => '',
            'syarikat_surat_negeri' => '',
            'syarikat_no_tel' => '',
            'syarikat_no_faks' => '',
            'syarikat_emel' => '',
            'syarikat_wakil' => '',
        ),
        'jenis' => 'new',
        'tajuk' => 'Pendaftaran'
    ]);})->name('form.syarikat');
// create syarikat
Route::post('/form/syarikat/create', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'store'])->name('syarikat.create')->middleware('auth');
// delete syarikat
Route::post('/form/syarikat/delete', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'delete'])->name('syarikat.delete')->middleware('auth');