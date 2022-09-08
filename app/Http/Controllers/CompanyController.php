<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Show all companies.
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::latest()
                ->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show single company.
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }

    // Show company create.
    public function create()
    {
        return view('companies.create');
    }

    // Store company data.
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email'
            ],
            'website' => 'required'
        ]);

        if ($request->hasFile('logo'))
        {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Company::create($formFields);

        return redirect('/');
    }

    // Show edit company.
    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    // Update company data.
    public function update(Request $request, Company $company)
    {
        $formFields = $request->validate([
                'name' => 'required',
                'email' => [
                    'required',
                    'email'
                ],
                'website' => 'required'
            ]
        );

        $company->update($formFields);

        return redirect('/employees');
    }

    // Delete company data.
    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/');
    }
}
