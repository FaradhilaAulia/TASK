@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Need Approval</h1>
    <form action="{{ route('need_approval.update', $needApproval->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modul_id">Modul ID</label>
            <input type="number" name="modul_id" class="form-control" value="{{ $needApproval->modul_id }}" required>
        </div>
        <div class="form-group">
            <label for="transaction_id">Transaction ID</label>
            <input type="number" name="transaction_id" class="form-control" value="{{ $needApproval->transaction_id }}" required>
        </div>
        <div class="form ```blade
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $needApproval->nik }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $needApproval->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $needApproval->email }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" value="{{ $needApproval->position }}" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="number" name="level" class="form-control" value="{{ $needApproval->level }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
