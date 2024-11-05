<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\WorkflowApproval;
use App\Models\NeedApproval;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Exception;

class ApprovalService
{
    public function processApproval(Transaction $transaction)
    {
        try {
            DB::beginTransaction();

            $workflowApprovals = WorkflowApproval::where('modul_id', $transaction->modul_id)
                ->where('is_active', true)
                ->orderBy('level')
                ->get();

            foreach ($workflowApprovals as $workflow) {
                if ($this->shouldCreateApproval($workflow, $transaction)) {
                    $this->createNeedApproval($workflow, $transaction);
                }
            }

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function shouldCreateApproval(WorkflowApproval $workflow, Transaction $transaction): bool
    {
        switch ($workflow->type) {
            case 'Custom':
                return true;
            case 'HRIS':
                return true;
            case 'Total Amount >=':
                return $transaction->amount >= $workflow->value;
            case 'Total Amount >':
                return $transaction->amount > $workflow->value;
            case 'Total Amount <=':
                return $transaction->amount <= $workflow->value;
            case 'Total Amount <':
                return $transaction->amount < $workflow->value;
            default:
                return false;
        }
    }

    private function createNeedApproval(WorkflowApproval $workflow, Transaction $transaction)
    {
        $approverData = $this->getApproverData($workflow, $transaction);

        NeedApproval::create([
            'modul_id' => $workflow->id,
            'transaction_id' => $transaction->id,
            'nik' => $approverData['nik'],
            'name' => $approverData['name'],
            'email' => $approverData['email'],
            'position' => $approverData['position'],
            'level' => $workflow->level,
            'status' => 'Pending'
        ]);
    }

    private function getApproverData(WorkflowApproval $workflow, Transaction $transaction): array
    {
        if ($workflow->type === 'HRIS') {
            $employee = Employee::where('nik', $transaction->createdBy)->first();

            if (!$employee) {
                throw new Exception("Employee not found for NIK: {$transaction->createdBy}");
            }

            $approverLevel = "approver{$workflow->level}_";
            return [
                'nik' => $employee->{$approverLevel . 'nik'} ?? throw new Exception("Approver not set for level {$workflow->level}"),
                'name' => $employee->{$approverLevel . 'name'},
                'email' => $employee->{$approverLevel . 'email'},
                'position' => $employee->{$approverLevel . 'position'}
            ];
        }

        return [
            'nik' => $workflow->nik,
            'name' => $workflow->name,
            'email' => $workflow->email,
            'position' => $workflow->position
        ];
    }
}
