@extends('components.app')

@section('content')
<x-section>
    <h3 class="mb-4">Employees Information:</h3>

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

        @foreach($employees as $employee)
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
                    <a class="me-2" href="/employees/{{$employee->id}}/edit">
                        <button class="btn btn-warning">Edit</button>
                    </a>
                    <form method="POST" action="/employees/{{$employee->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    @else
    <p>No employees found.</p>
    @endunless

    {{$employee->links()}}
</x-section>
@endsection
