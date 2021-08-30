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
        $data = array(
            'produks' => $produk,
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
            'produk_no_roc' => 'required',
            'produk_bangunan' => 'required',
            'produk_jalan' => 'required',
            'produk_poskod' => 'required',
            'produk_bandar' => 'required',
            'produk_negeri' => 'required',
            'produk_negeri_luar_malaysia' => 'required',
            'produk_negara' => 'required',
            'produk_no_tel' => 'required',
            'produk_no_faks' => 'required',
            'produk_emel' => 'required|email',
            // 'produk_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->produks()->create([
                'produk_nama' => $request->produk_nama,
                'produk_no_roc' => $request->produk_no_roc,
                'produk_bangunan' => $request->produk_bangunan,
                'produk_jalan' => $request->produk_jalan,
                'produk_poskod' => $request->produk_poskod,
                'produk_bandar' => $request->produk_bandar,
                'produk_negeri' => $request->produk_negeri,
                'produk_negeri_luar_malaysia' => $request->produk_negeri_luar_malaysia,
                'produk_negara' => $request->produk_negara,
                'produk_no_tel' => $request->produk_no_tel,
                'produk_no_faks' => $request->produk_no_faks,
                'produk_emel' => $request->produk_emel,
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
            'produk_no_roc' => 'required',
            'produk_bangunan' => 'required',
            'produk_jalan' => 'required',
            'produk_poskod' => 'required',
            'produk_bandar' => 'required',
            'produk_negeri' => 'required',
            'produk_negeri_luar_malaysia' => 'required',
            'produk_negara' => 'required',
            'produk_no_tel' => 'required',
            'produk_no_faks' => 'required',
            'produk_emel' => 'required|email',
            // 'produk_status' => 'required',
        ]);

        try {
            $produk = Produk::find($id);
            $produk->update([
                'produk_nama' => $request->produk_nama,
                'produk_no_roc' => $request->produk_no_roc,
                'produk_bangunan' => $request->produk_bangunan,
                'produk_jalan' => $request->produk_jalan,
                'produk_poskod' => $request->produk_poskod,
                'produk_bandar' => $request->produk_bandar,
                'produk_negeri' => $request->produk_negeri,
                'produk_negeri_luar_malaysia' => $request->produk_negeri_luar_malaysia,
                'produk_negara' => $request->produk_negara,
                'produk_no_tel' => $request->produk_no_tel,
                'produk_no_faks' => $request->produk_no_faks,
                'produk_emel' => $request->produk_emel,
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
