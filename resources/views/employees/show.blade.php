@extends('components.app')

@section('content')

    @auth
        <a href="/employees/create">
            <button>Add new employee</button>
        </a>
    @endauth

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        <tr>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_number}}</td>
        </tr>
    </table>

@endsection