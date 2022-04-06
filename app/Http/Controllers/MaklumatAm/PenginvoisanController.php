<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ListNegara;
use App\Models\Penginvoisan;
use App\Models\User;
use Carbon\Carbon;
use Exception;

class PenginvoisanController extends Controller
{
    // All data
    public function index() {
         
        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data penginvoisan
            $penginvoisans = Penginvoisan::all();
        } else {
            // All data penginvoisan
            // $penginvoisans = User::find(Auth::user()->id)->penginvoisans;
            $penginvoisans = Penginvoisan::all();
        }

        // Summary
        $TotalPenginvoisan = Penginvoisan::count();
        $TotalPenginvoisanAktif = Penginvoisan::where('penginvoisan_status', '=', 'Aktif')->count();
        $TotalPenginvoisanTidakAktif = Penginvoisan::where('penginvoisan_status', '=', 'Tidak Aktif')->count();
        $TotalPenginvoisanBulanTerkini = Penginvoisan::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_penginvoisan', [
            'penginvoisans' => $penginvoisans,
            'totalpenginvoisan' => $TotalPenginvoisan,
            'totalpenginvoisanaktif' => $TotalPenginvoisanAktif, 
            'totalpenginvoisantidakaktif' => $TotalPenginvoisanTidakAktif, 
            'totalpenginvoisanbulanterkini' => $TotalPenginvoisanBulanTerkini,
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
        
        return view('maklumat_am.forms.penginvoisan')->with($data);
    }
    
    // Show data based on id
    public function view($id) {
        // Data negara
        $list_negara = ListNegara::all();
        // Data penginvoisan
        $penginvoisan = Penginvoisan::find($id);
        // Data negara
        $list_negara = ListNegara::all();

        $data = array(
            'list_negara' => $list_negara,
            'penginvoisans' => $penginvoisan,
            'list_negara' => $list_negara,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.penginvoisan')->with($data);
    }

    // Update data based on id
    public function update_view($id) {
        // Data penginvoisan
        $penginvoisan = Penginvoisan::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        
        $data = array(
            'penginvoisans' => $penginvoisan,
            'list_negara' => $list_negara,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.penginvoisan')->with($data);
    }

    // Store data
    public function store(Request $request){
        $request->validate([
            'penginvoisan_nama' => 'required',
            // 'penginvoisan_no_roc' => 'required',
            // 'penginvoisan_bangunan' => 'required',
            // 'penginvoisan_jalan' => 'required',
            // 'penginvoisan_poskod' => 'required',
            // 'penginvoisan_bandar' => 'required',
            // 'penginvoisan_negeri' => 'required',
            // 'penginvoisan_negeri_luar_malaysia' => 'required',
            // 'penginvoisan_negara' => 'required',
            // 'penginvoisan_no_tel' => 'required',
            // 'penginvoisan_no_faks' => 'required',
            // 'penginvoisan_emel' => 'required|email',
            // 'penginvoisan_status' => 'required',
        ]);
        
        try {
            $user = User::find(Auth::user()->id);
            $user->penginvoisans()->create([
                'penginvoisan_nama' => $request->penginvoisan_nama,
                'penginvoisan_no_roc' => $request->penginvoisan_no_roc,
                'penginvoisan_bangunan' => $request->penginvoisan_bangunan,
                'penginvoisan_jalan' => $request->penginvoisan_jalan,
                'penginvoisan_poskod' => $request->penginvoisan_poskod,
                'penginvoisan_bandar' => $request->penginvoisan_bandar,
                'penginvoisan_negeri' => $request->penginvoisan_negeri,
                'penginvoisan_negeri_luar_malaysia' => $request->penginvoisan_negeri_luar_malaysia,
                'penginvoisan_negara' => $request->penginvoisan_negara,
                'penginvoisan_no_tel' => $request->penginvoisan_no_tel,
                'penginvoisan_no_faks' => $request->penginvoisan_no_faks,
                'penginvoisan_emel' => $request->penginvoisan_emel,
                'penginvoisan_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/penginvoisan')->withSuccess('Penginvoisan '.$request->penginvoisan_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/penginvoisan')->withWarning('Penginvoisan '.$request->penginvoisan_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update penginvoisan based on id
    public function update(Request $request, $id){
        $request->validate([
            'penginvoisan_nama' => 'required',
            // 'penginvoisan_no_roc' => 'required',
            // 'penginvoisan_bangunan' => 'required',
            // 'penginvoisan_jalan' => 'required',
            // 'penginvoisan_poskod' => 'required',
            // 'penginvoisan_bandar' => 'required',
            // 'penginvoisan_negeri' => 'required',
            // 'penginvoisan_negeri_luar_malaysia' => 'required',
            // 'penginvoisan_negara' => 'required',
            // 'penginvoisan_no_tel' => 'required',
            // 'penginvoisan_no_faks' => 'required',
            // 'penginvoisan_emel' => 'required|email',
            // 'penginvoisan_status' => 'required',
        ]);

        try {
            $penginvoisan = Penginvoisan::find($id);
            $penginvoisan->update([
                'penginvoisan_nama' => $request->penginvoisan_nama,
                'penginvoisan_no_roc' => $request->penginvoisan_no_roc,
                'penginvoisan_bangunan' => $request->penginvoisan_bangunan,
                'penginvoisan_jalan' => $request->penginvoisan_jalan,
                'penginvoisan_poskod' => $request->penginvoisan_poskod,
                'penginvoisan_bandar' => $request->penginvoisan_bandar,
                'penginvoisan_negeri' => $request->penginvoisan_negeri,
                'penginvoisan_negeri_luar_malaysia' => $request->penginvoisan_negeri_luar_malaysia,
                'penginvoisan_negara' => $request->penginvoisan_negara,
                'penginvoisan_no_tel' => $request->penginvoisan_no_tel,
                'penginvoisan_no_faks' => $request->penginvoisan_no_faks,
                'penginvoisan_emel' => $request->penginvoisan_emel,
                'penginvoisan_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/penginvoisan')->withSuccess('Penginvoisan '.$penginvoisan->penginvoisan_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/penginvoisan')->withWarning('Penginvoisan '.$penginvoisan->penginvoisan_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete penginvoisan based on id
    public function delete($id){
        try{
            $penginvoisan = Penginvoisan::find($id);
            $penginvoisan->delete();
            return redirect('/penginvoisan')->withSuccess('Penginvoisan '.$penginvoisan->penginvoisan_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/penginvoisan')->withWarning('Penginvoisan '.$penginvoisan->penginvoisan_nama.' tidak berjaya dipadamkan!');
        }
    }
}
