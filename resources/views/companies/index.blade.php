@extends('components.app')


@section('content')
<x-section>
    <h3 class="mb-4">Company Information:</h3>

    {{--  TODO Refactor to partial.  --}}
    <form method="GET" action="/" class="form mb-3 d-flex">
        <input class="form-control form-control-lg me-2" type="text" name="search" placeholder="Search Companies">
        <button class="btn btn-primary d-flex justify-content-center align-items-center" type="submit">
            Search
            <i class="fa-solid fa-magnifying-glass ms-2"></i>
        </button>
    </form>

    @unless(count($companies) == 0)
    {{--  TODO Refactor to partial.  --}}
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
                <td>
                    <a href="mailto:{{$company->email}}">
                        {{$company->email}}
                    </a>
                </td>
                <td>
                    <a href="{{$company->website}}">
                        {{$company->website}}
                    </a>
                </td>
                @auth
                <td>
                    <div class="d-flex">
                        <a class="me-2" href="/companies/{{$company->id}}">
                            <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Company">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </a>
                        <a class="me-2" href="/companies/{{$company->id}}/edit">
                            <button class="btn btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Company">
                                <i class="fa-solid fa-gear"></i>
                            </button>
                        </a>
                        <form method="POST" action="/companies/{{$company->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Company">
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
    <p>No listings found.</p>
    @endunless

    @auth
    <a href="/companies/create">
        <button class="btn btn-success">Add Company <i class="fa-solid fa-plus ms-1"></i>  </button>
    </a>
    @endauth

    {{$companies->links()}}

</x-section>
@endsection
