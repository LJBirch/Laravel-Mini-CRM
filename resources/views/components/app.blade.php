<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>{{ config('app.name', 'Laravel')  }}</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Mini CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('companies/create') ? 'active' : '' }}" aria-current="page" href="/companies/create">Add Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees') ? 'active' : '' }}" aria-current="page" href="/employees">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees/create') ? 'active' : '' }}" aria-current="page" href="/employees/create">Add Employee</a>
                    </li>
                </ul>

{{--                <form method="GET" class="d-flex" role="search">--}}
{{--                    @csrf--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-light" type="submit">Search</button>--}}
{{--                </form>--}}

                @auth
                <form method="POST" action="/logout" class="d-flex" role="logout">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
                @else
                <a href="/login">
                    <button class="btn btn-outline-light" type="submit">Login</button>
                </a>
                @endauth
            </div>
        </div>
    </nav>
</header>

<main class="d-fled justify-content-center align-item-center py-5">
    @yield('content')
</main>

<?php $message='error' ?>

<x-notification :message="$message"></x-notification>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>
