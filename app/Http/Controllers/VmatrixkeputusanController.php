<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VmatrixkeputusanController extends Controller
{
    public function index()
    {
        $results = DB::select('SELECT * from vmatrixkeputusan');
        return view('result/resultmatrix',[
            'results'=>$results
        ]);
    }
}
