@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $employee->nik }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
        </div>
        <div class="form-group">
            <label for="approver1_name">Approver 1 Name</label>
            <input type="text" name="approver1_name" class="form-control" value="{{ $employee->approver1_name }}">
        </div>
        <div class="form-group">
            <label for="approver1_email">Approver 1 Email</label>
            <input type="email" name="approver1_email" class="form-control" value="{{ $employee->approver1_email }}">
        </div>
        <div class="form-group">
            <label for="approver1_position">Approver 1 Position</label>
            <input type="text" name="approver1_position" class="form-control" value="{{ $employee->approver1_position }}">
        </div>
        <div class="form-group">
            <label for="approver2_name">Approver 2 Name</label>
            <input type="text" name="approver2_name" class="form-control" value="{{ $employee->approver2_name }}">
        </div>
        <div class="form-group">
            <label for="approver2_email">Approver 2 Email</label>
            <input type="email" name="approver2_email" class="form-control" value="{{ $employee->approver2_email }}">
        </div>
        <div class="form-group">
            <label for="approver2_position">Approver 2 Position</label>
            <input type="text" name="approver2_position" class="form-control" value="{{ $employee->approver2_position }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
