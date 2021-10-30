<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BobotController extends Controller
{
    public function index()
    {
        $bobots = DB::select('select idbobot,nmkriteria,value from bobots,kriterias where bobots.idkriteria = kriterias.idkriteria');
        return view('table/dtbobot',[
            'bobots'=>$bobots
        ]);

    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'idkriteria' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/bobot')->with('failed', 'Data gagal ditambahkan!');
        }else {
            try {
                DB::insert('insert into bobots (idkriteria, value) 
                            values (?,?)', 
                            [
                                $request->input('idkriteria'),
                                $request->input('value')
                            ]);
                
                return redirect('/bobot')->with('status', 'Data Berhasil ditambahkan!');
            } catch (Exception $e) {
                return redirect('/bobot')->with('failed',"operation failed");
            }
        }
    }
}
