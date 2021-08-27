<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\User;
use Carbon\Carbon;


class GudangController extends Controller
{
    // All data
    public function index() {
        // All data Gudang
        $gudangs = Gudang::all();
        // Summary
        $TotalGudang = Gudang::count();
        $TotalGudangAktif = Gudang::where('gudang_status', '=', 'Aktif')->count();
        $TotalGudangTidakAktif = Gudang::where('gudang_status', '=', 'Tidak Aktif')->count();
        $TotalGudangBulanTerkini = Gudang::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_gudang', [
            'gudangs' => $gudangs,
            'totalgudang' => $TotalGudang,
            'totalgudangaktif' => $TotalGudangAktif, 
            'totalgudangtidakaktif' => $TotalGudangTidakAktif, 
            'totalgudangbulanterkini' => $TotalGudangBulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data based on id
    public function view($id) {
        // Data gudang
        $gudang = Gudang::find($id);
        $data = array(
            'gudangs' => $gudang,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.gudang')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data gudang
        $gudang = Gudang::find($id);
        
        $data = array(
            'gudangs' => $gudang,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('maklumat_am.forms.gudang')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'gudang_nama' => 'required',
            'gudang_no_roc' => 'required',
            'gudang_bangunan' => 'required',
            'gudang_jalan' => 'required',
            'gudang_poskod' => 'required',
            'gudang_bandar' => 'required',
            'gudang_negeri' => 'required',
            'gudang_negeri_luar_malaysia' => 'required',
            'gudang_negara' => 'required',
            'gudang_no_tel' => 'required',
            'gudang_no_faks' => 'required',
            'gudang_emel' => 'required|email',
            // 'gudang_status' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->gudangs()->create([
                'gudang_nama' => $request->gudang_nama,
                'gudang_no_roc' => $request->gudang_no_roc,
                'gudang_bangunan' => $request->gudang_bangunan,
                'gudang_jalan' => $request->gudang_jalan,
                'gudang_poskod' => $request->gudang_poskod,
                'gudang_bandar' => $request->gudang_bandar,
                'gudang_negeri' => $request->gudang_negeri,
                'gudang_negeri_luar_malaysia' => $request->gudang_negeri_luar_malaysia,
                'gudang_negara' => $request->gudang_negara,
                'gudang_no_tel' => $request->gudang_no_tel,
                'gudang_no_faks' => $request->gudang_no_faks,
                'gudang_emel' => $request->gudang_emel,
                'gudang_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/gudang')->withSuccess('Gudang '.$request->gudang_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/gudang')->withWarning('Gudang '.$request->gudang_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update gudang based on id
    public function update(Request $request, $id){
        $request->validate([
            'gudang_nama' => 'required',
            'gudang_no_roc' => 'required',
            'gudang_bangunan' => 'required',
            'gudang_jalan' => 'required',
            'gudang_poskod' => 'required',
            'gudang_bandar' => 'required',
            'gudang_negeri' => 'required',
            'gudang_negeri_luar_malaysia' => 'required',
            'gudang_negara' => 'required',
            'gudang_no_tel' => 'required',
            'gudang_no_faks' => 'required',
            'gudang_emel' => 'required|email',
            // 'gudang_status' => 'required',
        ]);

        try {
            $gudang = Gudang::find($id);
            $gudang->update([
                'gudang_nama' => $request->gudang_nama,
                'gudang_no_roc' => $request->gudang_no_roc,
                'gudang_bangunan' => $request->gudang_bangunan,
                'gudang_jalan' => $request->gudang_jalan,
                'gudang_poskod' => $request->gudang_poskod,
                'gudang_bandar' => $request->gudang_bandar,
                'gudang_negeri' => $request->gudang_negeri,
                'gudang_negeri_luar_malaysia' => $request->gudang_negeri_luar_malaysia,
                'gudang_negara' => $request->gudang_negara,
                'gudang_no_tel' => $request->gudang_no_tel,
                'gudang_no_faks' => $request->gudang_no_faks,
                'gudang_emel' => $request->gudang_emel,
                'gudang_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/gudang')->withSuccess('Gudang '.$gudang->gudang_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/gudang')->withWarning('Gudang '.$gudang->gudang_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete gudang based on id
    public function delete($id){
        try{
            $gudang = Gudang::find($id);
            $gudang->delete();
            return redirect('/gudang')->withSuccess('Gudang '.$gudang->gudang_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/gudang')->withWarning('Gudang '.$gudang->gudang_nama.' tidak berjaya dipadamkan!');
        }
    }
}
