<?php

namespace App\Http\Controllers;

use App\Models\WorkflowApproval;
use Illuminate\Http\Request;
use App\Models\Transaction; // Import model Transaction


class WorkflowApprovalController extends Controller
{
    public function index()
    {
        $workflowApprovals = WorkflowApproval::all();
        return view('workflow_approvals.index', compact('workflowApprovals'));
    }



    public function create()
    {
        // Logic to show the form for creating a new workflow approval
        return view('workflow_approvals.create'); // Ensure this view exists
    }

    public function store(Request $request)
    {
        $workflowApproval = new WorkflowApproval();
        $workflowApproval->modul = $request->input('modul');
        $workflowApproval->type = $request->input('type');
        $workflowApproval->value = $request->input('value');
        $workflowApproval->nik = $request->input('nik');
        $workflowApproval->name = $request->input('name');
        $workflowApproval->email = $request->input('email');
        $workflowApproval->position = $request->input('position');
        $workflowApproval->save();
        return redirect()->route('workflow_approvals.index');
    }

    public function destroy($id)
    {
        $workflowApproval = WorkflowApproval::find($id);
        $workflowApproval->delete();
        return redirect()->route('workflow_approvals.index');
    }
    public function edit($id)
    {
    // Ambil data workflow approval berdasarkan ID
    $workflowApproval = WorkflowApproval::findOrFail($id);

    // Tampilkan view edit dengan data yang ada
    return view('workflow_approvals.edit', compact('workflowApproval'));
    }

    // public function update(Request $request, $id)
    // {
    // // Validasi data yang diterima
    // $request->validate([
    //     'name' => 'required|string|max:255',
    // ]);

    // // Ambil data workflow approval berdasarkan ID
    // $workflowApproval = WorkflowApproval::findOrFail($id);

    // // Update data dengan input baru
    // $workflowApproval->update($request->all());

    // // Redirect setelah berhasil mengupdate
    // return redirect()->route('workflow_approvals.index')->with('success', 'Workflow Approval updated successfully.');
    // }

    public function update(Request $request, $id)
    {
    // Validasi data yang diterima
    $request->validate([
        'modul' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'value' => 'required|numeric',
        'nik' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'position' => 'required|string|max:255',
    ]);

    // Ambil data workflow approval berdasarkan ID
    $workflowApproval = WorkflowApproval::findOrFail($id);

    // Update data dengan input baru
    $workflowApproval->update($request->all());

    // Redirect setelah berhasil mengupdate
    return redirect()->route('workflow_approvals.index')->with('success', 'Workflow Approval updated successfully.');
    }

    public function show($id)
    {
    // Optionally, you can redirect or throw an exception if you don't want to implement this
    return redirect()->route('workflow_approvals.index');
    }

    // public function transactionIndex()
    // {
    //     $transactions = Transaction::all();
    //     return view('transactions.index', compact('transactions'));
    // }

    // public function transactionCreate()
    // {
    //     return view('transactions.create');
    // }

    // public function transactionStore(Request $request)
    // {
    //     $request->validate([
    //         'modul_id' => 'required|exists:workflow_approvals,id',
    //         'amount' => 'required|numeric',
    //         'createdBy' => 'required|string|max:255',
    //     ]);

    //     Transaction::create($request->all());
    //     return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    // }

    // public function transactionEdit($id)
    // {
    //     $transaction = Transaction::findOrFail($id);
    //     return view('transactions.edit', compact('transaction'));
    // }

    // public function transactionUpdate(Request $request, $id)
    // {
    //     $request->validate([
    //         'modul_id' => 'required|exists:workflow_approvals,id',
    //         'amount' => 'required|numeric',
    //         'createdBy' => 'required|string|max:255',
    //     ]);

    //     $transaction = Transaction::findOrFail($id);
    //     $transaction->update($request->all());

    //     return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    // }

    // public function transactionDestroy($id)
    // {
    //     $transaction = Transaction::findOrFail($id);
    //     $transaction->delete();

    //     return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    // }

}
