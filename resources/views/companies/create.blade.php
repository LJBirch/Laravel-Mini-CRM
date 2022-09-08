@extends('components.app')

@section('content')
    {{--  #TODO add validation error messages  --}}
    <form method="POST" action="/companies">
        @csrf
        <label for="name">Company Name:</label>
        <input name="name" type="text">

        <label for="email">Email:</label>
        <input name="email" type="email">

        <label for="website">Website:</label>
        <input name="website" type="url">

        <button type="submit">Login</button>
    </form>

@endsection
