<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BorangA;
use App\Models\Syarikat;
use App\Models\Pembekal;
use App\Models\Penginvoisan;
use App\Models\Pengilang;
use App\Models\Gudang;
use App\Models\Produk;
use App\Models\Perawis;
use App\Models\Agen;
use App\Models\User;
use Carbon\Carbon;

class BorangAController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data borangA
            $borangAs = BorangA::all();
        } else {
            // All data borangA
            $borangAs = User::find(Auth::user()->id)->borangAs;
        }

        // Summary
        $TotalBorangA = BorangA::count();
        $TotalBorangAAktif = BorangA::where('borangA_status', '=', 'Aktif')->count();
        $TotalBorangATidakAktif = BorangA::where('borangA_status', '=', 'Tidak Aktif')->count();
        $TotalBorangABulanTerkini = BorangA::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        return view('pendaftaran.main_borang_A', [
            'borangAs' => $borangAs,
            'totalborangA' => $TotalBorangA,
            'totalborangAaktif' => $TotalBorangAAktif, 
            'totalborangAtidakaktif' => $TotalBorangATidakAktif, 
            'totalborangAbulanterkini' => $TotalBorangABulanTerkini,
            'bulan' => date('M')
        ]);
        
    }
    
    // Show data
    public function new_view() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data
            $syarikats = Syarikat::all();
            $agens = Agen::all('id', 'agen_nama');
            $produks = Produk::all('id', 'produk_nama');
            $pengilangs = Pengilang::all('id', 'pengilang_nama');
            $pembekals = Pembekal::all('id', 'pembekal_nama');
            $gudangs = Gudang::all('id', 'gudang_nama');
            $perawiss = Perawis::all('id', 'perawis_nama');
            $penginvoisans = Penginvoisan::all('id', 'penginvoisan_nama');

        } else {
            // All data user
            $syarikats = User::find(Auth::user()->id)->Syarikat::all();
            $agens = User::find(Auth::user()->id)->Agen::all();
            $produks = User::find(Auth::user()->id)->Produk::all();
            $pengilangs = User::find(Auth::user()->id)->Pengilang::all();
            $pembekals = User::find(Auth::user()->id)->Pembekal::all();
            $gudangs = User::find(Auth::user()->id)->Gudang::all();
            $perawiss = User::find(Auth::user()->id)->Perawis::all();
            $penginvoisans = User::find(Auth::user()->id)->Penginvoisan::all();
        }



        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pembekals' => $pembekals,
            'penginvoisan' => $penginvoisans,
            'gudangs' => $gudangs,
            'jenis' => 'new',
            'tajuk' => 'BorangA'
        );
        
        return view('pendaftaran.forms.borang_A')->with($data);
    }

    // Show data based on id
    public function view($id) {
        // Data borangA
        $borangA = BorangA::find($id);

        $data = array(
            'borangAs' => $borangA,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );
        
        return view('pendaftaran.forms.borang_A')->with($data);
    }

    // Show data based on id
    public function update_view($id) {
        // Data borangA
        $borangA = BorangA::find($id);

        // Reformat date 
        $borangA->borangA_tarikh_gazet = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_gazet)->format('d-m-Y');
        $borangA->borangA_tarikh_tamat = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_tamat)->format('d-m-Y');
        $borangA->borangA_tarikh_penwartaan = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_penwartaan)->format('d-m-Y');

        $data = array(
            'borangAs' => $borangA,
            'jenis' => 'kemaskini',
            'tajuk' => 'Kemaskini'
        );
        // dd($data);
        return view('pendaftaran.forms.borang_A')->with($data);
    }

    // Store data
    public function store(Request $request){
        
        $request->validate([
            'borangA_nama' => 'required',
            'borangA_lrmp_r' => 'required',
            'borangA_lrmp_no' => 'required',
            'borangA_no_fail' => 'required',
            'borangA_tarikh_gazet' => 'required',
            'borangA_tarikh_tamat' => 'required',
            'borangA_tarikh_penwartaan' => 'required',
            'borangA_kelas_racun' => 'required',
            'borangA_categori' => 'required',
            'borangA_categori_lain' => 'required',
            'borangA_kegunaan' => 'required',
            'borangA_kegunaan_lain' => 'required',
            'borangA_saiz_isian_1' => 'required',
            'borangA_saiz_lain_1' => 'required',
            // 'borangA_saiz_isian_2' => 'required',
            // 'borangA_saiz_lain_2' => 'required',
            // 'borangA_saiz_isian_3' => 'required',
            // 'borangA_saiz_lain_3' => 'required',
            // 'borangA_saiz_isian_4' => 'required',
            // 'borangA_saiz_lain_4' => 'required',
            // 'borangA_saiz_isian_5' => 'required',
            // 'borangA_saiz_lain_5' => 'required',
            // 'borangA_saiz_isian_6' => 'required',
            // 'borangA_saiz_lain_6' => 'required',
        ]);

        // dd($request);

        try {
            $user = User::find(Auth::user()->id);
            $user->borangAs()->create([
                'borangA_nama' => $request->borangA_nama,
                'borangA_lrmp_r' => $request->borangA_lrmp_r,
                'borangA_lrmp_no' => $request->borangA_lrmp_no,
                'borangA_no_fail' => $request->borangA_no_fail,
                'borangA_tarikh_gazet' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_gazet)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_tarikh_penwartaan' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_penwartaan)->format('Y-m-d'),
                'borangA_kelas_racun' => $request->borangA_kelas_racun,
                'borangA_categori' => $request->borangA_categori,
                'borangA_categori_lain' => $request->borangA_categori_lain,
                'borangA_kegunaan' => $request->borangA_kegunaan,
                'borangA_kegunaan_lain' => $request->borangA_kegunaan_lain,
                'borangA_saiz_isian_1' => $request->borangA_saiz_isian_1,
                'borangA_saiz_lain_1' => $request->borangA_saiz_lain_1,
                'borangA_saiz_isian_2' => $request->borangA_saiz_isian_2,
                'borangA_saiz_lain_2' => $request->borangA_saiz_lain_2,
                'borangA_saiz_isian_3' => $request->borangA_saiz_isian_3,
                'borangA_saiz_lain_3' => $request->borangA_saiz_lain_3,
                'borangA_saiz_isian_4' => $request->borangA_saiz_isian_4,
                'borangA_saiz_lain_4' => $request->borangA_saiz_lain_4,
                'borangA_saiz_isian_5' => $request->borangA_saiz_isian_5,
                'borangA_saiz_lain_5' => $request->borangA_saiz_lain_5,
                'borangA_saiz_isian_6' => $request->borangA_saiz_isian_6,
                'borangA_saiz_lain_6' => $request->borangA_saiz_lain_6,
                'borangA_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/borangA')->withSuccess('borangA '.$request->borangA_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/borangA')->withWarning('borangA '.$request->borangA_nama.' tidak berjaya didaftarkan!');
        }
        
    }
    
    // Update borangA based on id
    public function update(Request $request, $id){
        $request->validate([
            'borangA_nama' => 'required',
            'borangA_lrmp_r' => 'required',
            'borangA_lrmp_no' => 'required',
            'borangA_no_fail' => 'required',
            'borangA_tarikh_gazet' => 'required',
            'borangA_tarikh_tamat' => 'required',
            'borangA_tarikh_penwartaan' => 'required',
            'borangA_kelas_racun' => 'required',
            'borangA_categori' => 'required',
            'borangA_categori_lain' => 'required',
            'borangA_kegunaan' => 'required',
            'borangA_kegunaan_lain' => 'required',
            'borangA_saiz_isian_1' => 'required',
            'borangA_saiz_lain_1' => 'required',
            // 'borangA_saiz_isian_2' => 'required',
            // 'borangA_saiz_lain_2' => 'required',
            // 'borangA_saiz_isian_3' => 'required',
            // 'borangA_saiz_lain_3' => 'required',
            // 'borangA_saiz_isian_4' => 'required',
            // 'borangA_saiz_lain_4' => 'required',
            // 'borangA_saiz_isian_5' => 'required',
            // 'borangA_saiz_lain_5' => 'required',
            // 'borangA_saiz_isian_6' => 'required',
            // 'borangA_saiz_lain_6' => 'required',
        ]);

        try {
            $borangA = borangA::find($id);
            $borangA->update([
                'borangA_nama' => $request->borangA_nama,
                'borangA_lrmp_r' => $request->borangA_lrmp_r,
                'borangA_lrmp_no' => $request->borangA_lrmp_no,
                'borangA_no_fail' => $request->borangA_no_fail,
                'borangA_tarikh_gazet' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_gazet)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_tarikh_penwartaan' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_penwartaan)->format('Y-m-d'),
                'borangA_kelas_racun' => $request->borangA_kelas_racun,
                'borangA_categori' => $request->borangA_categori,
                'borangA_categori_lain' => $request->borangA_categori_lain,
                'borangA_kegunaan' => $request->borangA_kegunaan,
                'borangA_kegunaan_lain' => $request->borangA_kegunaan_lain,
                'borangA_saiz_isian_1' => $request->borangA_saiz_isian_1,
                'borangA_saiz_lain_1' => $request->borangA_saiz_lain_1,
                'borangA_saiz_isian_2' => $request->borangA_saiz_isian_2,
                'borangA_saiz_lain_2' => $request->borangA_saiz_lain_2,
                'borangA_saiz_isian_3' => $request->borangA_saiz_isian_3,
                'borangA_saiz_lain_3' => $request->borangA_saiz_lain_3,
                'borangA_saiz_isian_4' => $request->borangA_saiz_isian_4,
                'borangA_saiz_lain_4' => $request->borangA_saiz_lain_4,
                'borangA_saiz_isian_5' => $request->borangA_saiz_isian_5,
                'borangA_saiz_lain_5' => $request->borangA_saiz_lain_5,
                'borangA_saiz_isian_6' => $request->borangA_saiz_isian_6,
                'borangA_saiz_lain_6' => $request->borangA_saiz_lain_6,
                'borangA_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/borangA')->withSuccess('borangA '.$borangA->borangA_nama.' telah berjaya dikemaskinikan!');
        } catch(Exception $e) {
            return redirect('/borangA')->withWarning('borangA '.$borangA->borangA_nama.' tidak berjaya dikemaskinikan!');
        }
    }

    // Delete borangA based on id
    public function delete($id){
        try{
            $borangA = borangA::find($id);
            $borangA->delete();
            return redirect('/borangA')->withSuccess('borangA '.$borangA->borangA_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/borangA')->withWarning('borangA '.$borangA->borangA_nama.' tidak berjaya dipadamkan!');
        }
    }

}
