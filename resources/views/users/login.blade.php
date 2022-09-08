@extends('components.app')

@section('content')
    {{--  #TODO add CSRF token to header of HTML document.  --}}
    {{--  #TODO add validation error messages  --}}
    <form method="POST" action="/users/authenticate">
        @csrf
        <label for="email">Email:</label>
        <input name="email" type="text">

        <label for="password">Password:</label>
        <input name="password" type="password">
        <button type="submit">Login</button>
    </form>

@endsection
