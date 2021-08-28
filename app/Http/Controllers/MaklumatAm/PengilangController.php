<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengilang;
use App\Models\User;
use Carbon\Carbon;

class PengilangController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data pengilang
            $pengilangs = Pengilang::all();
        } else {
            // All data pengilang
            $pengilangs = User::find(Auth::user()->id)->pengilangs;
        }

        // Summary
        $TotalPengilang = Pengilang::count();
        $TotalPengilangAktif = Pengilang::where('pengilang_status', '=', 'Aktif')->count();
        $TotalPengilangTidakAktif = Pengilang::where('pengilang_status', '=', 'Tidak Aktif')->count();
        $TotalPengilangBulanTerkini = Pengilang::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_pengilang', [
            'pengilangs' => $pengilangs,
            'totalpengilang' => $TotalPengilang,
            'totalpengilangaktif' => $TotalPengilangAktif, 
            'totalpengilangtidakaktif' => $TotalPengilangTidakAktif, 
            'totalpengilangbulanterkini' => $TotalPengilangBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data based on id
    public function view($id) {
        // Data pengilang
        $pengilang = Pengilang::find($id);
        $data = array(
            'pengilangs' => $pengilang,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.pengilang')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data pengilang
        $pengilang = Pengilang::find($id);
        
        $data = array(
            'pengilangs' => $pengilang,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.pengilang')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'pengilang_nama' => 'required',
            'pengilang_no_roc' => 'required',
            'pengilang_bangunan' => 'required',
            'pengilang_jalan' => 'required',
            'pengilang_poskod' => 'required',
            'pengilang_bandar' => 'required',
            'pengilang_negeri' => 'required',
            'pengilang_negeri_luar_malaysia' => 'required',
            'pengilang_negara' => 'required',
            'pengilang_no_tel' => 'required',
            'pengilang_no_faks' => 'required',
            'pengilang_emel' => 'required|email',
            // 'pengilang_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->pengilangs()->create([
                'pengilang_nama' => $request->pengilang_nama,
                'pengilang_no_roc' => $request->pengilang_no_roc,
                'pengilang_bangunan' => $request->pengilang_bangunan,
                'pengilang_jalan' => $request->pengilang_jalan,
                'pengilang_poskod' => $request->pengilang_poskod,
                'pengilang_bandar' => $request->pengilang_bandar,
                'pengilang_negeri' => $request->pengilang_negeri,
                'pengilang_negeri_luar_malaysia' => $request->pengilang_negeri_luar_malaysia,
                'pengilang_negara' => $request->pengilang_negara,
                'pengilang_no_tel' => $request->pengilang_no_tel,
                'pengilang_no_faks' => $request->pengilang_no_faks,
                'pengilang_emel' => $request->pengilang_emel,
                'pengilang_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/pengilang')->withSuccess('Pengilang '.$request->pengilang_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pengilang')->withWarning('Pengilang '.$request->pengilang_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update pengilang based on id
    public function update(Request $request, $id){
        $request->validate([
            'pengilang_nama' => 'required',
            'pengilang_no_roc' => 'required',
            'pengilang_bangunan' => 'required',
            'pengilang_jalan' => 'required',
            'pengilang_poskod' => 'required',
            'pengilang_bandar' => 'required',
            'pengilang_negeri' => 'required',
            'pengilang_negeri_luar_malaysia' => 'required',
            'pengilang_negara' => 'required',
            'pengilang_no_tel' => 'required',
            'pengilang_no_faks' => 'required',
            'pengilang_emel' => 'required|email',
            // 'pengilang_status' => 'required',
        ]);

        try {
            $pengilang = Pengilang::find($id);
            $pengilang->update([
                'pengilang_nama' => $request->pengilang_nama,
                'pengilang_no_roc' => $request->pengilang_no_roc,
                'pengilang_bangunan' => $request->pengilang_bangunan,
                'pengilang_jalan' => $request->pengilang_jalan,
                'pengilang_poskod' => $request->pengilang_poskod,
                'pengilang_bandar' => $request->pengilang_bandar,
                'pengilang_negeri' => $request->pengilang_negeri,
                'pengilang_negeri_luar_malaysia' => $request->pengilang_negeri_luar_malaysia,
                'pengilang_negara' => $request->pengilang_negara,
                'pengilang_no_tel' => $request->pengilang_no_tel,
                'pengilang_no_faks' => $request->pengilang_no_faks,
                'pengilang_emel' => $request->pengilang_emel,
                'pengilang_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/pengilang')->withSuccess('Pengilang '.$pengilang->pengilang_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/pengilang')->withWarning('Pengilang '.$pengilang->pengilang_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete pengilang based on id
    public function delete($id){
        try{
            $pengilang = Pengilang::find($id);
            $pengilang->delete();
            return redirect('/pengilang')->withSuccess('Pengilang '.$pengilang->pengilang_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/pengilang')->withWarning('Pengilang '.$pengilang->pengilang_nama.' tidak berjaya dipadamkan!');
        }
    }
}
