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
}
