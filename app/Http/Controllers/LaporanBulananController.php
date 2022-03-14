<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    //display bulanan page
    public function index(){
        return view('laporan.bulanan');
    }
}
