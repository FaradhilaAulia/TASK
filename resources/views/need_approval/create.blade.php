@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Need Approval</h1>
    <form action="{{ route('need_approval.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="modul_id">Modul ID</label>
            <input type="number" name="modul_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="transaction_id">Transaction ID</label>
            <input type="number" name="transaction_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="number" name="level" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
