@extends('components.app')

@section('content')
    {{--  #TODO add validation error messages  --}}
    <form method="POST" action="/companies/{{$company->id}}">
        @csrf
        @method('PUT')
        <label for="name">Company Name:</label>
        <input name="name" type="text" value="{{$company->name}}">

        <label for="email">Email:</label>
        <input name="email" type="email" value="{{$company->email}}">

        <label for="website">Website:</label>
        <input name="website" type="url" value="{{$company->website}}">

        <button type="submit">Update</button>
    </form>



@endsection
