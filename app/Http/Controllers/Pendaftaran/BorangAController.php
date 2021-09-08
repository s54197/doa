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
use Exception;

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
            'penginvoisans' => $penginvoisans,
            'perawiss' => $perawiss,
            'gudangs' => $gudangs,
            'jenis' => 'new',
            'tajuk' => 'BorangA'
        );
        
        return view('pendaftaran.forms.borang_A')->with($data);
    }

    // Get wakil based on id
    public function get_wakil($id) {
        $wakil  = Syarikat::where('id', $id)->get();
        return array(
            'status' => 'success',
            'data' => $wakil,
        );
    }

    // Show data based on id
    public function view($id) {

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

        // Data borangA
        $borangA = BorangA::find($id);

        // Reformat date
        $borangA->borangA_tarikh_terima_kaunter = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_terima_kaunter)->format('d-m-Y');
        $borangA->borangA_tarikh_lulus = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_lulus)->format('d-m-Y');
        $borangA->borangA_tarikh_tamat = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_tamat)->format('d-m-Y');

        // Reformat string to array
        $borangA->borangA_pengilang_pembekal = explode(',', $borangA->borangA_pengilang_pembekal);
        $borangA->borangA_pengilang_kontrak = explode(',', $borangA->borangA_pengilang_kontrak);
        $borangA->borangA_penginvoisan = explode(',', $borangA->borangA_penginvoisan);
        $borangA->borangA_gudang = explode(',', $borangA->borangA_gudang);
        $borangA->borangA_perawis_aktif = explode(',', $borangA->borangA_perawis_aktif);
        $borangA->borangA_perawis_pengilang = explode(',', $borangA->borangA_perawis_pengilang);


        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pembekals' => $pembekals,
            'penginvoisans' => $penginvoisans,
            'perawiss' => $perawiss,
            'gudangs' => $gudangs,
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
        $borangA->borangA_tarikh_terima_kaunter = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_terima_kaunter)->format('d-m-Y');
        $borangA->borangA_tarikh_lulus = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_lulus)->format('d-m-Y');
        $borangA->borangA_tarikh_tamat = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_tamat)->format('d-m-Y');

        // Reformat string to array
        $borangA->borangA_pengilang_pembekal = explode(',', $borangA->borangA_pengilang_pembekal);
        $borangA->borangA_pengilang_kontrak = explode(',', $borangA->borangA_pengilang_kontrak);
        $borangA->borangA_penginvoisan = explode(',', $borangA->borangA_penginvoisan);
        $borangA->borangA_gudang = explode(',', $borangA->borangA_gudang);
        $borangA->borangA_perawis_aktif = explode(',', $borangA->borangA_perawis_aktif);
        $borangA->borangA_perawis_pengilang = explode(',', $borangA->borangA_perawis_pengilang);

        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pembekals' => $pembekals,
            'penginvoisans' => $penginvoisans,
            'perawiss' => $perawiss,
            'gudangs' => $gudangs,
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
            'borangA_syarikat' => 'required',
            'borangA_agen' => 'required',
            'borangA_tarikh_terima_kaunter' => 'required',
            'borangA_tarikh_lulus' => 'required',
            'borangA_tarikh_tamat' => 'required',
            'borangA_wakil_syarikat' => 'required',
            'borangA_jenis_pendaftaran' => 'required',
            'borangA_dagangan' => 'required',
            'borangA_no_pendaftaran' => 'required',
            'borangA_perniagaan_lain' => 'required_without_all:borangA_perniagaan_mengimport,borangA_perniagaan_mengilang',
            'borangA_perniagaan_lain_maklumat' => 'required_if:borangA_perniagaan_lain,Lain-lain (nyatakan)',
            'borangA_mengilang_lain' => 'required_without_all:borangA_mengilang_merumus,borangA_mengilang_menyedia,borangA_mengilang_mensebati,borangA_mengilang_mencampur,borangA_mengilang_melabel,borangA_mengilang_mempek,borangA_mengilang_membuat',
            'borangA_mengilang_lain_maklumat' => 'required_if:borangA_mengilang_lain,Lain-lain (nyatakan)',
            'borangA_pengilang' => 'required',
            'borangA_pengilang_kontrak' => 'required',
            'borangA_penginvoisan' => 'required',
            'borangA_gudang' => 'required',
            'borangA_perawis_aktif' => 'required',
            'borangA_perawis_kod' => 'required',
            'borangA_perawis_perumusan' => 'required',
            'borangA_perawis_perumusan_lain' => 'required_if:borangA_perawis_perumusan,Lain-lain (nyatakan)',
            'borangA_perawis_pengilang' => 'required',
        ]);

        $request->borangA_perniagaan_mengimport = $request->has('borangA_perniagaan_mengimport') ? true : false;
        $request->borangA_perniagaan_mengilang = $request->has('borangA_perniagaan_mengilang') ? true : false;
        $request->borangA_perniagaan_lain = $request->has('borangA_perniagaan_lain') ? true : false;
        $request->borangA_mengilang_lain = $request->has('borangA_mengilang_lain') ? true : false;
        $request->borangA_mengilang_merumus = $request->has('borangA_mengilang_merumus') ? true : false;
        $request->borangA_mengilang_menyedia = $request->has('borangA_mengilang_menyedia') ? true : false;
        $request->borangA_mengilang_mensebati = $request->has('borangA_mengilang_mensebati') ? true : false;
        $request->borangA_mengilang_mencampur = $request->has('borangA_mengilang_mencampur') ? true : false;
        $request->borangA_mengilang_melabel = $request->has('borangA_mengilang_melabel') ? true : false;
        $request->borangA_mengilang_mempek = $request->has('borangA_mengilang_mempek') ? true : false;
        $request->borangA_mengilang_membuat = $request->has('borangA_mengilang_membuat') ? true : false;
       
        try {
            $user = User::find(Auth::user()->id);
            $user->borangAs()->create([
                'borangA_syarikat' => $request->borangA_syarikat,
                'borangA_agen' => $request->borangA_agen,
                'borangA_tarikh_terima_kaunter' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_terima_kaunter)->format('Y-m-d'),
                'borangA_tarikh_lulus' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_lulus)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_wakil_syarikat' => $request->borangA_wakil_syarikat,
                'borangA_jenis_pendaftaran' => $request->borangA_jenis_pendaftaran,
                'borangA_dagangan' => $request->borangA_dagangan,
                'borangA_no_pendaftaran' => $request->borangA_no_pendaftaran,
                'borangA_perniagaan_mengimport' => $request->borangA_perniagaan_mengimport,
                'borangA_perniagaan_mengilang' => $request->borangA_perniagaan_mengilang,
                'borangA_perniagaan_lain' => $request->borangA_perniagaan_lain,
                'borangA_perniagaan_lain_maklumat' => $request->borangA_perniagaan_lain_maklumat,
                'borangA_mengilang_merumus' => $request->borangA_mengilang_merumus,
                'borangA_mengilang_menyedia' => $request->borangA_mengilang_menyedia,
                'borangA_mengilang_mensebati' => $request->borangA_mengilang_mensebati,
                'borangA_mengilang_mencampur' => $request->borangA_mengilang_mencampur,
                'borangA_mengilang_melabel' => $request->borangA_mengilang_melabel,
                'borangA_mengilang_mempek' => $request->borangA_mengilang_mempek,
                'borangA_mengilang_membuat' => $request->borangA_mengilang_membuat,
                'borangA_mengilang_lain' => $request->borangA_mengilang_lain,
                'borangA_mengilang_lain_maklumat' =>  $request->borangA_mengilang_lain_maklumat,
                'borangA_pengilang_pembekal' => implode(',', $request->borangA_pengilang),
                'borangA_pengilang_kontrak' => implode(',', $request->borangA_pengilang_kontrak),
                'borangA_penginvoisan' => implode(',', $request->borangA_penginvoisan),
                'borangA_gudang' => implode(',', $request->borangA_gudang),
                'borangA_perawis_aktif' => implode(',', $request->borangA_perawis_aktif),
                'borangA_perawis_kod' => $request->borangA_perawis_kod,
                'borangA_perawis_perumusan' => $request->borangA_perawis_perumusan,
                'borangA_perawis_perumusan_lain' => $request->borangA_perawis_perumusan_lain,
                'borangA_perawis_pengilang' => implode(',', $request->borangA_perawis_pengilang),
                'borangA_status' => 'Aktif',
                'user_id' => $user->id,
            ]);
            return redirect('/pendaftaran')->withSuccess('Pendaftaran '.$request->borangA_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pendaftaran')->withWarning('Pendaftaran '.$request->borangA_nama.' tidak berjaya didaftarkan!'. $e);
        }
        
    }
    
    // Update borangA based on id
    public function update(Request $request, $id){
        $request->validate([
            'borangA_syarikat' => 'required',
            'borangA_agen' => 'required',
            'borangA_tarikh_terima_kaunter' => 'required',
            'borangA_tarikh_lulus' => 'required',
            'borangA_tarikh_tamat' => 'required',
            'borangA_wakil_syarikat' => 'required',
            'borangA_jenis_pendaftaran' => 'required',
            'borangA_dagangan' => 'required',
            'borangA_no_pendaftaran' => 'required',
            'borangA_perniagaan_lain' => 'required_without_all:borangA_perniagaan_mengimport,borangA_perniagaan_mengilang',
            'borangA_perniagaan_lain_maklumat' => 'required_if:borangA_perniagaan_lain,Lain-lain (nyatakan)',
            'borangA_mengilang_lain' => 'required_without_all:borangA_mengilang_merumus,borangA_mengilang_menyedia,borangA_mengilang_mensebati,borangA_mengilang_mencampur,borangA_mengilang_melabel,borangA_mengilang_mempek,borangA_mengilang_membuat',
            'borangA_mengilang_lain_maklumat' => 'required_if:borangA_mengilang_lain,Lain-lain (nyatakan)',
            'borangA_pengilang' => 'required',
            'borangA_pengilang_kontrak' => 'required',
            'borangA_penginvoisan' => 'required',
            'borangA_gudang' => 'required',
            'borangA_perawis_aktif' => 'required',
            'borangA_perawis_kod' => 'required',
            'borangA_perawis_perumusan' => 'required',
            'borangA_perawis_perumusan_lain' => 'required_if:borangA_perawis_perumusan,Lain-lain (nyatakan)',
            'borangA_perawis_pengilang' => 'required',
        ]);

        $request->borangA_perniagaan_mengimport = $request->has('borangA_perniagaan_mengimport') ? true : false;
        $request->borangA_perniagaan_mengilang = $request->has('borangA_perniagaan_mengilang') ? true : false;
        $request->borangA_perniagaan_lain = $request->has('borangA_perniagaan_lain') ? true : false;
        $request->borangA_mengilang_lain = $request->has('borangA_mengilang_lain') ? true : false;
        $request->borangA_mengilang_merumus = $request->has('borangA_mengilang_merumus') ? true : false;
        $request->borangA_mengilang_menyedia = $request->has('borangA_mengilang_menyedia') ? true : false;
        $request->borangA_mengilang_mensebati = $request->has('borangA_mengilang_mensebati') ? true : false;
        $request->borangA_mengilang_mencampur = $request->has('borangA_mengilang_mencampur') ? true : false;
        $request->borangA_mengilang_melabel = $request->has('borangA_mengilang_melabel') ? true : false;
        $request->borangA_mengilang_mempek = $request->has('borangA_mengilang_mempek') ? true : false;
        $request->borangA_mengilang_membuat = $request->has('borangA_mengilang_membuat') ? true : false;

        try {
            $borangA = borangA::find($id);
            $borangA->update([
                'borangA_syarikat' => $request->borangA_syarikat,
                'borangA_agen' => $request->borangA_agen,
                'borangA_tarikh_terima_kaunter' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_terima_kaunter)->format('Y-m-d'),
                'borangA_tarikh_lulus' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_lulus)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_wakil_syarikat' => $request->borangA_wakil_syarikat,
                'borangA_jenis_pendaftaran' => $request->borangA_jenis_pendaftaran,
                'borangA_dagangan' => $request->borangA_dagangan,
                'borangA_no_pendaftaran' => $request->borangA_no_pendaftaran,
                'borangA_perniagaan_mengimport' => $request->borangA_perniagaan_mengimport,
                'borangA_perniagaan_mengilang' => $request->borangA_perniagaan_mengilang,
                'borangA_perniagaan_lain' => $request->borangA_perniagaan_lain,
                'borangA_perniagaan_lain_maklumat' => $request->borangA_perniagaan_lain_maklumat,
                'borangA_mengilang_merumus' => $request->borangA_mengilang_merumus,
                'borangA_mengilang_menyedia' => $request->borangA_mengilang_menyedia,
                'borangA_mengilang_mensebati' => $request->borangA_mengilang_mensebati,
                'borangA_mengilang_mencampur' => $request->borangA_mengilang_mencampur,
                'borangA_mengilang_melabel' => $request->borangA_mengilang_melabel,
                'borangA_mengilang_mempek' => $request->borangA_mengilang_mempek,
                'borangA_mengilang_membuat' => $request->borangA_mengilang_membuat,
                'borangA_mengilang_lain' => $request->borangA_mengilang_lain,
                'borangA_mengilang_lain_maklumat' =>  $request->borangA_mengilang_lain_maklumat,
                'borangA_pengilang_pembekal' => implode(',', $request->borangA_pengilang),
                'borangA_pengilang_kontrak' => implode(',', $request->borangA_pengilang_kontrak),
                'borangA_penginvoisan' => implode(',', $request->borangA_penginvoisan),
                'borangA_gudang' => implode(',', $request->borangA_gudang),
                'borangA_perawis_aktif' => implode(',', $request->borangA_perawis_aktif),
                'borangA_perawis_kod' => $request->borangA_perawis_kod,
                'borangA_perawis_perumusan' => $request->borangA_perawis_perumusan,
                'borangA_perawis_perumusan_lain' => $request->borangA_perawis_perumusan_lain,
                'borangA_perawis_pengilang' => implode(',', $request->borangA_perawis_pengilang),
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
