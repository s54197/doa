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
    // Route::get('form/syarikat', function () {
    //     return view('maklumat_am.forms.syarikat')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);
    // })->name('form.syarikat');
     Route::get('form/syarikat/baru', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'new_view'])->name('baru.syarikat');
    // delete syarikat
    Route::delete('form/syarikat/delete/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'delete'])->name('syarikat.delete');
    // create syarikat
    Route::post('form/syarikat/create', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'store'])->name('syarikat.create');
    // update syarikat
    Route::post('form/syarikat/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'update'])->name('syarikat.update');
    Route::post('form/syarikat/poskod', [App\Http\Controllers\MaklumatAm\SyarikatController::class, 'poskod_info'])->name('poskod.info');


    /***********************************
                   agen
    ***********************************/
    Route::get('agen', [App\Http\Controllers\MaklumatAm\AgenController::class, 'index'])->name('main.agen');
    Route::get('agen/papar/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'view'])->name('papar.agen');
    Route::get('agen/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'update_view'])->name('kemaskini.agen');
    // view agen 
    // Route::get('form/agen', function () {return view('maklumat_am.forms.agen')->with(['jenis' => 'new','tajuk' => 'Pendaftaran']);})->name('form.agen');
    // delete agen
    Route::delete('form/agen/delete/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'delete'])->name('agen.delete');
    // create agen
    Route::post('form/agen/create', [App\Http\Controllers\MaklumatAm\AgenController::class, 'store'])->name('agen.create');
    // update agen
    Route::post('form/agen/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\AgenController::class, 'update'])->name('agen.update');
    // new agen
    Route::get('form/agen/baru', [App\Http\Controllers\MaklumatAm\AgenController::class, 'new_view'])->name('baru.agen');


    /***********************************
                 pembekal
    ***********************************/
    Route::get('pembekal', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'index'])->name('main.pembekal');
    Route::get('pembekal/papar/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'view'])->name('papar.pembekal');
    Route::get('pembekal/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'update_view'])->name('kemaskini.pembekal');
    // view pembekal
    Route::get('form/pembekal/baru', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'new_view'])->name('baru.pembekal');
    // delete pembekal
    Route::delete('form/pembekal/delete/{id}', [App\Http\Controllers\MaklumatAm\PembekalController::class, 'delete'])->name('pembekal.delete');
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
    // view pengilang
    Route::get('form/pengilang/baru', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'new_view'])->name('baru.pengilang');
    // delete pengilang
    Route::delete('form/pengilang/delete/{id}', [App\Http\Controllers\MaklumatAm\PengilangController::class, 'delete'])->name('pengilang.delete');
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
    // view gudang
    Route::get('form/gudang/baru', [App\Http\Controllers\MaklumatAm\GudangController::class, 'new_view'])->name('baru.gudang');
    // delete gudang
    Route::delete('form/gudang/delete/{id}', [App\Http\Controllers\MaklumatAm\GudangController::class, 'delete'])->name('gudang.delete');
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
    // view penginvoisan
    Route::get('form/penginvoisan/baru', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'new_view'])->name('baru.penginvoisan');
    // delete penginvoisan
    Route::delete('form/penginvoisan/delete/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'delete'])->name('penginvoisan.delete');
    // create penginvoisan
    Route::post('form/penginvoisan/create', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'store'])->name('penginvoisan.create');
    // update penginvoisan
    Route::post('form/penginvoisan/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PenginvoisanController::class, 'update'])->name('penginvoisan.update');


    /***********************************
               produk
    ***********************************/
    Route::get('produk', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'index'])->name('main.produk');
    Route::get('produk/papar/{id}', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'view'])->name('papar.produk');
    Route::get('produk/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'update_view'])->name('kemaskini.produk');
    // view produk
    Route::get('form/produk/baru', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'new_view'])->name('baru.produk');
    // delete produk
    Route::delete('form/produk/delete/{id}', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'delete'])->name('produk.delete');
    // create produk
    Route::post('form/produk/create', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'store'])->name('produk.create');
    // update produk
    Route::post('form/produk/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\ProdukController::class, 'update'])->name('produk.update');
    


    /***********************************
               perawis
    ***********************************/
    Route::get('perawis', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'index'])->name('main.perawis');
    Route::get('perawis/papar/{id}', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'view'])->name('papar.perawis');
    Route::get('perawis/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'update_view'])->name('kemaskini.perawis');
    // view perawis
    Route::get('form/perawis/baru', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'new_view'])->name('baru.perawis');
    // delete perawis
    Route::delete('form/perawis/delete/{id}', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'delete'])->name('perawis.delete');
    // create perawis
    Route::post('form/perawis/create', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'store'])->name('perawis.create');
    // update perawis
    Route::post('form/perawis/kemaskini/{id}', [App\Http\Controllers\MaklumatAm\PerawisController::class, 'update'])->name('perawis.update');


    /***********************************
               borang A
    ***********************************/
    Route::get('pendaftaran', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'index'])->name('main.pendaftaran');
    Route::get('pendaftaran/papar/{id}', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'view'])->name('papar.pendaftaran');
    Route::get('pendaftaran/kemaskini/{id}', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'update_view'])->name('kemaskini.pendaftaran');
    // view pendaftaran
    Route::get('form/pendaftaran/baru', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'new_view'])->name('baru.pendaftaran');
    // delete pendaftaran
    Route::delete('form/pendaftaran/delete/{id}', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'delete'])->name('pendaftaran.delete');
    // create pendaftaran
    Route::post('form/pendaftaran/create', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'store'])->name('pendaftaran.create');
    // update pendaftaran
    Route::post('form/pendaftaran/kemaskini/{id}', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'update'])->name('pendaftaran.update');
    // uget wakil
    Route::get('form/pendaftaran/getWakil/{id}', [App\Http\Controllers\Pendaftaran\BorangAController::class, 'get_wakil'])->name('pendaftaran.wakil');


    /***********************************
        change password function
    ***********************************/
    Route::get('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('view.password');
    Route::post('/change_password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');

    /***********************************
                   pdf
    ***********************************/
    Route::get('/create_cert', [App\Http\Controllers\PDFController::class, 'certificate'])->name('create.cert');
    Route::get('/create_letter', [App\Http\Controllers\PDFController::class, 'letter'])->name('create.letter');

});



