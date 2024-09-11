<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index(Request $request){

        $filters = $request->only(['search']);

        return view('member', [
            "title" => 'Membership',
            "position" => 'MEMBER :3',
            "data" => Membership::Filter($filters)->get()
        ]);
    }

    public function show_detail($id){
        return view('detail-membership', [
            "title" => 'Membership',
            "position" => 'MEMBER :3',
            "data" => Membership::where('m_id', $id)->firstOrFail()
        ]);
    }
}
