@extends('components.app')

@section('content')

    @auth
    <p>Logged in!</p>
    @else
    <p>Please log in: <a href="/login">Login</a></p>
    @endauth

@endsection
