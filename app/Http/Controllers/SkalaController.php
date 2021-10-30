<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SkalaController extends Controller
{
    public function index()
    {
        $skalas = DB::select('select * from skalas');
        return view('table/dtskala',[
            'skalas'=>$skalas
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'keterangan' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/skala')->with('failed', 'Data Gagal ditambahkan!')->withErrors($validator);
        }else {
            try {
                DB::insert('insert into skalas (keterangan,value) 
                            values (?,?)', 
                            [
                                $request->input('keterangan'),
                                $request->input('value')
                            ]);
                
                return redirect('/skala')->with('status', 'Data Berhasil ditambahkan!');
            } catch (Exception $e) {
                return redirect('/skala')->with('failed',"operation failed");
            }
        }
    }
}
