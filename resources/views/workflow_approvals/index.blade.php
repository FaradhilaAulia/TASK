@extends('layouts.app')

@section('content')
    <h1>Workflow Approvals</h1>
    <a href="{{ route('workflow_approvals.create') }}" class="btn btn-success mb-3">Add Data</a>

    {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

    <table class="table">
        <thead>
            <tr>
                <th>Modul</th>
                <th>Type</th>
                <th>Value</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workflowApprovals as $workflowApproval)
                <tr>
                    <td>{{ $workflowApproval->modul }}</td>
                    <td>{{ $workflowApproval->type }}</td>
                    <td>{{ $workflowApproval->value }}</td>
                    <td>{{ $workflowApproval->nik }}</td>
                    <td>{{ $workflowApproval->name }}</td>
                    <td>{{ $workflowApproval->email }}</td>
                    <td>{{ $workflowApproval->position }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('workflow_approvals.edit', $workflowApproval) }}" class="btn btn-warning me-5">Edit</a>
                            <form action="{{ route('workflow_approvals.destroy', $workflowApproval->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-5">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
