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

class PembekalController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data pembekal
            $pembekals = PihakKetiga::where('pihak_ketiga_jenis','pembekal')->get();
        } else {
            // All data pembekal
            // $pembekals = User::find(Auth::user()->id)->pembekals;
            $pembekals = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pembekal')->get();
        }

        // Summary
        $TotalPembekal = PihakKetiga::where('pihak_ketiga_jenis','pembekal')->count();
        $TotalPembekalAktif = PihakKetiga::where('pihak_ketiga_jenis','pembekal')->where('pihak_ketiga_status', '=', 'Aktif')->count();
        $TotalPembekalTidakAktif = PihakKetiga::where('pihak_ketiga_jenis','pembekal')->where('pihak_ketiga_status', '=', 'Tidak Aktif')->count();
        $TotalPembekalBulanTerkini = PihakKetiga::where('pihak_ketiga_jenis','pembekal')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('maklumat_am.main_pembekal', [
            'pembekals' => $pembekals,
            'totalpembekal' => $TotalPembekal,
            'totalpembekalaktif' => $TotalPembekalAktif, 
            'totalpembekaltidakaktif' => $TotalPembekalTidakAktif, 
            'totalpembekalbulanterkini' => $TotalPembekalBulanTerkini,
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
        
        return view('maklumat_am.forms.pembekal')->with($data);
    }

    // Show data based on id
    public function view($id) {
        // Data negara
        $list_negara = ListNegara::all();
        // Data pembekal
        $pembekal = PihakKetiga::find($id);
        // Data negara
        $list_negara = ListNegara::all();
        $data = array(
            'list_negara' => $list_negara,
            'pembekals' => $pembekal,
            'list_negara' => $list_negara,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('maklumat_am.forms.pembekal')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data pembekal
        $pembekal = PihakKetiga::find($id);
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
            'pihak_ketiga_nama' => 'required',
            // 'pihak_ketiga_no_roc' => 'required',
            //'pihak_ketiga_bangunan' => 'required',
            //'pihak_ketiga_jalan' => 'required',
            //'pihak_ketiga_poskod' => 'required',
            //'pihak_ketiga_negara' => 'required',
            //'pihak_ketiga_no_tel' => 'required',
            //'pihak_ketiga_emel' => 'required|email',
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
                'pihak_ketiga_jenis' => 'pembekal',
                'user_id' => $user->id,
            ]);
            return redirect('/pembekal')->withSuccess('Pembekal '.$request->pihak_ketiga_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pembekal')->withWarning('Pembekal '.$request->pihak_ketiga_nama.' tidak berjaya didaftarkan!'.$e);
        }
        
    }
    
    // Update pembekal based on id
    public function update(Request $request, $id){
        $request->validate([
            'pihak_ketiga_nama' => 'required',
            // 'pihak_ketiga_no_roc' => 'required',
            //'pihak_ketiga_bangunan' => 'required',
            //'pihak_ketiga_jalan' => 'required',
            //'pihak_ketiga_poskod' => 'required',
            //'pihak_ketiga_negara' => 'required',
            //'pihak_ketiga_no_tel' => 'required',
            //'pihak_ketiga_emel' => 'required|email',
        ]);

        try {
            $pembekal = PihakKetiga::find($id);
            $pembekal->update([
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
                'pihak_ketiga_jenis' => 'pembekal',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/pembekal')->withSuccess('Pembekal '.$pembekal->pihak_ketiga_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/pembekal')->withWarning('Pembekal '.$pembekal->pihak_ketiga_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete pembekal based on id
    public function delete($id){
        try{
            $pembekal = PihakKetiga::find($id);
            $pembekal->delete();
            return redirect('/pembekal')->withSuccess('Pembekal '.$pembekal->pihak_ketiga_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/pembekal')->withWarning('Pembekal '.$pembekal->pihak_ketiga_nama.' tidak berjaya dipadamkan!');
        }
    }
}
