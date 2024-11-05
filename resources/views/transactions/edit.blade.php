@extends('layouts.app')

@section('content')
    <h1>Edit Transaction</h1>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="modul_id" class="form-label">Modul ID</label>
            <input type="text" class="form-control" id="modul_id" name="modul_id" value="{{ $transaction->modul_id }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="createdBy" class="form-label">Created By (NIK)</label>
            <input type="text" class="form-control" id="createdBy" name="createdBy" value="{{ $transaction->createdBy }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
