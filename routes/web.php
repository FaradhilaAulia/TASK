<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkflowApprovalController;
use App\Http\Controllers\NeedApprovalController;
use App\Http\Controllers\EmployeeController;

// Route::get('/workflow-approvals', [WorkflowApprovalController::class, 'index'])->name('workflow_approvals.index');
// Route::post('/workflow-approvals', [WorkflowApprovalController::class, 'store'])->name('workflow_approvals.store');
// Route::delete('/workflow-approvals/{id}', [WorkflowApprovalController::class, 'destroy'])->name('workflow_approvals.destroy');
// Route::get('/workflow-approvals/create', [WorkflowApprovalController::class, 'create'])->name('workflow_approvals.create');
// Route::get('/workflow-approvals/{id}/edit', [WorkflowApprovalController::class, 'edit'])->name('workflow_approvals.edit');
// Route::put('/workflow-approvals/{id}', [WorkflowApprovalController::class, 'update'])->name('workflow_approvals.update');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('workflow_approvals', WorkflowApprovalController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('need_approval', NeedApprovalController::class);
Route:: resource('employees', EmployeeController::class);
