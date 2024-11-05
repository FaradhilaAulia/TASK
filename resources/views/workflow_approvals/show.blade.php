@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Workflow Approval Details</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Modul</th>
                            <td>{{ $workflowApproval->modul }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $workflowApproval->type }}</td>
                        </tr>
                        <tr>
                            <th>Value/Level</th>
                            <td>{{ $workflowApproval->value }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $workflowApproval->nik }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $workflowApproval->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $workflowApproval->email }}</td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>{{ $workflowApproval->position }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('workflow_approvals.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
