<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syarikat;

class SyarikatController extends Controller
{
    
    // Store data
    public function store(Request $request){
        
        $request->validate([
            'syarikat_nama' => 'required',
            'syarikat_no_roc' => 'required',
            'syarikat_tarikh_roc' => 'required',
            'syarikat_bangunan' => 'required',
            'syarikat_jalan' => 'required',
            'syarikat_poskod' => 'required',
            'syarikat_bandar' => 'required',
            'syarikat_negeri' => 'required',
            'syarikat_surat_bangunan' => 'required',
            'syarikat_surat_jalan' => 'required',
            'syarikat_surat_poskod' => 'required',
            'syarikat_surat_bandar' => 'required',
            'syarikat_surat_negeri' => 'required',
            'syarikat_no_tel' => 'required',
            'syarikat_no_faks' => 'required',
            'syarikat_emel' => 'required',
            'syarikat_wakil' => 'required',
        ]);

        return redirect('/syarikat')->with('message', 'Syarikat baru telah berjaya didaftarkan!');
    
    }
    
    // Delete syarikat based on id
    public function delete(Request $request){
        try{
            $syarikat = Syarikat::find($request->id);
            $syarikat->delete();
            return array(
                'status' => 'success',
                'message' => $syarikat->name
            );
        }
        catch (\Illuminate\Database\QueryException $error){
            return array(
                'status' => 'failed',
                'message' => $error
            );
        }
    }
}
