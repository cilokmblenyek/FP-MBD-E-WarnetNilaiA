<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Membership;
use App\Models\WarnetSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WarnetSystemController extends Controller
{
    public function index(Request $request){

        $filters = $request->only(['search']);

        return view('warnetsystem', [
            "title" => 'Warnet System',
            "position" => 'WARNET SYSTEM',
            "data" => WarnetSystem::with('computer', 'membership')->Filter($filters)->get()
        ]);
    }

    public function create()
    {
        $computers = Computer::all();
        $memberships = Membership::all();

        return view('create-warnetsystem', [
            "title" => 'Warnet System',
            "position" => 'WARNET SYSTEM',
            "computers" => $computers,
            "memberships" => $memberships,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'ws_id' => 'required|unique:warnetsystem,ws_id',
            'ws_StartTime' => 'required',
            'ws_EndTime' => 'required',
            'ws_BalanceUsed' => 'required|integer|min:0',
            'computer_pc_id' => 'required|exists:computer,pc_id',
            'membership_m_id' => 'required|exists:membership,m_id',
        ]);

        Log::info($request->all());

        WarnetSystem::create([
            'ws_id' => $request->ws_id,
            'ws_StartTime' => $request->ws_StartTime,
            'ws_EndTime' => $request->ws_EndTime,
            'ws_BalanceUsed' => $request->ws_BalanceUsed,
            'computer_pc_id' => $request->computer_pc_id,
            'membership_m_id' => $request->membership_m_id,
        ]);

        return redirect('/warnetsystem')->with('success', 'warnet log created successfully');
    }
}
