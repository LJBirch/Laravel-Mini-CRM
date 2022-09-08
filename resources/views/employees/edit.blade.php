@extends('components.app')

@section('content')
    {{--  #TODO add validation error messages  --}}
    <form method="POST" action="/employees/{{$employee->id}}">
        @csrf
        @method('PUT')
        <label for="first_name">First Name:</label>
        <input name="first_name" type="text" value="{{$employee->first_name}}">

        <label for="last_name">Last Name:</label>
        <input name="last_name" type="text" value="{{$employee->last_name}}">

        <label for="email">Email:</label>
        <input name="email" type="email" value="{{$employee->email}}">

        <label for="phone_number">Phone Number:</label>
        <input name="phone_number" type="string" value="{{$employee->phone_number}}">

        <label for="company_id">Company</label>
        <select name="company_id" id="company_id">
            @foreach($companies as $company)
                <option value={{$company->id}} {{$employee->company_id == $company->id ? 'selected' : ''}}>
                    {{$company->name}}
                </option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>

@endsection
