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
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
                @auth
                    <td>
                        <div class="d-flex">
                            <a class="me-2" href="/companies/{{$company->id}}/edit">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <form method="POST" action="/companies/{{$company->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
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
                        <th>Company Name</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($company->employees as $employee)
                    <tr>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone_number}}</td>
                        <td>
                            <a href="/companies/{{$employee->company->id}}">
                                {{$employee->company->name}}
                            </a>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="me-2" href="/employees/{{$employee->company->id}}/edit">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <form method="POST" action="/employees/{{$employee->company->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
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
            <button class="btn btn-primary">Add Employee</button>
        </a>
    @endauth
</x-section>
@endsection
