@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Need Approvals</h1>
    <a href="{{ route('need_approval.create') }}" class="btn btn-primary">Create Need Approval</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modul ID</th>
                <th>Transaction ID</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($needApprovals as $needApproval)
            <tr>
                <td>{{ $needApproval->id }}</td>
                <td>{{ $needApproval->modul_id }}</td>
                <td>{{ $needApproval->transaction_id }}</td>
                <td>{{ $needApproval->nik }}</td>
                <td>{{ $needApproval->name }}</td>
                <td>{{ $needApproval->email }}</td>
                <td>{{ $needApproval->position }}</td>
                <td>{{ $needApproval->level }}</td>
                <td>
                    <a href="{{ route('need_approval.edit', $needApproval->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('need_approval.destroy', $needApproval->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
