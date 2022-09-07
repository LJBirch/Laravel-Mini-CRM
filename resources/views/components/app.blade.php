<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>{{ config('app.name', 'Laravel')  }}</title>
</head>
<body>
    <header>
        <nav>
            @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @else
            <a href="/login">
                <button>Login</button>
            </a>
            @endauth
        </nav>
    </header>
    @yield('content')
</body>
</html>
