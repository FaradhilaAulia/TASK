<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255|unique:employees',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'position' => 'required|string|max:255',
            'approver1_name' => 'nullable|string|max:255',
            'approver1_email' => 'nullable|email|max:255',
            'approver1_position' => 'nullable|string|max:255',
            'approver2_name' => 'nullable|string|max:255',
            'approver2_email' => 'nullable|email|max:255',
            'approver2_position' => 'nullable|string|max:255',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:255|unique:employees,nik,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $id,
            'position' => 'required|string|max:255',
            'approver1_name' => 'nullable|string|max:255',
            'approver1_email' => 'nullable|email|max:255',
            'approver1_position' => 'nullable|string|max:255',
            'approver2_name' => 'nullable|string|max:255',
            'approver2_email' => 'nullable|email|max:255',
            'approver2_position' => 'nullable|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
