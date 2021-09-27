<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\BorangA;
use Exception;

class PdfController extends Controller
{
    public function certificate($id){

        $data_borangA = BorangA::find($id)->with('syarikat','agen','produk','perawiss');

        dd($data_borangA);

        foreach($data_borangA->perawiss as $data_perawis){
            $perawis_nama = $data_perawis->perawis_nama;
        }

        // dd($perawis_nama);
        
        $data = [
            'no_siri' => $data_borangA->borangA_sijil_no_siri,
            'no_pendaftaran' => $data_borangA->borangA_no_pendaftaran,//'LRMP.R2/8495',
            'pendaftar' => $data_borangA->syarikat->syarikat_nama,//'THOR SPECIALITIES SDN. BHD.',
            'nama_dagangan' => $data_borangA->produk->produk_nama,//'ACTICIDE LA 5008',
            'perawis_aktif' => $perawis_nama_list,//'5-CHLORO-2-METHYL-4-ISOTHIAZOLIN-3-ONE',
            'kepekatan' => $data_borangA->perawis_peratusan,// + perawis_unit/perawis_unit_lain,//'3.8 %W/W',
            'perumusan' => $data_borangA->borangA_perawis_perumusan,//'CECAIR (AL)',
            'kelas' => $data_borangA->produk->produk_kelas_racun,//'Kelas II',
            'penggunaan' => $data_borangA->produk_kegunaan,///produk_kegunaan_lain,//'PENGAWET',
            'tempoh_sah' => $data_borangA->borangA_tarikh_lulus.' - '.$data_borangA->borangA_tarikh_tamat,//'01-APR-21 - 31-MAC-26',
            'tarikh_sign' => $data_borangA->borangA_sijil_tarikh,//'01-APR-21',
            'pembekal' => '',//$data_borangA->borangA_pengilang.' '.$data_borangA->borangA_pengilang_kontrak.' '.$data_borangA->borangA_penginvoisan,//'01-APR-21',
        ];

        dd($data);

        $pdf = PDF::loadView('pdf.certificate', $data);

        $certName = 'auto-generate-cert-name.pdf';
     
        return $pdf->download($certName);
    }

    public function letter($id){

        dd($id);

        $data = [];

        $pdf = PDF::loadView('pdf.letter', $data);

        $letterName = 'auto-generate-letter-name.pdf';
     
        return $pdf->download($letterName);
    }

}
