@extends('components.app')

@section('content')

    <form action="">
        <label for="email">Email:</label>
        <input name="email" type="text">

        <label for="password">Password:</label>
        <input name="password" type="password">
        <button type="submit">Login</button>
    </form>

@endsection
