<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BorangA;
use App\Models\Syarikat;
use App\Models\Produk;
use App\Models\Perawis;
use App\Models\Pembekal;
use App\Models\Penginvoisan;
use App\Models\Pengilang;
use App\Models\Gudang;
use App\Models\PihakKetiga;
use App\Models\Agen;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;

class BorangAController extends Controller
{
    // All data
    public function index() {

        // Check user role
        $role = Auth::user()->role;
        // dd($id);

        if ($role=='admin') {
            // All data borangA
            $borangAs = BorangA::with('syarikat','agen','produk')->get();
        
        } else {
            // All data borangA
            $borangAs = User::find(Auth::user()->id)->borangAs()->with('syarikat','agen','produk')->get();
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
            $perawiss = Perawis::all('id', 'perawis_nama');
            $produks = Produk::all('id', 'produk_nama');
            $pengilangs = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->orWhere('pihak_ketiga_jenis','pembekal')->get();
            $gudangs = Gudang::all('id','gudang_nama');
            $penginvoisans = Penginvoisan::all('id','penginvoisan_nama');

        } else {
            // All data user
            $syarikats = User::find(Auth::user()->id)->syarikats;
            $agens = User::find(Auth::user()->id)->agens;
            $produks = User::find(Auth::user()->id)->produks;
            $perawiss = User::find(Auth::user()->id)->perawiss;
            $pengilangs = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pengilang')->orWhere('pihak_ketiga_jenis','pembekal')->get();
            $gudangs = User::find(Auth::user()->id)->gudangs;
            $penginvoisans = User::find(Auth::user()->id)->penginvoisans;
        }

        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pengilang_pembekals' => $pengilang_pembekals,
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

    // Get no_pendaftaran based on id 
    public function get_no_pendaftaran($id) {
        $nopendaftaran  = Produk::where('id', $id)->get();
        return array(
            'status' => 'success',
            'data' => $nopendaftaran,
        );
    }

    // Show data based on id
    public function view($id) {

        // Check user role
        $role = Auth::user()->role;

        if ($role=='admin') {
            // All data
            $syarikats = Syarikat::all();
            $agens = Agen::all('id', 'agen_nama');
            $perawiss = Perawis::all('id', 'perawis_nama');
            $produks = Produk::all('id', 'produk_nama');
            $pengilangs = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->orWhere('pihak_ketiga_jenis','pembekal')->get();
            $gudangs = Gudang::all('id','gudang_nama');
            $penginvoisans = Penginvoisan::all('id','penginvoisan_nama');

        } else {
            // All data user
            $syarikats = User::find(Auth::user()->id)->syarikats;
            $agens = User::find(Auth::user()->id)->agens;
            $produks = User::find(Auth::user()->id)->produks;
            $perawiss = User::find(Auth::user()->id)->perawiss;
            $pengilangs = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = User::find(Auth::user()->id)->pihakketigas()->get();
            $gudangs = User::find(Auth::user()->id)->gudangs;
            $penginvoisans = User::find(Auth::user()->id)->penginvoisans;
        }

        // Data borangA
        $borangA = BorangA::find($id)->with('syarikat','agen','produk')->get();
        $borangId = BorangA::find($id);

        // dd($borangId->syarikat);
    
        // Reformat date
        foreach($borangA as $borangA) {
            $borangA->borangA_tarikh_terima_kaunter = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_terima_kaunter)->format('d-m-Y');
            $borangA->borangA_tarikh_lulus = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_lulus)->format('d-m-Y');
            $borangA->borangA_tarikh_tamat = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_tamat)->format('d-m-Y');
        }
     
        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pengilang_pembekals' => $pengilang_pembekals,
            'penginvoisans' => $penginvoisans,
            'perawiss' => $perawiss,
            'gudangs' => $gudangs,
            'borangAs' => $borangA,
            'borangIds' => $borangId,
            'jenis' => 'papar',
            'tajuk' => 'Paparan'
        );

        // dd($data);
        
        return view('pendaftaran.forms.borang_A')->with($data);
    }

    // Show data based on id
    public function update_view($id) {

        // Check user role
        $role = Auth::user()->role;

        if ($role=='admin') {
            // All data
            $syarikats = Syarikat::all();
            $agens = Agen::all('id', 'agen_nama');
            $perawiss = Perawis::all('id', 'perawis_nama');
            $produks = Produk::all('id', 'produk_nama');
            $pengilangs = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = PihakKetiga::where('pihak_ketiga_jenis','pengilang')->orWhere('pihak_ketiga_jenis','pembekal')->get();
            $gudangs = Gudang::all('id','gudang_nama');
            $penginvoisans = Penginvoisan::all('id','penginvoisan_nama');

        } else {
            // All data user
            $syarikats = User::find(Auth::user()->id)->syarikats;
            $agens = User::find(Auth::user()->id)->agens;
            $produks = User::find(Auth::user()->id)->produks;
            $perawiss = User::find(Auth::user()->id)->perawiss;
            $pengilangs = User::find(Auth::user()->id)->pihakketigas()->where('pihak_ketiga_jenis','pengilang')->get();
            $pengilang_pembekals = User::find(Auth::user()->id)->pihakketigas()->get();
            $gudangs = User::find(Auth::user()->id)->gudangs;
            $penginvoisans = User::find(Auth::user()->id)->penginvoisans;
        }

        // Data borangA
        $borangA = BorangA::find($id)->with('syarikat','agen','produk')->get();
        $borangId = BorangA::find($id);
        // dd($borangId->id);

        // Reformat date
        foreach($borangA as $borangA) {
            $borangA->borangA_tarikh_terima_kaunter = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_terima_kaunter)->format('d-m-Y');
            $borangA->borangA_tarikh_lulus = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_lulus)->format('d-m-Y');
            $borangA->borangA_tarikh_tamat = Carbon::createFromFormat('Y-m-d', $borangA->borangA_tarikh_tamat)->format('d-m-Y');
        }

        $data = array(
            'syarikats' => $syarikats,
            'agens' => $agens,
            'produks' => $produks,
            'pengilangs' => $pengilangs,
            'pengilang_pembekals' => $pengilang_pembekals,
            'penginvoisans' => $penginvoisans,
            'perawiss' => $perawiss,
            'gudangs' => $gudangs,
            'borangAs' => $borangA,
            'borangIds' => $borangId,
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
            //'borangA_mengilang_lain' => 'required_without_all:borangA_mengilang_merumus,borangA_mengilang_menyedia,borangA_mengilang_mensebati,borangA_mengilang_mencampur,borangA_mengilang_melabel,borangA_mengilang_mempek,borangA_mengilang_membuat',
            'borangA_mengilang_lain_maklumat' => 'required_if:borangA_mengilang_lain,Lain-lain (nyatakan)',
            'borangA_pengilang' => 'required',
            'borangA_pengilang_kontrak' => 'required',
            'borangA_penginvoisan' => 'required',
            'borangA_gudang' => 'required',
            'borangA_perawis_aktif' => 'required',
            // 'borangA_perawis_kod' => 'required',
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
       
        $pengilangPembekalIds = $request->borangA_pengilang;
        $pengilangkontrakIds = $request->borangA_pengilang_kontrak;
        $penginvoisanIds = $request->borangA_penginvoisan;
        $gudangIds = $request->borangA_gudang;
        $perawisIds = $request->borangA_perawis_aktif;
        $perawispengilangIds = $request->borangA_perawis_pengilang;
        
        $borangA_surat_fail_nama = '';
        $borangA_surat_fail_src = '';
        $borangA_sijil_fail_nama = '';
        $borangA_sijil_fail_src = '';

        

        if($request->borangA_surat_fail != null ) {

            $fileName = time().'_'.$request->borangA_surat_fail->getClientOriginalName();
            $filePath = $request->borangA_surat_fail->storeAs('uploads', $fileName, 'public');
            $borangA_surat_fail_nama = time().'_'.$request->borangA_surat_fail->getClientOriginalName();
            $borangA_surat_fail_src = $filePath;
            
        }
        // dd($borangA_surat_fail_nama);

        if($request->borangA_sijil_fail != null ) {
            $fileName = time().'_'.$request->borangA_sijil_fail->getClientOriginalName();
            $filePath = $request->borangA_sijil_fail->storeAs('uploads', $fileName, 'public');
            $borangA_sijil_fail_nama = time().'_'.$request->borangA_sijil_fail->getClientOriginalName();
            $borangA_sijil_fail_src = $filePath;
        }


        try {

            $user = User::find(Auth::user()->id);

            $borangCreate = $user->borangAs()->create([
                'syarikat_id' => $request->borangA_syarikat,
                'agen_id' => $request->borangA_agen,
                'borangA_tarikh_terima_kaunter' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_terima_kaunter)->format('Y-m-d'),
                'borangA_tarikh_lulus' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_lulus)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_wakil_syarikat' => $request->borangA_wakil_syarikat,
                'borangA_jenis_pendaftaran' => $request->borangA_jenis_pendaftaran,
                'produk_id' => $request->borangA_dagangan,
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
                // 'borangA_pengilang_pembekal' => implode(',', $request->borangA_pengilang),
                // 'borangA_pengilang_kontrak' => implode(',', $request->borangA_pengilang_kontrak),
                // 'borangA_penginvoisan' => implode(',', $request->borangA_penginvoisan),
                // 'borangA_gudang' => implode(',', $request->borangA_gudang),
                // 'borangA_perawis_aktif' => implode(',', $request->borangA_perawis_aktif),
                // 'borangA_perawis_kod' => $request->borangA_perawis_kod,
                'borangA_perawis_perumusan' => $request->borangA_perawis_perumusan,
                'borangA_perawis_perumusan_lain' => $request->borangA_perawis_perumusan_lain,

                'borangA_sijil_no_siri' => $request->borangA_sijil_no_siri,
                'borangA_sijil_tarikh' => $request->borangA_sijil_tarikh,
                'borangA_sijil_fail_nama' => $borangA_sijil_fail_nama,
                'borangA_sijil_fail_src' => $borangA_sijil_fail_src,
                'borangA_surat_no_rujukan_1' => $request->borangA_surat_no_rujukan_1,
                'borangA_surat_no_rujukan_2' => $request->borangA_surat_no_rujukan_2,
                'borangA_surat_tarikh' => $request->borangA_surat_tarikh,
                'borangA_surat_resit_bayaran' => $request->borangA_surat_resit_bayaran,
                'borangA_surat_fail_nama' => $borangA_surat_fail_nama,
                'borangA_surat_fail_src' => $borangA_surat_fail_src,

                // 'borangA_perawis_pengilang' => implode(',', $request->borangA_perawis_pengilang),
                'borangA_status' => 'Aktif',
                'user_id' => $user->id,
            ]);

            $new_borang = BorangA::find($borangCreate->id);	
            $new_borang->pihakketigas()->sync($pengilangPembekalIds);
            $new_borang->penginvoisans()->sync($penginvoisanIds);
            $new_borang->gudangs()->sync($gudangIds);
            $new_borang->perawiss()->sync($perawisIds);
            $new_borang->pengilangs()->sync($pengilangkontrakIds);
            $new_borang->perawis_pengilangs()->sync($perawispengilangIds);

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
            // 'borangA_perawis_kod' => 'required',
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
       
        $pengilangPembekalIds = $request->borangA_pengilang;
        $pengilangkontrakIds = $request->borangA_pengilang_kontrak;
        $penginvoisanIds = $request->borangA_penginvoisan;
        $gudangIds = $request->borangA_gudang;
        $perawisIds = $request->borangA_perawis_aktif;
        $perawispengilangIds = $request->borangA_perawis_pengilang;

        $borangA_surat_fail_nama = '';
        $borangA_surat_fail_src = '';
        $borangA_sijil_fail_nama = '';
        $borangA_sijil_fail_src = '';

        

        if($request->borangA_surat_fail != null ) {

            $fileName = time().'_'.$request->borangA_surat_fail->getClientOriginalName();
            $filePath = $request->borangA_surat_fail->storeAs('uploads', $fileName, 'public');
            $borangA_surat_fail_nama = time().'_'.$request->borangA_surat_fail->getClientOriginalName();
            $borangA_surat_fail_src = $filePath;
            
        }
        // dd($borangA_surat_fail_nama);

        if($request->borangA_sijil_fail != null ) {
            $fileName = time().'_'.$request->borangA_sijil_fail->getClientOriginalName();
            $filePath = $request->borangA_sijil_fail->storeAs('uploads', $fileName, 'public');
            $borangA_sijil_fail_nama = time().'_'.$request->borangA_sijil_fail->getClientOriginalName();
            $borangA_sijil_fail_src = $filePath;
        }

        // dd($request->borangA_sijil_fail);
        // dd($id);

        try {

            $borangA = borangA::find($id);
            $borangUpdate = $borangA->update([
                'syarikat_id' => $request->borangA_syarikat,
                'agen_id' => $request->borangA_agen,
                'borangA_tarikh_terima_kaunter' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_terima_kaunter)->format('Y-m-d'),
                'borangA_tarikh_lulus' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_lulus)->format('Y-m-d'),
                'borangA_tarikh_tamat' => Carbon::createFromFormat('d-m-Y', $request->borangA_tarikh_tamat)->format('Y-m-d'),
                'borangA_wakil_syarikat' => $request->borangA_wakil_syarikat,
                'borangA_sijil_no_siri' => $request->borangA_sijil_no_siri,
                'borangA_jenis_pendaftaran' => $request->borangA_jenis_pendaftaran,
                'produk_id' => $request->borangA_dagangan,
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
                // 'borangA_pengilang_pembekal' => implode(',', $request->borangA_pengilang),
                // 'borangA_pengilang_kontrak' => implode(',', $request->borangA_pengilang_kontrak),
                // 'borangA_penginvoisan' => implode(',', $request->borangA_penginvoisan),
                // 'borangA_gudang' => implode(',', $request->borangA_gudang),
                // 'borangA_perawis_aktif' => implode(',', $request->borangA_perawis_aktif),
                // 'borangA_perawis_kod' => $request->borangA_perawis_kod,
                'borangA_perawis_perumusan' => $request->borangA_perawis_perumusan,
                'borangA_perawis_perumusan_lain' => $request->borangA_perawis_perumusan_lain,
                // 'borangA_perawis_pengilang' => implode(',', $request->borangA_perawis_pengilang),
                'borangA_surat_fail_nama' => $borangA_surat_fail_nama,
                'borangA_surat_fail_src' => $borangA_surat_fail_src,
                'borangA_sijil_fail_nama' => $borangA_sijil_fail_nama,
                'borangA_sijil_fail_src' => $borangA_sijil_fail_src,
                'borangA_status' => 'Aktif',
                'user_id' => Auth::user()->id,
            ]);

            $borangA->pihakketigas()->sync($pengilangPembekalIds);
            $borangA->penginvoisans()->sync($penginvoisanIds);
            $borangA->gudangs()->sync($gudangIds);
            $borangA->perawiss()->sync($perawisIds);
            $borangA->pengilangs()->sync($pengilangkontrakIds);
            $borangA->perawis_pengilangs()->sync($perawispengilangIds);

            return redirect('/pendaftaran')->withSuccess('Pendaftaran '.$request->borangA_nama.' telah berjaya didaftarkan!');
        } catch(Exception $e) {
            return redirect('/pendaftaran')->withWarning('Pendaftaran '.$request->borangA_nama.' tidak berjaya didaftarkan!'. $e);
        }
    }

    // Delete borangA based on id
    public function delete($id){
        try{
            $borangA = borangA::find($id);
            $borangA->delete();
            return redirect('/pendaftaran')->withSuccess('BorangA '.$borangA->borangA_nama.' telah berjaya dipadamkan!');
        }
        catch (\Illuminate\Database\QueryException $error){
            return redirect('/pendaftaran')->withWarning('BorangA '.$borangA->borangA_nama.' tidak berjaya dipadamkan!');
        }
    }

}
