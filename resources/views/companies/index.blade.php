@extends('components.app')


@section('content')
<x-section>
    <h3 class="mb-4">Company Information:</h3>

    @unless(count($companies) == 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
            </tr>
        </thead>

        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>
                    <a href="/companies/{{$company->id}}">
                        {{$company->name}}
                    </a>
                </td>
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
            @endforeach
        </tbody>
    </table>
    @else
    <p>No listings found.</p>
    @endunless

    @auth
        <a href="/companies/create">
            <button class="btn btn-primary">Add New Company</button>
        </a>
    @endauth

</x-section>
@endsection
