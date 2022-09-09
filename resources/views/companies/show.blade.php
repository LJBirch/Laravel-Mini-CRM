@extends('components.app')

@section('content')
<x-section>

    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <img src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <h3 class="mb-4">Company Information:</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <a href="/companies/{{$company->id}}">
                    {{$company->name}}
                </a>
            </td>
            <td>
                <a href="mailto:{{$company->email}}">
                    {{$company->email}}
                </a>
            </td>
            <td>
                <a href="{{$company->website}}">
                    {{$company->website}}
                </a>
            </td>
            @auth
                <td>
                    <div class="d-flex">
                        <a class="me-2" href="/companies/{{$company->id}}/edit">
                            <button class="btn btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Company">
                                <i class="fa-solid fa-gear"></i>
                            </button>
                        </a>
                        <form method="POST" action="/companies/{{$company->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Company">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            @endauth
        </tr>
        </tbody>
    </table>

    <br>

    @auth
    @unless(count($company->employees) == 0)
        <h3 class="mb-4">Company Employees:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>

            <tbody>
            @foreach($company->employees as $employee)
                <tr>
                    <td>
                        {{$employee->first_name}}
                    </td>
                    <td>
                        {{$employee->last_name}}
                    </td>
                    <td>
                        <a href="mailto:{{$employee->email}}">
                            {{$employee->email}}
                        </a>
                    </td>
                    <td>
                        {{$employee->phone_number}}
                    </td>
                    <td>
                        <a href="/companies/{{$employee->company->id}}">
                            {{$employee->company->name}}
                        </a>
                    </td>
                    @auth
                        <td>
                            <div class="d-flex">
                                <a class="me-2" href="/employees/{{$employee->id}}">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Employee">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                                <a class="me-2" href="/employees/{{$employee->id}}/edit">
                                    <button class="btn btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Employee">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                </a>
                                <form method="POST" action="/employees/{{$employee->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Employee">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
    <p>
        No employees found.
    </p>
    @endunless
    <a href="/employees/create?company_id={{$company->id}}">
        <button class="btn btn-success">Add Employee</button>
    </a>
    @endauth
</x-section>
@endsection
