<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syarikat;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class SyarikatController extends Controller
{
    
    // All data
    public function index() {
        // All data syarikat
        $syarikats = Syarikat::all();
        // Summary
        $TotalSyarikat = Syarikat::count();
        $TotalSyarikatAktif = Syarikat::where('syarikat_status', '=', 'Aktif')->count();
        $TotalSyarikatTidakAktif = Syarikat::where('syarikat_status', '=', 'Tidak Aktif')->count();
        $TotalSyarikatBulanTerkini = Syarikat::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_syarikat', [
            'syarikats' => $syarikats,
            'totalsyarikat' => $TotalSyarikat,
            'totalsyarikataktif' => $TotalSyarikatAktif, 
            'totalsyarikattidakaktif' => $TotalSyarikatTidakAktif, 
            'totalsyarikatbulanterkini' => $TotalSyarikatBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data based on id
    public function view($id) {
        // Data syarikat
        $syarikat = Syarikat::find($id);
        $data = array(
            'syarikats' => $syarikat,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.syarikat')->with($data);
    }
    
    // Store data
    public function store(Request $request){
        
        $request->validate([
            'syarikat_nama' => 'required',
            'syarikat_no_roc' => 'required',
            'syarikat_tarikh_roc' => 'required',
            'syarikat_bangunan' => 'required',
            'syarikat_jalan' => 'required',
            'syarikat_poskod' => 'required',
            'syarikat_bandar' => 'required',
            'syarikat_negeri' => 'required',
            'syarikat_surat_bangunan' => 'required',
            'syarikat_surat_jalan' => 'required',
            'syarikat_surat_poskod' => 'required',
            'syarikat_surat_bandar' => 'required',
            'syarikat_surat_negeri' => 'required',
            'syarikat_no_tel' => 'required',
            'syarikat_no_faks' => 'required',
            'syarikat_emel' => 'required',
            'syarikat_wakil' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->syarikats()->create([
                'syarikat_nama' => $request->syarikat_nama,
                'syarikat_no_roc' => $request->syarikat_no_roc,
                'syarikat_tarikh_roc' => Carbon::createFromFormat('d-m-Y', $request->syarikat_tarikh_roc)->format('Y-m-d'),
                'syarikat_bangunan' => $request->syarikat_bangunan,
                'syarikat_jalan' => $request->syarikat_jalan,
                'syarikat_poskod' => $request->syarikat_poskod,
                'syarikat_bandar' => $request->syarikat_bandar,
                'syarikat_negeri' => $request->syarikat_negeri,
                'syarikat_surat_bangunan' => $request->syarikat_surat_bangunan,
                'syarikat_surat_jalan' => $request->syarikat_surat_jalan,
                'syarikat_surat_poskod' => $request->syarikat_surat_poskod,
                'syarikat_surat_bandar' => $request->syarikat_surat_bandar,
                'syarikat_surat_negeri' => $request->syarikat_surat_negeri,
                'syarikat_no_tel' => $request->syarikat_no_tel,
                'syarikat_no_faks' => $request->syarikat_no_faks,
                'syarikat_emel' => $request->syarikat_emel,
                'syarikat_wakil' => $request->syarikat_wakil,
                'syarikat_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/syarikat')->withSuccess('Syarikat baru telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/syarikat')->withWarning('Syarikat baru tidak berjaya didaftarkan!');
        }
        
    }
    
    // Delete syarikat based on id
    public function delete(Request $request){
        try{
            $syarikat = Syarikat::find($request->id);
            $syarikat->delete();
            return array(
                'status' => 'success',
                'message' => $syarikat->name
            );
        }
        catch (\Illuminate\Database\QueryException $error){
            return array(
                'status' => 'failed',
                'message' => $error
            );
        }
    }
}
