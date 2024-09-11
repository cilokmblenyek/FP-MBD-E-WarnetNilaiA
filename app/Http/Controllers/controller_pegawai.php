<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee as model_pegawai;

class controller_pegawai extends Controller
{
    public function index(Request $request){

        $filters = $request->only(['search']);
        
        return view('pegawai', [
            "title" => 'Pegawai',
            "position" => 'PEGAWAI >:3',
            "pegawaiku" => model_pegawai::filter($filters)->get()
        ]);
    }

    public function show_detail($id){
        $pegawai = model_pegawai::find($id);
        if (!$pegawai) {
            abort(404, 'Data tidak ditemukan');
        }
        
        return view('detail-pegawai', [
            "title" => 'Pegawai',
            "position" => 'PEGAWAI >:3',
            "pegawaiku" => model_pegawai::where('e_id', $id)->firstOrFail()
        ]);
    }
}
