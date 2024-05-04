<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TransactioinController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transactions')
        ->join('users', 'transactions.user_id', '=', 'users.id')
        ->select('transactions.*', 'users.name', 'users.account_type')
        ->get();
        return view('transaction.index',compact('transactions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transaction_type' => 'required|in:deposit,withdrawal',
            'amount' => 'required',
            'fee' => 'required',
            'date' => 'required',
            
        ]);
    
        $user = User::create([
            'date' => $validatedData['date'],
            'fee' => $validatedData['fee'],
            'amount' => $validatedData['amount'],
            'transaction_type' => $validatedData['transaction_type'],
        ]);
    
        return redirect()->back()->with('success', 'transaction created successfully!');
    }
}
