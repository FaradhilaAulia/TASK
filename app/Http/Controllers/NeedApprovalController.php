<?php

namespace App\Http\Controllers;

use App\Models\NeedApproval;
use App\Models\Transaction;
use App\Models\WorkflowApproval;
use Illuminate\Http\Request;

class NeedApprovalController extends Controller
{
    public function index()
    {
        $needApprovals = NeedApproval::with(['transaction', 'workflowApproval'])->get();
        return view('need_approval.index', compact('needApprovals'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        $workflowApprovals = WorkflowApproval::all();
        return view('need_approval.create', compact('transactions', 'workflowApprovals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modul_id' => 'required|exists:transactions,id',
            'transaction_id' => 'required|exists:transactions,id',
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'position' => ' required|string|max:255',
            'level' => 'required|integer',
        ]);

        NeedApproval::create($request->all());

        return redirect()->route('need_approval.index')->with('success', 'Need Approval created successfully.');
    }

    public function edit($id)
    {
        $needApproval = NeedApproval::findOrFail($id);
        $transactions = Transaction::all();
        $workflowApprovals = WorkflowApproval::all();
        return view('need_approval.edit', compact('needApproval', 'transactions', 'workflowApprovals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modul_id' => 'required|exists:transactions,id',
            'transaction_id' => 'required|exists:transactions,id',
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'position' => 'required|string|max:255',
            'level' => 'required|integer',
        ]);

        $needApproval = NeedApproval::findOrFail($id);
        $needApproval->update($request->all());

        return redirect()->route('need_approval.index')->with('success', 'Need Approval updated successfully.');
    }

    public function destroy($id)
    {
        $needApproval = NeedApproval::findOrFail($id);
        $needApproval->delete();

        return redirect()->route('need_approval.index')->with('success', 'Need Approval deleted successfully.');
    }
}
