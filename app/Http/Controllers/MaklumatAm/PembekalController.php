<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListNegara;
use App\Models\Pembekal;
use App\Models\User;
use Carbon\Carbon;

class PembekalController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data pembekal
            $gudangs = Pembekal::all();
        } else {
            // All data pembekal
            $pembekals = User::find(Auth::user()->id)->pembekals;
        }

        // Summary
        $TotalPembekal = Pembekal::count();
        $TotalPembekalAktif = Pembekal::where('pembekal_status', '=', 'Aktif')->count();
        $TotalPembekalTidakAktif = Pembekal::where('pembekal_status', '=', 'Tidak Aktif')->count();
        $TotalPembekalBulanTerkini = Pembekal::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_pembekal', [
            'pembekals' => $pembekals,
            'totalpembekal' => $TotalPembekal,
            'totalpembekalaktif' => $TotalPembekalAktif, 
            'totalpembekaltidakaktif' => $TotalPembekalTidakAktif, 
            'totalpembekalbulanterkini' => $TotalPembekalBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data based on id
    public function view($id) {
        // Data pembekal
        $pembekal = Pembekal::find($id);
        $data = array(
            'pembekals' => $pembekal,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.pembekal')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data pembekal
        $pembekal = Pembekal::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'pembekals' => $pembekal,
            'list_negara' => $list_negara,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.pembekal')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'pembekal_nama' => 'required',
            'pembekal_no_roc' => 'required',
            'pembekal_bangunan' => 'required',
            'pembekal_jalan' => 'required',
            'pembekal_poskod' => 'required',
            'pembekal_bandar' => 'required',
            'pembekal_negeri' => 'required',
            'pembekal_negeri_luar_malaysia' => 'required',
            'pembekal_negara' => 'required',
            'pembekal_no_tel' => 'required',
            'pembekal_no_faks' => 'required',
            'pembekal_emel' => 'required|email',
            // 'pembekal_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->pembekals()->create([
                'pembekal_nama' => $request->pembekal_nama,
                'pembekal_no_roc' => $request->pembekal_no_roc,
                'pembekal_bangunan' => $request->pembekal_bangunan,
                'pembekal_jalan' => $request->pembekal_jalan,
                'pembekal_poskod' => $request->pembekal_poskod,
                'pembekal_bandar' => $request->pembekal_bandar,
                'pembekal_negeri' => $request->pembekal_negeri,
                'pembekal_negeri_luar_malaysia' => $request->pembekal_negeri_luar_malaysia,
                'pembekal_negara' => $request->pembekal_negara,
                'pembekal_no_tel' => $request->pembekal_no_tel,
                'pembekal_no_faks' => $request->pembekal_no_faks,
                'pembekal_emel' => $request->pembekal_emel,
                'pembekal_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/pembekal')->withSuccess('Pembekal '.$request->pembekal_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pembekal')->withWarning('Pembekal '.$request->pembekal_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update pembekal based on id
    public function update(Request $request, $id){
        $request->validate([
            'pembekal_nama' => 'required',
            'pembekal_no_roc' => 'required',
            'pembekal_bangunan' => 'required',
            'pembekal_jalan' => 'required',
            'pembekal_poskod' => 'required',
            'pembekal_bandar' => 'required',
            'pembekal_negeri' => 'required',
            'pembekal_negeri_luar_malaysia' => 'required',
            'pembekal_negara' => 'required',
            'pembekal_no_tel' => 'required',
            'pembekal_no_faks' => 'required',
            'pembekal_emel' => 'required|email',
            // 'pembekal_status' => 'required',
        ]);

        try {
            $pembekal = Pembekal::find($id);
            $pembekal->update([
                'pembekal_nama' => $request->pembekal_nama,
                'pembekal_no_roc' => $request->pembekal_no_roc,
                'pembekal_bangunan' => $request->pembekal_bangunan,
                'pembekal_jalan' => $request->pembekal_jalan,
                'pembekal_poskod' => $request->pembekal_poskod,
                'pembekal_bandar' => $request->pembekal_bandar,
                'pembekal_negeri' => $request->pembekal_negeri,
                'pembekal_negeri_luar_malaysia' => $request->pembekal_negeri_luar_malaysia,
                'pembekal_negara' => $request->pembekal_negara,
                'pembekal_no_tel' => $request->pembekal_no_tel,
                'pembekal_no_faks' => $request->pembekal_no_faks,
                'pembekal_emel' => $request->pembekal_emel,
                'pembekal_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/pembekal')->withSuccess('Pembekal '.$pembekal->pembekal_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/pembekal')->withWarning('Pembekal '.$pembekal->pembekal_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete pembekal based on id
    public function delete($id){
        try{
            $pembekal = Pembekal::find($id);
            $pembekal->delete();
            return redirect('/pembekal')->withSuccess('Pembekal '.$pembekal->pembekal_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/pembekal')->withWarning('Pembekal '.$pembekal->pembekal_nama.' tidak berjaya dipadamkan!');
        }
    }
}
