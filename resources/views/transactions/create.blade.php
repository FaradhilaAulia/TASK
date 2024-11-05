@extends('layouts.app')

@section('content')
    <h1>Add Transaction</h1>

    <form action="{{ route('transactions.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="modul_id" class="form-label">Modul ID</label>
            <input type="text" class="form-control" id="modul_id" name="modul_id" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="createdBy" class="form-label">Created By (NIK)</label>
            <input type="text" class="form-control" id="createdBy" name="createdBy" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
