<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index(Request $request){

        $filters = $request->only(['search']);

        return view('komputer', [
            "title" => 'Komputer',
            "position" => 'KOMPUTER',
            "data" => Computer::Filter($filters)->get()
        ]);
    }

    public function show_detail($id){
        return view('detail-computer', [
            "title" => 'Komputer',
            "position" => 'KOMPUTER',
            "data" => Computer::where('pc_id', $id)->firstOrFail()
        ]);
    }

    public function create(){
        return view('create-komputer', [
            "title" => 'Komputer',
            "position" => 'KOMPUTER'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'pc_id' => 'required|unique:Computer|max:9',
            'pc_status' => 'required|string|max:50',
            'pc_specification' => 'required|string|max:50',
            'pc_RoomType' => 'required|string|max:50',
        ]);

        Computer::create([
            'pc_id' => $request->pc_id,
            'pc_status' => $request->pc_status,
            'pc_specification' => $request->pc_specification,
            'pc_RoomType' => $request->pc_RoomType,
        ]);

        return redirect('/komputer')->with('success', 'Product created successfully');
    }
}
