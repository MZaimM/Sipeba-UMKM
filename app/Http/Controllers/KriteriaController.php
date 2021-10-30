<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = DB::select('select * from kriterias');
        return view('table/dtkriteria',[
            'kriterias'=>$kriterias
        ]);
    }

    public function show()
    {
        $kriterias = DB::select('select * from kriterias');
        return view('form/formbobot',[
            'kriterias'=>$kriterias
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nmkriteria' => 'required',
            'jeniskriteria' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/kriteria')->with('failed', 'Data Gagal ditambahkan!')->withErrors($validator);
        }else {
            try {
                DB::insert('insert into kriterias (nmkriteria,jeniskriteria) 
                            values (?,?)', 
                            [
                                $request->input('nmkriteria'),
                                $request->input('jeniskriteria')
                            ]);
                
                return redirect('/kriteria')->with('status', 'Data Berhasil ditambahkan!');
            } catch (Exception $e) {
                return redirect('/kriteria')->with('failed',"operation failed");
            }
        }
    }
}
