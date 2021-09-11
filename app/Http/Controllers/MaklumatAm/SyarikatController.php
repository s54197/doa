<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use App\Models\ListNegara;
use App\Models\ListPoskod;
use Illuminate\Http\Request;
use App\Models\Syarikat;
use App\Models\User;
use Carbon\Carbon;
use Exception;

use Illuminate\Support\Facades\Auth;

class SyarikatController extends Controller
{

    public $list_negara;

    public function __construct(){
        $this->list_negara = ListNegara::all();
    }
    
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data syarikat
            $syarikats = Syarikat::all();
        } else {
            // All data syarikat
            $syarikats = User::find(Auth::user()->id)->syarikats;
        }
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
            'list_negara' => $this->list_negara,
            'syarikats' => $syarikat,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.syarikat')->with($data);
    }

    // Show data
    public function new_view() {

        $data = array(
            'list_negara' => $this->list_negara,
            'jenis' => 'new',
            'tajuk' => 'Pendaftaran'
        );
        
        return view('maklumat_am.forms.syarikat')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data syarikat
        $syarikat = Syarikat::find($id);
        
        // Reformat date 
        $syarikat->syarikat_tarikh_roc = Carbon::createFromFormat('Y-m-d', $syarikat->syarikat_tarikh_roc)->format('d-m-Y');

        $data = array(
            'list_negara' => $this->list_negara,
            'syarikats' => $syarikat,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
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
            // 'syarikat_bandar' => 'required',
            // 'syarikat_negeri' => 'required',
            'syarikat_negara' => 'required',
            'syarikat_surat_bangunan' => 'required',
            'syarikat_surat_jalan' => 'required',
            'syarikat_surat_poskod' => 'required',
            // 'syarikat_surat_bandar' => 'required',
            // 'syarikat_surat_negeri' => 'required',
            'syarikat_surat_negara' => 'required',
            'syarikat_no_tel' => 'required',
            // 'syarikat_no_faks' => 'required',
            'syarikat_emel' => 'required|email',
            // 'syarikat_wakil' => 'required',
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
                'syarikat_negeri_luar_malaysia' => $request->syarikat_negeri_luar_malaysia,
                'syarikat_negara' => $request->syarikat_negara,
                'syarikat_surat_bangunan' => $request->syarikat_surat_bangunan,
                'syarikat_surat_jalan' => $request->syarikat_surat_jalan,
                'syarikat_surat_poskod' => $request->syarikat_surat_poskod,
                'syarikat_surat_bandar' => $request->syarikat_surat_bandar,
                'syarikat_surat_negeri' => $request->syarikat_surat_negeri,
                'syarikat_surat_negeri_luar_malaysia' => $request->syarikat_surat_negeri_luar_malaysia,
                'syarikat_surat_negara' => $request->syarikat_surat_negara,
                'syarikat_no_tel' => $request->syarikat_no_tel,
                'syarikat_no_faks' => $request->syarikat_no_faks,
                'syarikat_emel' => $request->syarikat_emel,
                'syarikat_wakil' => $request->syarikat_wakil,
                'syarikat_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/syarikat')->withSuccess('Syarikat '.$request->syarikat_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/syarikat')->withWarning('Syarikat '.$request->syarikat_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update syarikat based on id
    public function update(Request $request, $id){
        $request->validate([
            'syarikat_nama' => 'required',
            'syarikat_no_roc' => 'required',
            'syarikat_tarikh_roc' => 'required',
            'syarikat_bangunan' => 'required',
            'syarikat_jalan' => 'required',
            'syarikat_poskod' => 'required',
            // 'syarikat_bandar' => 'required',
            // 'syarikat_negeri' => 'required',
            'syarikat_negara' => 'required',
            'syarikat_surat_bangunan' => 'required',
            'syarikat_surat_jalan' => 'required',
            'syarikat_surat_poskod' => 'required',
            // 'syarikat_surat_bandar' => 'required',
            // 'syarikat_surat_negeri' => 'required',
            'syarikat_surat_negara' => 'required',
            'syarikat_no_tel' => 'required',
            // 'syarikat_no_faks' => 'required',
            'syarikat_emel' => 'required|email',
            // 'syarikat_wakil' => 'required',
        ]);

        try {
            $syarikat = Syarikat::find($id);
            $syarikat->update([
                'syarikat_nama' => $request->syarikat_nama,
                'syarikat_no_roc' => $request->syarikat_no_roc,
                'syarikat_tarikh_roc' => Carbon::createFromFormat('d-m-Y', $request->syarikat_tarikh_roc)->format('Y-m-d'),
                'syarikat_bangunan' => $request->syarikat_bangunan,
                'syarikat_jalan' => $request->syarikat_jalan,
                'syarikat_poskod' => $request->syarikat_poskod,
                'syarikat_bandar' => $request->syarikat_bandar,
                'syarikat_negeri' => $request->syarikat_negeri,
                'syarikat_negeri_luar_malaysia' => $request->syarikat_negeri_luar_malaysia,
                'syarikat_negara' => $request->syarikat_negara,
                'syarikat_surat_bangunan' => $request->syarikat_surat_bangunan,
                'syarikat_surat_jalan' => $request->syarikat_surat_jalan,
                'syarikat_surat_poskod' => $request->syarikat_surat_poskod,
                'syarikat_surat_bandar' => $request->syarikat_surat_bandar,
                'syarikat_surat_negeri' => $request->syarikat_surat_negeri,
                'syarikat_surat_negeri_luar_malaysia' => $request->syarikat_surat_negeri_luar_malaysia,
                'syarikat_surat_negara' => $request->syarikat_surat_negara,
                'syarikat_no_tel' => $request->syarikat_no_tel,
                'syarikat_no_faks' => $request->syarikat_no_faks,
                'syarikat_emel' => $request->syarikat_emel,
                'syarikat_wakil' => $request->syarikat_wakil,
                'syarikat_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/syarikat')->withSuccess('Syarikat '.$syarikat->syarikat_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/syarikat')->withWarning('Syarikat '.$syarikat->syarikat_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete syarikat based on id
    public function delete($id){
        try{
            $syarikat = Syarikat::find($id);
            $syarikat->delete();
            return redirect('/syarikat')->withSuccess('Syarikat '.$syarikat->syarikat_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/syarikat')->withWarning('Syarikat '.$syarikat->syarikat_nama.' tidak berjaya dipadamkan!');
        }
    }

    // Return poskod info
    public function poskod_info(Request $request){
        return $poskod_info = ListPoskod::where('poskod', $request->poskod)->get();
    }
}
