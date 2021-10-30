<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Vranking extends Controller
{
    public function index()
    {
        $results = DB::select('SELECT * from vranking GROUP by ranking DESC');
        return view('result/resultranking',[
            'results'=>$results
        ]);
    }
}
