<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function certificate(Request $request){
        $data = [
            'no_siri' => '006532',
            'no_pendaftaran' => 'LRMP.R2/8495',
            'pendaftar' => 'THOR SPECIALITIES SDN. BHD.',
            'nama_dagangan' => 'ACTICIDE LA 5008',
            'perawis_aktif' => '5-CHLORO-2-METHYL-4-ISOTHIAZOLIN-3-ONE',
            'kepekatan' => '3.8 %W/W',
            'perumusan' => 'CECAIR (AL)',
            'kelas' => 'Kelas II',
            'penggunaan' => 'PENGAWET',
            'tempoh_sah' => '01-APR-21 - 31-MAC-26',
            'tarikh_sign' => '01-APR-21',
        ];

        $pdf = PDF::loadView('pdf.certificate', $data);

        $certName = 'auto-generate-cert-name.pdf';
     
        return $pdf->download($certName);
    }

    public function letter(){
        $data = [];

        $pdf = PDF::loadView('pdf.letter', $data);

        $letterName = 'auto-generate-letter-name.pdf';
     
        return $pdf->download($letterName);
    }

}
