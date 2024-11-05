@extends('layouts.app')

@section('content')
    <h1>Create Workflow Approval</h1>
    <form action="{{ route('workflow_approvals.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="modul">Modul</label>
            <input type="text" class="form-control" id="modul" name="modul" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Custom">Custom</option>
                <option value="HRIS">HRIS</option>
                <option value="Total Amount >=">Total Amount >=</option>
                <option value="Total Amount >">Total Amount ></option>
                <option value="Total Amount <=">Total Amount <=</option>
                <option value="Total Amount <">Total Amount <</option>
            </select>
        </div>
        <div class="form-group">
            <label for="value">Value</label>
            <input type="number" class="form-control" id="value" name="value" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text " class="form-control" id="position" name="position" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
