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
Route::get('/syarikat', function () { return view('maklumat_am.main_syarikat');})->name('main.syarikat');
Route::get('/produk', function () { return view('maklumat_am.main_produk');})->name('main.produk');


/***********************************
            FORM
***********************************/
// view form syarikat 
Route::get('/form/syarikat', function () { return view('maklumat_am.forms.syarikat');})->name('form.syarikat');
// create syarikat
Route::post('/form/syarikat/create', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'store'])->name('syarikat.create')->middleware('auth');
// delete syarikat
Route::post('/form/syarikat/delete', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'delete'])->name('syarikat.delete')->middleware('auth');


// view form produk 
Route::get('/form/produk', function () { return view('maklumat_am.forms.produk');})->name('form.produk');

// view borang A
Route::get('/form/pendaftaran', function () { return view('pendaftaran.forms.borang_A');})->name('form.pendaftaran');