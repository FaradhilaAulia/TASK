<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('workflowApproval')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'modul_id' => 'required|string|max:255,id',
        'amount' => 'required|numeric',
        'createdBy' => 'required|string',
    ]);

    try {
        // Debug: Cek data yang diterima
        Log::info('Data yang disubmit:', $request->all());

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    } catch (\Exception $e) {
        Log::error('Error saving transaction: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Failed to create transaction.']);
    }
}

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'modul_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric',
            'createdBy' => 'required|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
