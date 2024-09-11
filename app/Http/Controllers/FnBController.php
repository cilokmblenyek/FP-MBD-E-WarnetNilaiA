<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FnB;

class FnBController extends Controller
{
    public function index(Request $request){

        $filters = $request->only(['search']); 

        return view('fnb', [
            "title" => 'Food and Beverages',
            "position" => 'FOOD and BEVERAGES',
            "data" => FnB::Filter($filters)->get()
        ]);
    }

    public function show_detail($id){
        return view('detail-fnb', [
            "title" => 'Food and Beverages',
            "position" => 'FOOD and BEVERAGES',
            "data" => FnB::where('fb_id', $id)->firstOrFail()
        ]);
    }

    public function create(){
        return view('create-fnb', [
            "title" => 'Food and Beverages',
            "position" => 'FOOD and BEVERAGES'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'fb_id' => 'required|unique:FnB|max:9',
            'fb_name' => 'required|string|max:50',
            'fb_price' => 'required|numeric|min:0',
            'fb_stock' => 'required|integer|min:0',
        ]);

        FnB::create([
            'fb_id' => $request->fb_id,
            'fb_name' => $request->fb_name,
            'fb_price' => $request->fb_price,
            'fb_stock' => $request->fb_stock,
        ]);

        return redirect('/fnb')->with('success', 'Product created successfully');
    }
}
