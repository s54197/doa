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


// Maklumat Am
Route::get('/syarikat', function () { return view('maklumat_am.main_syarikat');})->name('main.syarikat');
Route::get('/produk', function () { return view('maklumat_am.main_produk');})->name('main.produk');
Route::get('/perawis', function () { return view('maklumat_am.main_perawis');})->name('main.perawis');
Route::get('/pendaftaran', function () { return view('pendaftaran.main_borang_A');})->name('main.pendaftaran');


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

// view form produk 
Route::get('/form/perawis', function () { return view('maklumat_am.forms.perawis');})->name('form.perawis');

// view borang A
Route::get('/form/pendaftaran', function () { return view('pendaftaran.forms.borang_A');})->name('form.pendaftaran');

// change password function
Route::get('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('view.password');
Route::post('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');
