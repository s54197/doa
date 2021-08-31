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

        $data = array(
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
        
        $data = array(
            'perawiss' => $perawis,
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
            'perawis_nama_kimia' => 'required',
            'perawis_sinonim' => 'required',
            'perawis_cas' => 'required',
            'perawis_hscode' => 'required',
            'perawis_ahtncode' => 'required',
            'perawis_piawaian' => 'required',
            'perawis_sampel' => 'required',
            'perawis_pihak_ketiga' => 'required',
            'perawis_kumpulan_kimia' => 'required',
            'perawis_kaedah' => 'required',
            'perawis_tarikh_lulus' => 'required',
            'perawis_tarikh_terhad' => 'required',
            'perawis_peratusan' => 'required',
            'perawis_unit' => 'required',
            'perawis_unit_lain' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->perawiss()->create([
                'perawis_nama' => $request->perawis_nama,
                'perawis_nama_kimia' => $request->perawis_nama_kimia,
                'perawis_sinonim' => $request->perawis_sinonim,
                'perawis_cas' => $request->perawis_cas,
                'perawis_hscode' => $request->perawis_hscode,
                'perawis_ahtncode' => $request->perawis_ahtncode,
                'perawis_piawaian' => $request->perawis_piawaian,
                'perawis_sampel' => $request->perawis_sampel,
                'perawis_pihak_ketiga' => $request->perawis_pihak_ketiga,
                'perawis_kumpulan_kimia' => $request->perawis_kumpulan_kimia,
                'perawis_kaedah' => $request->perawis_kaedah,
                'perawis_tarikh_lulus' => $request->perawis_tarikh_lulus,
                'perawis_peratusan' => $request->perawis_peratusan,
                'perawis_unit' => $request->perawis_unit,
                'perawis_unit_lain' => $request->perawis_unit_lain,
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
            'perawis_nama_kimia' => 'required',
            'perawis_sinonim' => 'required',
            'perawis_cas' => 'required',
            'perawis_hscode' => 'required',
            'perawis_ahtncode' => 'required',
            'perawis_piawaian' => 'required',
            'perawis_sampel' => 'required',
            'perawis_pihak_ketiga' => 'required',
            'perawis_kumpulan_kimia' => 'required',
            'perawis_kaedah' => 'required',
            'perawis_tarikh_lulus' => 'required',
            'perawis_tarikh_terhad' => 'required',
            'perawis_peratusan' => 'required',
            'perawis_unit' => 'required',
            'perawis_unit_lain' => 'required',
        ]);

        try {
            $perawis = Perawis::find($id);
            $perawis->update([
                'perawis_nama' => $request->perawis_nama,
                'perawis_nama_kimia' => $request->perawis_nama_kimia,
                'perawis_sinonim' => $request->perawis_sinonim,
                'perawis_cas' => $request->perawis_cas,
                'perawis_hscode' => $request->perawis_hscode,
                'perawis_ahtncode' => $request->perawis_ahtncode,
                'perawis_piawaian' => $request->perawis_piawaian,
                'perawis_sampel' => $request->perawis_sampel,
                'perawis_pihak_ketiga' => $request->perawis_pihak_ketiga,
                'perawis_kumpulan_kimia' => $request->perawis_kumpulan_kimia,
                'perawis_kaedah' => $request->perawis_kaedah,
                'perawis_tarikh_lulus' => $request->perawis_tarikh_lulus,
                'perawis_peratusan' => $request->perawis_peratusan,
                'perawis_unit' => $request->perawis_unit,
                'perawis_unit_lain' => $request->perawis_unit_lain,
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
