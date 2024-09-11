<?php

namespace App\Http\Controllers;

use App\Models\FnB;
use App\Models\Employee;
use App\Models\AddBalance;
use App\Models\Membership;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CashierTransaction;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\CashierTransaction_FnB;
use App\Models\CashierTransaction_AddBalance;

class CashierTransactionController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search']);

        return view('transaksi', [
            "title" => 'Transaksi',
            "position" => 'TRANSAKSI',
            "data" => CashierTransaction::with('employee', 'membership')->filter($filters)->get()
        ]);
    }

    public function show_detail($id)
    {
        $transaction = CashierTransaction::with('employee', 'membership')->where('t_id', $id)->firstOrFail();

        return view('detail-cashiertransaction', [
            "title" => 'Transaksi',
            "position" => 'TRANSAKSI',
            "data" => $transaction
        ]);
    }

    public function create()
    {
        $employees = Employee::all();
        $memberships = Membership::all();
        $fnbItems = FnB::all();

        return view('create-cashiertransaction', [
            "title" => 'Transaksi',
            "position" => 'TRANSAKSI',
            "employees" => $employees,
            "memberships" => $memberships,
            "fnbItems" => $fnbItems,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            't_id' => 'required|unique:cashiertransaction,t_id',
            't_date' => 'required|date',
            't_PaymentMethod' => 'required|string|max:20',
            't_TotalAmount' => 'required|integer|min:0',
            'employee_e_id' => 'required|exists:employee,e_id',
            'membership_m_id' => 'required|exists:membership,m_id',
            'fnb_items' => 'array',
            'fnb_items.*.fnb_fb_id' => 'required|exists:FnB,fb_id',
            'fnb_items.*.amount' => 'required|integer|min:0',
            'ab_id' => 'required|unique:addbalance,ab_id',
            'add_balance_amount' => 'required|integer|min:0'
        ]);
    
        Log::info('Validated data', $request->all());
    
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            // Create the cashier transaction
            $transaction = CashierTransaction::create([
                't_id' => $request->t_id,
                't_date' => $request->t_date,
                't_PaymentMethod' => $request->t_PaymentMethod,
                't_TotalAmount' => $request->t_TotalAmount,
                'employee_e_id' => $request->employee_e_id,
                'membership_m_id' => $request->membership_m_id,
            ]);
    
            // Create and attach FnB items to the transaction
            if ($request->has('fnb_items')) {
                foreach ($request->fnb_items as $fnb) {
                    CashierTransaction_FnB::create([
                        'CashierTransaction_t_id' => $transaction->t_id,
                        'fnb_fb_id' => $fnb['fnb_fb_id'],
                        'amount' => $fnb['amount']
                    ]);
                }
            }
    
            // Create a new AddBalance entry
            if ($request->has('add_balance_amount')) {
                $addBalance = AddBalance::create([
                    'ab_id' => $request->ab_id,
                    'ab_balance' => $request->add_balance_amount,
                    'ab_price' => $request->add_balance_amount,
                ]);
    
                // Attach the AddBalance entry to the transaction
                CashierTransaction_AddBalance::create([
                    'CashierTransaction_t_id' => $transaction->t_id,
                    'AddBalance_ab_id' => $addBalance->ab_id,
                ]);
            }
    
            // Commit the transaction
            DB::commit();
    
            return redirect('/cashiertransaction')->with('success', 'Transaction created successfully');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            Log::error('Error creating transaction', ['error' => $e->getMessage()]);
            return redirect('/cashiertransaction')->with('error', 'Failed to create transaction');
        }
    }
    
}
