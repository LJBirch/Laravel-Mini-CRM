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
            'employees' => Employee::orderBy('created_at')->paginate(10)
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
            'companies' => Company::all()
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

        Employee::create($formFields);

        return redirect('/employees');
    }
}
