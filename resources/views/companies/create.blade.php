@extends('components.app')

@section('content')
    {{--  #TODO add validation error messages  --}}
    <form method="POST" action="/companies" enctype="multipart/form-data">
        @csrf
        <label for="name">Company Name:</label>
        <input name="name" type="text">

        <label for="email">Email:</label>
        <input name="email" type="email">

        <label for="website">Website:</label>
        <input name="website" type="url">

        <label for="logo">Company Logo:</label>
        <input name="logo" type="file">
        @error('logo')
        <p >Logo too small</p>
        @enderror

        <button type="submit">Login</button>
    </form>

@endsection
