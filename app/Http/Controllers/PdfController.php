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

        $data_borangA = BorangA::find($id)->with('syarikat','agen','produk','perawiss')->get()->first();
        // dd(BorangA::find($id)->borangA_sijil_no_siri);
        
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
            'no_pendaftaran' => $data_borangA->borangA_no_pendaftaran,
            'pendaftar' => $data_borangA->syarikat->syarikat_nama,
            'nama_dagangan' => $data_borangA->produk->produk_nama,
            'perawis_aktif' => implode(" ",$perawisnama),
            'kepekatan' => implode(" ",$perawis_peratus_unit),
            'perumusan' => $data_borangA->borangA_perawis_perumusan,
            'kelas' => $data_borangA->produk->produk_kelas_racun,
            'penggunaan' => $data_borangA->produk->produk_kegunaan,
            'tempoh_sah' => Carbon::createFromFormat('Y-m-d', $data_borangA->borangA_tarikh_lulus)->format('d-m-Y').' - '.Carbon::createFromFormat('Y-m-d', $data_borangA->borangA_tarikh_tamat)->format('d-m-Y'),
            'tarikh_sign' => $data_borangA->borangA_sijil_tarikh,
            'pembekal' => implode(" ",$pihakketiganama).' '.implode(" ",$penginvoisannama),
        ];

        // dd($data);

        $pdf = PDF::loadView('pdf.certificate', $data);

        $certName = 'Sijil_'.$data_borangA->borangA_sijil_no_siri.'.pdf';
        return $pdf->download($certName);
    }

    public function letter($id){

        $data_borangA = BorangA::find($id)->with('syarikat','agen','produk','perawiss')->get()->first();

        $data = [
            'rujukan_1' => $data_borangA->borangA_surat_no_rujukan_1,
            'rujukan_2' => $data_borangA->borangA_surat_no_rujukan_2,
            'surat_tarikh' => $data_borangA->borangA_surat_tarikh,
            'nama_dagangan' => $data_borangA->produk->produk_nama,
            'no_pendaftaran' => $data_borangA->borangA_no_pendaftaran,
            'resit_bayaran' => $data_borangA->borangA_surat_resit_bayaran,    
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
