<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListNegara;
use App\Models\Perawis;
use App\Models\User;
use Carbon\Carbon;


class PerawisController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data perawis
            $perawiss = Perawis::all();
        } else {
            // All data perawis
            $perawiss = User::find(Auth::user()->id)->perawiss;
        }

        // Summary
        $TotalPerawis = Perawis::count();
        $TotalPerawisAktif = Perawis::where('perawis_status', '=', 'Aktif')->count();
        $TotalPerawisTidakAktif = Perawis::where('perawis_status', '=', 'Tidak Aktif')->count();
        $TotalPerawisBulanTerkini = Perawis::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_perawis', [
            'perawiss' => $perawiss,
            'totalperawis' => $TotalPerawis,
            'totalperawisaktif' => $TotalPerawisAktif, 
            'totalperawistidakaktif' => $TotalPerawisTidakAktif, 
            'totalperawisbulanterkini' => $TotalPerawisBulanTerkini,
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
        
        return view('maklumat_am.forms.perawis')->with($data);
    }

    // Show data based on id
    public function view($id) {
        // Data perawis
        $perawis = Perawis::find($id);
        $data = array(
            'perawiss' => $perawis,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.perawis')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data perawis
        $perawis = Perawis::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'perawiss' => $perawis,
            'list_negara' => $list_negara,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.perawis')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'perawis_nama' => 'required',
            'perawis_no_roc' => 'required',
            'perawis_bangunan' => 'required',
            'perawis_jalan' => 'required',
            'perawis_poskod' => 'required',
            'perawis_bandar' => 'required',
            'perawis_negeri' => 'required',
            'perawis_negeri_luar_malaysia' => 'required',
            'perawis_negara' => 'required',
            'perawis_no_tel' => 'required',
            'perawis_no_faks' => 'required',
            'perawis_emel' => 'required|email',
            // 'perawis_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->perawiss()->create([
                'perawis_nama' => $request->perawis_nama,
                'perawis_no_roc' => $request->perawis_no_roc,
                'perawis_bangunan' => $request->perawis_bangunan,
                'perawis_jalan' => $request->perawis_jalan,
                'perawis_poskod' => $request->perawis_poskod,
                'perawis_bandar' => $request->perawis_bandar,
                'perawis_negeri' => $request->perawis_negeri,
                'perawis_negeri_luar_malaysia' => $request->perawis_negeri_luar_malaysia,
                'perawis_negara' => $request->perawis_negara,
                'perawis_no_tel' => $request->perawis_no_tel,
                'perawis_no_faks' => $request->perawis_no_faks,
                'perawis_emel' => $request->perawis_emel,
                'perawis_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/perawis')->withSuccess('Perawis '.$request->perawis_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/perawis')->withWarning('Perawis '.$request->perawis_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update perawis based on id
    public function update(Request $request, $id){
        $request->validate([
            'perawis_nama' => 'required',
            'perawis_no_roc' => 'required',
            'perawis_bangunan' => 'required',
            'perawis_jalan' => 'required',
            'perawis_poskod' => 'required',
            'perawis_bandar' => 'required',
            'perawis_negeri' => 'required',
            'perawis_negeri_luar_malaysia' => 'required',
            'perawis_negara' => 'required',
            'perawis_no_tel' => 'required',
            'perawis_no_faks' => 'required',
            'perawis_emel' => 'required|email',
            // 'perawis_status' => 'required',
        ]);

        try {
            $perawis = Perawis::find($id);
            $perawis->update([
                'perawis_nama' => $request->perawis_nama,
                'perawis_no_roc' => $request->perawis_no_roc,
                'perawis_bangunan' => $request->perawis_bangunan,
                'perawis_jalan' => $request->perawis_jalan,
                'perawis_poskod' => $request->perawis_poskod,
                'perawis_bandar' => $request->perawis_bandar,
                'perawis_negeri' => $request->perawis_negeri,
                'perawis_negeri_luar_malaysia' => $request->perawis_negeri_luar_malaysia,
                'perawis_negara' => $request->perawis_negara,
                'perawis_no_tel' => $request->perawis_no_tel,
                'perawis_no_faks' => $request->perawis_no_faks,
                'perawis_emel' => $request->perawis_emel,
                'perawis_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/perawis')->withSuccess('Perawis '.$perawis->perawis_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/perawis')->withWarning('Perawis '.$perawis->perawis_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete perawis based on id
    public function delete($id){
        try{
            $perawis = Perawis::find($id);
            $perawis->delete();
            return redirect('/perawis')->withSuccess('Perawis '.$perawis->perawis_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/perawis')->withWarning('Perawis '.$perawis->perawis_nama.' tidak berjaya dipadamkan!');
        }
    }
}
