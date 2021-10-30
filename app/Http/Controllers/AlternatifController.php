<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = DB::select('select * from alternatifs');
        return view('table/dtalternatif',[
            'alternatifs'=>$alternatifs
        ]);
    }

    public function show()
    {
        $alternatifs = DB::select('select * from alternatifs');
        return view('table/dtalternatif',[
            'alternatifs'=>$alternatifs
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nmalternatif' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('failed',"Data gagal ditambahkan");
        }else {
            try {
                DB::insert('insert into alternatifs (nmalternatif) 
                            values (?)', 
                            [
                                $request->input('nmalternatif')
                            ]);
                
                return redirect('/')->with('status', 'Data Berhasil ditambahkan!');
            } catch (Exception $e) {
                return redirect('/')->with('failed',"operation failed");
            }
        }
    }
}
