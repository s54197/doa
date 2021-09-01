<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListNegara;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;

class ProdukController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data produk
            $produks = Produk::all();
        } else {
            // All data produk
            $produks = User::find(Auth::user()->id)->produks;
        }

        // Summary
        $TotalProduk = Produk::count();
        $TotalProdukAktif = Produk::where('produk_status', '=', 'Aktif')->count();
        $TotalProdukTidakAktif = Produk::where('produk_status', '=', 'Tidak Aktif')->count();
        $TotalProdukBulanTerkini = Produk::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_produk', [
            'produks' => $produks,
            'totalproduk' => $TotalProduk,
            'totalprodukaktif' => $TotalProdukAktif, 
            'totalproduktidakaktif' => $TotalProdukTidakAktif, 
            'totalprodukbulanterkini' => $TotalProdukBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data
    public function new_view() {
        // Data negara
        $list_negara = ListNegara::all();

        $data = array(
            'list_negara' => $list_negara,
            'jenis' => 'new',
            'tajuk' => 'Pendaftaran'
        );
        
        return view('maklumat_am.forms.produk')->with($data);
    }

    // Show data based on id
    public function view($id) {
        // Data produk
        $produk = Produk::find($id);
        // Data negara
        $list_negara = ListNegara::all();

        $data = array(
            'produks' => $produk,
            'list_negara' => $list_negara,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.produk')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data produk
        $produk = Produk::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'produks' => $produk,
            'list_negara' => $list_negara,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.produk')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'produk_nama' => 'required',
            'produk_lrmp_r' => 'required',
            'produk_lrmp_no' => 'required',
            'produk_no_fail' => 'required',
            'produk_tarikh_gazet' => 'required',
            'produk_tarikh_tamat' => 'required',
            'produk_tarikh_penwartaan' => 'required',
            'produk_kelas_racun' => 'required',
            'produk_categori' => 'required',
            'produk_categori_lain' => 'required',
            'produk_kegunaan' => 'required',
            'produk_kegunaan_lain' => 'required',
            'produk_saiz_isian_1' => 'required',
            'produk_saiz_lain_1' => 'required',
            // 'produk_saiz_isian_2' => 'required',
            // 'produk_saiz_lain_2' => 'required',
            // 'produk_saiz_isian_3' => 'required',
            // 'produk_saiz_lain_3' => 'required',
            // 'produk_saiz_isian_4' => 'required',
            // 'produk_saiz_lain_4' => 'required',
            // 'produk_saiz_isian_5' => 'required',
            // 'produk_saiz_lain_5' => 'required',
            // 'produk_saiz_isian_6' => 'required',
            // 'produk_saiz_lain_6' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->produks()->create([
                'produk_nama' => $request->produk_nama,
                'produk_lrmp_r' => $request->produk_lrmp_r,
                'produk_lrmp_no' => $request->produk_lrmp_no,
                'produk_no_fail' => $request->produk_no_fail,
                'produk_tarikh_gazet' => $request->produk_tarikh_gazet,
                'produk_tarikh_tamat' => $request->produk_tarikh_tamat,
                'produk_tarikh_penwartaan' => $request->produk_tarikh_penwartaan,
                'produk_kelas_racun' => $request->produk_kelas_racun,
                'produk_categori' => $request->produk_categori,
                'produk_categori_lain' => $request->produk_categori_lain,
                'produk_kegunaan' => $request->produk_kegunaan,
                'produk_kegunaan_lain' => $request->produk_kegunaan_lain,
                'produk_saiz_isian_1' => $request->produk_saiz_isian_1,
                'produk_saiz_lain_1' => $request->produk_saiz_lain_1,
                'produk_saiz_isian_2' => $request->produk_saiz_isian_2,
                'produk_saiz_lain_2' => $request->produk_saiz_lain_2,
                'produk_saiz_isian_3' => $request->produk_saiz_isian_3,
                'produk_saiz_lain_3' => $request->produk_saiz_lain_3,
                'produk_saiz_isian_4' => $request->produk_saiz_isian_4,
                'produk_saiz_lain_4' => $request->produk_saiz_lain_4,
                'produk_saiz_isian_5' => $request->produk_saiz_isian_5,
                'produk_saiz_lain_5' => $request->produk_saiz_lain_5,
                'produk_saiz_isian_6' => $request->produk_saiz_isian_6,
                'produk_saiz_lain_6' => $request->produk_saiz_lain_6,
                'produk_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/produk')->withSuccess('Produk '.$request->produk_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/produk')->withWarning('Produk '.$request->produk_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update produk based on id
    public function update(Request $request, $id){
        $request->validate([
            'produk_nama' => 'required',
            'produk_lrmp_r' => 'required',
            'produk_lrmp_no' => 'required',
            'produk_no_fail' => 'required',
            'produk_tarikh_gazet' => 'required',
            'produk_tarikh_tamat' => 'required',
            'produk_tarikh_penwartaan' => 'required',
            'produk_kelas_racun' => 'required',
            'produk_categori' => 'required',
            'produk_categori_lain' => 'required',
            'produk_kegunaan' => 'required',
            'produk_kegunaan_lain' => 'required',
            'produk_saiz_isian_1' => 'required',
            'produk_saiz_lain_1' => 'required',
            // 'produk_saiz_isian_2' => 'required',
            // 'produk_saiz_lain_2' => 'required',
            // 'produk_saiz_isian_3' => 'required',
            // 'produk_saiz_lain_3' => 'required',
            // 'produk_saiz_isian_4' => 'required',
            // 'produk_saiz_lain_4' => 'required',
            // 'produk_saiz_isian_5' => 'required',
            // 'produk_saiz_lain_5' => 'required',
            // 'produk_saiz_isian_6' => 'required',
            // 'produk_saiz_lain_6' => 'required',
        ]);

        try {
            $produk = Produk::find($id);
            $produk->update([
                'produk_nama' => $request->produk_nama,
                'produk_lrmp_r' => $request->produk_lrmp_r,
                'produk_lrmp_no' => $request->produk_lrmp_no,
                'produk_no_fail' => $request->produk_no_fail,
                'produk_tarikh_gazet' => $request->produk_tarikh_gazet,
                'produk_tarikh_tamat' => $request->produk_tarikh_tamat,
                'produk_tarikh_penwartaan' => $request->produk_tarikh_penwartaan,
                'produk_kelas_racun' => $request->produk_kelas_racun,
                'produk_categori' => $request->produk_categori,
                'produk_categori_lain' => $request->produk_categori_lain,
                'produk_kegunaan' => $request->produk_kegunaan,
                'produk_kegunaan_lain' => $request->produk_kegunaan_lain,
                'produk_saiz_isian_1' => $request->produk_saiz_isian_1,
                'produk_saiz_lain_1' => $request->produk_saiz_lain_1,
                'produk_saiz_isian_2' => $request->produk_saiz_isian_2,
                'produk_saiz_lain_2' => $request->produk_saiz_lain_2,
                'produk_saiz_isian_3' => $request->produk_saiz_isian_3,
                'produk_saiz_lain_3' => $request->produk_saiz_lain_3,
                'produk_saiz_isian_4' => $request->produk_saiz_isian_4,
                'produk_saiz_lain_4' => $request->produk_saiz_lain_4,
                'produk_saiz_isian_5' => $request->produk_saiz_isian_5,
                'produk_saiz_lain_5' => $request->produk_saiz_lain_5,
                'produk_saiz_isian_6' => $request->produk_saiz_isian_6,
                'produk_saiz_lain_6' => $request->produk_saiz_lain_6,
                'produk_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/produk')->withSuccess('Produk '.$produk->produk_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/produk')->withWarning('Produk '.$produk->produk_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete produk based on id
    public function delete($id){
        try{
            $produk = Produk::find($id);
            $produk->delete();
            return redirect('/produk')->withSuccess('Produk '.$produk->produk_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/produk')->withWarning('Produk '.$produk->produk_nama.' tidak berjaya dipadamkan!');
        }
    }
}
