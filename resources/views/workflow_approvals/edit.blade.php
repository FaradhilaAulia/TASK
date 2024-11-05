@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Workflow Approval</div>

                <div class="card-body">
                    <form action="{{ route('workflow_approvals.update', $workflowApproval) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="modul">Modul</label>
                            <input type="text" class="form-control" id="modul" name="modul" value="{{ $workflowApproval->modul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Custom" {{ $workflowApproval->type == 'Custom' ? 'selected' : '' }}>Custom</option>
                                <option value="HRIS" {{ $workflowApproval->type == 'HRIS' ? 'selected' : '' }}>HRIS</option>
                                <option value="Total Amount >=" {{ $workflowApproval->type == 'Total Amount >=' ? 'selected' : '' }}>Total Amount >=</option>
                                <option value="Total Amount >" {{ $workflowApproval->type == 'Total Amount >' ? 'selected' : '' }}>Total Amount ></option>
                                <option value="Total Amount <=" {{ $workflowApproval->type == 'Total Amount <=' ? 'selected' : '' }}>Total Amount <=</option>
                                <option value="Total Amount <" {{ $workflowApproval->type == 'Total Amount <' ? 'selected' : '' }}>Total Amount <</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value/Level</label>
                            <input type="number" class="form-control" id="value" name="value" value="{{ $workflowApproval->value }}" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $workflowApproval->nik }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $workflowApproval->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $workflowApproval->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" value="{{ $workflowApproval->position }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('workflow_approvals.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
