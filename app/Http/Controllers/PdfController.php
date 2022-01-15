<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\BorangA;
use Exception;
use Carbon\Carbon;
use Storage;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    public function certificate($id){

        setlocale(LC_TIME, 'ms_MY');
        Carbon::setLocale('ms_MY');

        $data_borangA = BorangA::find($id);
        
        $lrmp_r = explode('/', $data_borangA->borangA_no_pendaftaran);

        if ($lrmp_r[0]=="R") $jenis_pendaftaran = "BARU";
        else $jenis_pendaftaran = "SEMULA";
        
        if(BorangA::find($id)->borangA_sijil_no_siri == null){
            return redirect('/pendaftaran')->withWarning('No siri tiada. Mohon untuk kemaskini borang.');
        }
        
        //perawis
        $perawisnama = [];
        $perawis_peratus_unit = [];
        foreach(BorangA::find($id)->perawiss as $perawiss_list) {
            array_push($perawisnama,$perawiss_list->perawis_nama);
            array_push($perawis_peratus_unit,$perawiss_list->perawis_peratusan.' '.$perawiss_list->perawis_unit);
        }

        $pihakketiganama = [];
        foreach(BorangA::find($id)->pihakketigas as $pihakketiga_list) {
            array_push($pihakketiganama,$pihakketiga_list->pihak_ketiga_nama);
        }
        
        $penginvoisannama = [];
        foreach(BorangA::find($id)->penginvoisans as $penginvoisan_list) {
            array_push($penginvoisannama,$penginvoisan_list->penginvoisan_nama);
        }

        $data = [
            'no_siri' => $data_borangA->borangA_sijil_no_siri,
            'jenis_borang' => strtoupper(substr($data_borangA->borangA_sijil_no_siri,0,1)),
            'no_pendaftaran' => strtoupper($data_borangA->borangA_no_pendaftaran),
            'jenis_pendaftaran' => strtoupper($jenis_pendaftaran),
            'pendaftar' => strtoupper($data_borangA->syarikat->syarikat_nama),
            'nama_dagangan' => strtoupper($data_borangA->produk->produk_nama),
            'perawis_aktif' => implode(",# ",$perawisnama),
            'kepekatan' => implode(",# ",$perawis_peratus_unit),
            'perumusan' => strtoupper($data_borangA->borangA_perawis_perumusan),
            'kelas' => strtoupper($data_borangA->produk->produk_kelas_racun),
            'penggunaan' => strtoupper($data_borangA->produk->produk_kegunaan),
            'tempoh_sah' => Carbon::createFromFormat('Y-m-d', $data_borangA->borangA_tarikh_lulus)->translatedFormat('d F Y').' - '.Carbon::createFromFormat('Y-m-d', $data_borangA->borangA_tarikh_tamat)->translatedFormat('d F Y'),
            'tarikh_sign' => Carbon::createFromFormat('Y-m-d', $data_borangA->borangA_sijil_tarikh)->translatedFormat('d F Y'),
            'pembekal' => implode(",# ",$pihakketiganama).',# '.implode(",# ",$penginvoisannama),
            'pengerusi' => strtoupper($data_borangA->borangA_sijil_pengerusi),
            'setiausaha' => strtoupper($data_borangA->borangA_sijil_setiausaha),
            // 'pembekal' => $pihakketiganama_penginvoisannama,
        ];

        //dd($data);

        $pdf = PDF::loadView('pdf.certificate', $data);

        $certName = 'Sijil_'.$data_borangA->borangA_sijil_no_siri.'.pdf';
        return $pdf->download($certName);
    }

    public function letter($id){

        setlocale(LC_TIME, 'ms_MY');
        Carbon::setLocale('ms_MY');
        
        // $data_borangA = BorangA::find($id)->with('syarikat','agen','produk','perawiss')->get()->first();
        $data_borangA = BorangA::find($id);
        
        $lrmp_r = explode('/', $data_borangA->borangA_no_pendaftaran);

        if ($lrmp_r[0]=="R") $jenis_pendaftaran = "Baru";
        else $jenis_pendaftaran = "Semula";

        $data = [
            'rujukan_1' => $data_borangA->borangA_surat_no_rujukan_1,
            'rujukan_2' => $data_borangA->borangA_surat_no_rujukan_2,
            'surat_tarikh' => Carbon::createFromFormat('d-m-Y', $data_borangA->borangA_surat_tarikh)->translatedFormat('d F Y'),
            'nama_dagangan' => $data_borangA->produk->produk_nama,
            'no_pendaftaran' => $data_borangA->borangA_no_pendaftaran,
            'jenis_pendaftaran' => $jenis_pendaftaran,
            'resit_bayaran' => $data_borangA->borangA_surat_resit_bayaran,
            'syarikat_nama' => $data_borangA->syarikat->syarikat_nama,
            'syarikat_wakil' => $data_borangA->syarikat->syarikat_wakil,
            'slogan_1' => $data_borangA->borangA_surat_slogan_1,
            'slogan_2' => $data_borangA->borangA_surat_slogan_2,
            'penama' => $data_borangA->borangA_surat_penama,
        ];

        $pdf = PDF::loadView('pdf.letter', $data);

        $letterName = 'Surat_'.$data_borangA->borangA_no_pendaftaran.'.pdf';
     
        return $pdf->download($letterName);
    }

    public function download_certificate($id){
        try {
            $data_borangA = BorangA::find($id);
            $file = Storage::disk('public')->get($data_borangA->borangA_sijil_fail_src);
            return (new Response($file, 200))
                ->header('Content-Type', 'application/pdf');
        } catch(Exception $e) {
            return redirect('/pendaftaran')->withWarning('Sijil tidak dijumpai');
        }
    }

    public function download_letter($id){
        try { 
            $data_borangA = BorangA::find($id);
            $file = Storage::disk('public')->get($data_borangA->borangA_surat_fail_src);
            return (new Response($file, 200))
                ->header('Content-Type', 'application/pdf');
        } catch(Exception $e) {
            return redirect('/pendaftaran')->withWarning('Surat tidak dijumpai');
        }

    }

}
