@extends('components.app')

@section('content')

    @auth
    <p>Logged in!</p>
    @else
    <p>Please log in: <a href="/login">Login</a></p>
    @endauth

    @auth
        <a href="/">
            <button>Create new company</button>
        </a>
    @endauth

    @unless(count($companies) == 0)
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
            </tr>

            @foreach($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
            </tr>
            @endforeach
        </table>

    @else
        <p>No listings found.</p>
    @endunless
{{--    <x-company-card :companies="$companies" />--}}

@endsection
