<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show all employees.
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::latest()->filter(request(['search', 'company_id']))->paginate(10)
        ]);
    }

    // Show single employee.
    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    // Show employee create.
    public function create()
    {
        return view('employees.create', [
            'companies' => Company::all(),
            'company_id' => request('company_id')
        ]);
    }

    // Store employee data.
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email'
            ],
            'phone_number' => 'required',
            'company_id' => 'required'
        ]);

        $employee = Employee::create($formFields);

        return redirect("/employees/{$employee->id}")->with('message', 'Employee added successfully!');
    }

    // Show edit employee.
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'companies' => Company::all()
        ]);
    }

    // Update employee data.
    public function update(Request $request, Employee $employee)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email'
            ],
            'phone_number' => 'required',
            'company_id' => 'required'
        ]);

        $employee->update($formFields);

        return redirect("/employees/{$employee->id}")->with('message', 'Employee updated successfully!');
    }

    // Delete employee data.
    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees')->with('message', 'Employee deleted successfully!');;
    }
}
