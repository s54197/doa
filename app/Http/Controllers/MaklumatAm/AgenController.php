<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Models\User;
use Carbon\Carbon;

class AgenController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data agen
            $agens = Agen::all();
        } else {
            // All data agen
            $agens = User::find(Auth::user()->id)->agens;
        }

        // Summary
        $TotalAgen = Agen::count();
        $TotalAgenAktif = Agen::where('agen_status', '=', 'Aktif')->count();
        $TotalAgenTidakAktif = Agen::where('agen_status', '=', 'Tidak Aktif')->count();
        $TotalAgenBulanTerkini = Agen::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_agen', [
            'agens' => $agens,
            'totalagen' => $TotalAgen,
            'totalagenaktif' => $TotalAgenAktif, 
            'totalagentidakaktif' => $TotalAgenTidakAktif, 
            'totalagenbulanterkini' => $TotalAgenBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data based on id
    public function view($id) {
        // Data agen
        $agen = Agen::find($id);
        $data = array(
            'agens' => $agen,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.agen')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data agen
        $agen = Agen::find($id);
 
        $data = array(
            'agens' => $agen,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.agen')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'agen_nama' => 'required',
            'agen_ic' => 'required',
            'agen_syarikat' => 'required',
            'agen_roc' => 'required',
            'agen_bangunan' => 'required',
            'agen_jalan' => 'required',
            'agen_poskod' => 'required',
            'agen_bandar' => 'required',
            'agen_negeri' => 'required',
            'agen_no_tel' => 'required',
            // 'agen_no_faks' => 'required',
            'agen_emel' => 'required|email',
            // 'agen_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->agens()->create([
                'agen_nama' => $request->agen_nama,
                'agen_ic' => $request->agen_ic,
                'agen_syarikat' => $request->agen_syarikat,
                'agen_roc' => $request->agen_roc,
                'agen_bangunan' => $request->agen_bangunan,
                'agen_jalan' => $request->agen_jalan,
                'agen_poskod' => $request->agen_poskod,
                'agen_bandar' => $request->agen_bandar,
                'agen_negeri' => $request->agen_negeri,
                'agen_no_tel' => $request->agen_no_tel,
                'agen_no_faks' => $request->agen_no_faks,
                'agen_emel' => $request->agen_emel,
                'agen_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/agen')->withSuccess('Agen '.$request->agen_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/agen')->withWarning('Agen '.$request->agen_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update agen based on id
    public function update(Request $request, $id){
        $request->validate([
            'agen_nama' => 'required',
            'agen_ic' => 'required',
            'agen_syarikat' => 'required',
            'agen_roc' => 'required',
            'agen_bangunan' => 'required',
            'agen_jalan' => 'required',
            'agen_poskod' => 'required',
            'agen_bandar' => 'required',
            'agen_negeri' => 'required',
            'agen_no_tel' => 'required',
            // 'agen_no_faks' => 'required',
            'agen_emel' => 'required|email',
            // 'agen_status' => 'required',
        ]);

        try {
            $agen = Agen::find($id);
            $agen->update([
                'agen_nama' => $request->agen_nama,
                'agen_ic' => $request->agen_ic,
                'agen_syarikat' => $request->agen_syarikat,
                'agen_roc' => $request->agen_roc,
                'agen_bangunan' => $request->agen_bangunan,
                'agen_jalan' => $request->agen_jalan,
                'agen_poskod' => $request->agen_poskod,
                'agen_bandar' => $request->agen_bandar,
                'agen_negeri' => $request->agen_negeri,
                'agen_no_tel' => $request->agen_no_tel,
                'agen_no_faks' => $request->agen_no_faks,
                'agen_emel' => $request->agen_emel,
                'agen_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/agen')->withSuccess('Agen '.$agen->agen_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/agen')->withWarning('Agen '.$agen->agen_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete agen based on id
    public function delete($id){
        try{
            $agen = Agen::find($id);
            $agen->delete();
            return redirect('/agen')->withSuccess('Agen '.$agen->agen_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/agen')->withWarning('Agen '.$agen->agen_nama.' tidak berjaya dipadamkan!');
        }
    }
}
