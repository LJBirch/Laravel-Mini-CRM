@extends('components.app')

@section('content')

    @auth
        <a href="/companies/create">
            <button>Create new company</button>
        </a>
    @endauth

    <img src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.png')}}" alt="">
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

@endsection
