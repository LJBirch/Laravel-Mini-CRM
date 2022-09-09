@extends('components.app')

@section('content')
<x-section>
    <h3 class="mb-4">Employees Information:</h3>

    @include('partials._search', ['action' => '/employees', 'placeholder' => 'Search Employees'])

    @unless(count($employees) == 0)
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
        @foreach($employees as $employee)
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
    <p>No employees found.</p>
    @endunless

    {{$employees->links()}}
</x-section>
@endsection
