@extends('layouts.app')

@section('content')
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Add Transaction</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Modul ID</th>
                <th>Amount</th>
                <th>Created By (NIK)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->modul_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->createdBy }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning me-5">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
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
