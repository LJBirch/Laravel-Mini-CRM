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
                <td>
                    <a href="/companies/{{$company->id}}">
                        {{$company->name}}
                    </a>
                </td>
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
            @endforeach
        </table>

    @else
        <p>No listings found.</p>
    @endunless
{{--    <x-company-card :companies="$companies" />--}}

@endsection
