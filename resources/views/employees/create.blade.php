@extends('components.app')

@section('content')

    <form method="POST" action="/employees">
        @csrf
        <label for="first_name">First Name:</label>
        <input name="first_name" type="text">

        <label for="last_name">Last Name:</label>
        <input name="last_name" type="text">

        <label for="email">Email:</label>
        <input name="email" type="email">

        <label for="phone_number">Phone Number:</label>
        <input name="phone_number" type="string">

        <label for="company_id">Company</label>
        <select name="company_id" id="company_id">
            @foreach($companies as $company)
                <option value={{$company->id}}>
                    {{$company->name}}
                </option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>

@endsection
