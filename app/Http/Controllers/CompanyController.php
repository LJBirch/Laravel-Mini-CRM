<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index', [
            'companies' => Company::orderBy('created_at')->get()
        ]);
    }
}
