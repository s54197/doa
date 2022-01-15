<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListNegara;
use App\Models\PihakKetiga;
use App\Models\User;
use Carbon\Carbon;
use Exception;

class PengilangController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;

        if ($role=='admin') {
            // All data pengilang
            $pengilangs = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->get();
        } else {
            // All data pengilang
            $pengilangs = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pengilang')->get();
        }

        // Summary
        $TotalPengilang = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->count();
        $TotalPengilangAktif = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->where('pihak_ketiga_status', '=', 'Aktif')->count();
        $TotalPengilangTidakAktif = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->where('pihak_ketiga_status', '=', 'Tidak Aktif')->count();
        $TotalPengilangBulanTerkini = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_pengilang', [
            'pengilangs' => $pengilangs,
            'totalpengilang' => $TotalPengilang,
            'totalpengilangaktif' => $TotalPengilangAktif, 
            'totalpengilangtidakaktif' => $TotalPengilangTidakAktif, 
            'totalpengilangbulanterkini' => $TotalPengilangBulanTerkini,
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
        
        return view('maklumat_am.forms.pengilang')->with($data);
    }
    
    // Show data based on id
    public function view($id) {
        // Data negara
        $list_negara = ListNegara::all();

        // Data pengilang
        $pengilang = PihakKetiga::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'list_negara' => $list_negara,
            'pengilangs' => $pengilang,
            'list_negara' => $list_negara,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.pengilang')->with($data);
    }

    // Update data based on id
    public function update_view($id) {
        // Data pengilang
        $pengilang = PihakKetiga::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'pengilangs' => $pengilang,            
            'list_negara' => $list_negara,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.pengilang')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'pihak_ketiga_nama' => 'required',
            // 'pihak_ketiga_no_roc' => 'required',
            // 'pihak_ketiga_bangunan' => 'required',
            // 'pihak_ketiga_jalan' => 'required',
            // 'pihak_ketiga_poskod' => 'required',
            // 'pihak_ketiga_bandar' => 'required',
            // 'pihak_ketiga_negeri' => 'required',
            // 'pihak_ketiga_negeri_luar_malaysia' => 'required',
            // 'pihak_ketiga_negara' => 'required',
            // 'pihak_ketiga_no_tel' => 'required',
            // 'pihak_ketiga_no_faks' => 'required',
            // 'pihak_ketiga_emel' => 'required|email',
            // 'pihak_ketiga_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->pihakketigas()->create([
                'pihak_ketiga_nama' => $request->pihak_ketiga_nama,
                'pihak_ketiga_no_roc' => $request->pihak_ketiga_no_roc,
                'pihak_ketiga_bangunan' => $request->pihak_ketiga_bangunan,
                'pihak_ketiga_jalan' => $request->pihak_ketiga_jalan,
                'pihak_ketiga_poskod' => $request->pihak_ketiga_poskod,
                'pihak_ketiga_bandar' => $request->pihak_ketiga_bandar,
                'pihak_ketiga_negeri' => $request->pihak_ketiga_negeri,
                'pihak_ketiga_negeri_luar_malaysia' => $request->pihak_ketiga_negeri_luar_malaysia,
                'pihak_ketiga_negara' => $request->pihak_ketiga_negara,
                'pihak_ketiga_no_tel' => $request->pihak_ketiga_no_tel,
                'pihak_ketiga_no_faks' => $request->pihak_ketiga_no_faks,
                'pihak_ketiga_emel' => $request->pihak_ketiga_emel,
                'pihak_ketiga_status' => 'Aktif',
                'pihak_ketiga_jenis' => 'pengilang',
                'user_id' => $user->id,
            ]);
            return redirect('/pengilang')->withSuccess('Pengilang '.$request->pihak_ketiga_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pengilang')->withWarning('Pengilang '.$request->pihak_ketiga_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update pengilang based on id
    public function update(Request $request, $id){
        $request->validate([
            'pihak_ketiga_nama' => 'required',
            // 'pihak_ketiga_no_roc' => 'required',
            // 'pihak_ketiga_bangunan' => 'required',
            // 'pihak_ketiga_jalan' => 'required',
            // 'pihak_ketiga_poskod' => 'required',
            // 'pihak_ketiga_bandar' => 'required',
            // 'pihak_ketiga_negeri' => 'required',
            // 'pihak_ketiga_negeri_luar_malaysia' => 'required',
            // 'pihak_ketiga_negara' => 'required',
            // 'pihak_ketiga_no_tel' => 'required',
            // 'pihak_ketiga_no_faks' => 'required',
            // 'pihak_ketiga_emel' => 'required|email',
            // 'pihak_ketiga_status' => 'required',
        ]);

        try {
            $pengilang = PihakKetiga::find($id);
            $pengilang->update([
                'pihak_ketiga_nama' => $request->pihak_ketiga_nama,
                'pihak_ketiga_no_roc' => $request->pihak_ketiga_no_roc,
                'pihak_ketiga_bangunan' => $request->pihak_ketiga_bangunan,
                'pihak_ketiga_jalan' => $request->pihak_ketiga_jalan,
                'pihak_ketiga_poskod' => $request->pihak_ketiga_poskod,
                'pihak_ketiga_bandar' => $request->pihak_ketiga_bandar,
                'pihak_ketiga_negeri' => $request->pihak_ketiga_negeri,
                'pihak_ketiga_negeri_luar_malaysia' => $request->pihak_ketiga_negeri_luar_malaysia,
                'pihak_ketiga_negara' => $request->pihak_ketiga_negara,
                'pihak_ketiga_no_tel' => $request->pihak_ketiga_no_tel,
                'pihak_ketiga_no_faks' => $request->pihak_ketiga_no_faks,
                'pihak_ketiga_emel' => $request->pihak_ketiga_emel,
                'pihak_ketiga_status' => 'Aktif',
                'pihak_ketiga_jenis' => 'pengilang',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/pengilang')->withSuccess('Pengilang '.$pengilang->pihak_ketiga_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/pengilang')->withWarning('Pengilang '.$pengilang->pihak_ketiga_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete pengilang based on id
    public function delete($id){
        try{
            $pengilang = PihakKetiga::find($id);
            $pengilang->delete();
            return redirect('/pengilang')->withSuccess('Pengilang '.$pengilang->pihak_ketiga_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/pengilang')->withWarning('Pengilang '.$pengilang->pihak_ketiga_nama.' tidak berjaya dipadamkan!');
        }
    }
}
