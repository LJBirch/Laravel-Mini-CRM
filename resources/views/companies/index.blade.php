@extends('components.app')

@section('content')

    @auth
        <a href="/companies/create">
            <button>Create new company</button>
        </a>
    @endauth

    @unless(count($companies) == 0)
        <table>
            <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>Website</th>
            </tr>

            @foreach($companies as $company)
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
            @endforeach
        </table>

    @else
        <p>No listings found.</p>
    @endunless
{{--    <x-company-card :companies="$companies" />--}}

@endsection
