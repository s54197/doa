<?php

namespace App\Http\Controllers;

use App\Models\BorangA;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    //display bulanan page
    public function index(){
        return view('laporan.bulanan');
    }

    // generate laporan bulanan table
    public function generate(Request $request){
        if (isset($request->date)) {
            $date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
            $pendaftars = BorangA::with('syarikat','agen','produk')->where('borangA_tarikh_lulus', $date)->get();
        }
        else $pendaftars = BorangA::with('syarikat','agen','produk')->where('borangA_tarikh_lulus', $request->date)->get();

        if (sizeof($pendaftars) > 0){
            $i = 1;
            // <th>Bil</th>
            // <th>LRMP</th>
            // <th>Pendaftar</th>
            // <th>Nama Dagangan</th>
            // <th>Perawis Aktif (P.A.)</th>
            // <th>P.A. (%W/W)</th>
            // <th>Perumusan</th>
            foreach ($pendaftars as $pendaftar){

                // structure multiple perawis aktif
                if (isset($pendaftar->borangA_perawis_aktif_3)){
                    $perawis_aktif = $pendaftar->borangA_perawis_aktif_1.'<br>'.$pendaftar->borangA_perawis_aktif_2.'<br>'.$pendaftar->borangA_perawis_aktif_3;
                    $peratusan = $pendaftar->borangA_perawis_peratusan_1.' '.$pendaftar->borangA_perawis_peratusan_unit_1.'<br>'.$pendaftar->borangA_perawis_peratusan_2.' '.$pendaftar->borangA_perawis_peratusan_unit_2.'<br>'.$pendaftar->borangA_perawis_peratusan_3.' '.$pendaftar->borangA_perawis_peratusan_unit_3;
                }
                else if (isset($pendaftar->borangA_perawis_aktif_2)){
                    $perawis_aktif = $pendaftar->borangA_perawis_aktif_1.'<br>'.$pendaftar->borangA_perawis_aktif_2;
                    $peratusan = $pendaftar->borangA_perawis_peratusan_1.' '.$pendaftar->borangA_perawis_peratusan_unit_1.'<br>'.$pendaftar->borangA_perawis_peratusan_2.' '.$pendaftar->borangA_perawis_peratusan_unit_2;
                }
                else {
                    $perawis_aktif = $pendaftar->borangA_perawis_aktif_1;
                    $peratusan = $pendaftar->borangA_perawis_peratusan_1.' '.$pendaftar->borangA_perawis_peratusan_unit_1;
                }

                $data[] = array(
                    'bil' => $i++,
                    'lrmp' => $pendaftar->borangA_no_pendaftaran,
                    'syarikat' => $pendaftar->syarikat->syarikat_nama,
                    'nama_dagangan' => $pendaftar->produk->produk_nama,
                    'perawis_aktif' => $perawis_aktif,
                    'peratusan' => $peratusan,
                    'perumusan' => $pendaftar->borangA_perawis_perumusan,
                    // 'planned_start' => Carbon::createFromFormat('Y-m-d H:i:s', $activity->planned_start)->format('d-m-Y h:m A'),
                );
            }
        }
        else $data = array();
        
        return array('pendaftar' => $data);
    }
}
