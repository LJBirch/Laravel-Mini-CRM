<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Show all companies.
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show single company.
    public function show(Company $company)
    {
        $company['employees'] = Employee::where('company_id', '=', $company->id)->get();

        return view('companies.show', [
            'company' => $company,
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
            'website' => 'required',
            'logo' => 'dimensions:min_width=100, min_height=100'
        ]);

        if ($request->hasFile('logo'))
        {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company =  Company::create($formFields);

        return redirect("/companies/{$company->id}")->with('message', 'Company added successfully!');
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

        return redirect("/companies/{$company->id}")->with('message', 'Company updated successfully!');;
    }

    // Delete company data.
    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/')->with('message', 'Company deleted successfully!');;
    }
}
