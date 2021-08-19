<?php

namespace App\Http\Controllers\MaklumatAm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syarikat;

class SyarikatController extends Controller
{
    
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
