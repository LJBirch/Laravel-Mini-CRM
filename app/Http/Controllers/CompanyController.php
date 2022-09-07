<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Show all companies.
    public function index() {
        return view('companies.index', [
            'companies' => Company::orderBy('created_at')->get()
        ]);
    }

    // Show single company.
    public function show(Company $company) {
        return view('companies.show', [
            'company' => $company
        ]);
    }
}
