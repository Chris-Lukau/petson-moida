<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'bi_number' => 'required|unique:employees',
            'gender' => 'required',
            'address' => 'required',
            'service' => 'nullable'
        ]);

        Employee::create($request->all());

        return back()->with('success', 'Funcionário cadastrado');
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return back()->with('success', 'Atualizado');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('success', 'Eliminado');
    }
}