@extends('components.app')

@section('content')

    @auth
        <a href="/companies/create">
            <button>Create new company</button>
        </a>
    @endauth

    <img src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.png')}}" alt="">

    <h2>Company Information:</h2>
    <table>
        <tr>
            <th>Company Name</th>
            <th>Email</th>
            <th>Website</th>
        </tr>
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td>
                <a href="/companies/{{$company->id}}/edit">
                    <button>Edit</button>
                </a>
                <form method="POST" action="/companies/{{$company->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </table>

    <br>

    @unless(count($company->employees) == 0)
        <h2>Company Employees:</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Company Name</th>
            </tr>

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
                        <a href="/employees/{{$employee->id}}/edit">
                            <button>Edit</button>
                        </a>
                        <form method="POST" action="/employees/{{$employee->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    @else
        <p>No employees found.</p>
    @endunless

@endsection
