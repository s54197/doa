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


Route::middleware('auth')->group(function() {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Maklumat Am
    
    /***********************************
                syarikat
    ***********************************/
    Route::get('syarikat', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'index'])->name('main.syarikat');
    Route::get('syarikat/papar/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'view'])->name('papar.syarikat');
    Route::get('syarikat/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update_view'])->name('kemaskini.syarikat');
    // delete syarikat
    Route::delete('syarikat/delete/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'delete'])->name('syarikat.delete');
    // view syarikat 
    Route::get('form/syarikat', function () { 
        return view('maklumat_am.forms.syarikat')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.syarikat');
    // create syarikat
    Route::post('form/syarikat/create', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'store'])->name('syarikat.create');
    // update syarikat
    Route::post('form/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update'])->name('syarikat.update');
});