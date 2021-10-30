<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VnormalisasiController extends Controller
{
    public function index()
    {
        $results = DB::select('SELECT * from vnormalisasi');
        return view('result/resultnormalisasi',[
            'results'=>$results
        ]);
    }
}
