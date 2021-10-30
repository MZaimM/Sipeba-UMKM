<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatrixkeputusanController extends Controller
{
    public function index()
    {
        $matrixs = DB::select('select idmatrix, nmalternatif, bobots.value as nilaibobot, skalas.keterangan, skalas.value as nilaiskala 
                            from alternatifs,bobots,skalas,matrixkeputusans
                            where matrixkeputusans.idalternatif = alternatifs.idalternatif
                            AND matrixkeputusans.idbobot = bobots.idbobot
                            AND matrixkeputusans.idskala = skalas.idskala');
        return view('table/dtmatrix',[
            'matrixs'=>$matrixs
        ]);
    }

    public function show()
    {
        $alternatifs = DB::select('select * from alternatifs');
        $bobots = DB::select('select * from bobots');
        $skalas = DB::select('select * from skalas');

        return view('form/formmatrix',[
            'alternatifs'=>$alternatifs,
            'bobots'=>$bobots,
            'skalas'=>$skalas
        ]);
    }

    public function showMatrix()
    {
        $results = DB::select('SELECT * from vmatrixkeputusan');
        return view('result/resultmatrix',[
            'results'=>$results
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nmalternatif' => 'required',
            'value' => 'required',
            'keterangan'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect('/matrix')->with('failed', 'Data gagal ditambahkan!');
        }else {
            try {
                DB::insert('insert into matrixkeputusans (idalternatif, idbobot, idskala) 
                            values (?,?,?)', 
                            [
                                $request->input('nmalternatif'),
                                $request->input('value'),
                                $request->input('keterangan')
                            ]);
                
                return redirect('/matrix')->with('status', 'Data Berhasil ditambahkan!');
            } catch (Exception $e) {
                return redirect('/matrix')->with('failed',"operation failed");
            }
        }
    }
}
