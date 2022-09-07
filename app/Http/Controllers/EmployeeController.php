<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show all employees.
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::orderBy('created_at')->get()
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
        return view('employees.create');
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
            'phone_number' => 'required'
        ]);

        $formFields['company_id'] = 1;
        Employee::create($formFields);

        return redirect('/');
    }
}
