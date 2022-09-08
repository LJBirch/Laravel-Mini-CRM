@extends('components.app')

@section('content')

    @auth
        <a href="/companies/create">
            <button>Create new company</button>
        </a>
    @endauth

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
            </td>
        </tr>
    </table>

@endsection
