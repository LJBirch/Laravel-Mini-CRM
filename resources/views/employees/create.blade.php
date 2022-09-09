@extends('components.app')

@section('content')
<x-section>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/employees" class="form">
                        @csrf
                        <h3 class="text-center mb-3">Create Employee</h3>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input name="first_name" type="text" class="form-control" value="{{old('first_name')}}">
                            @error('first_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input name="last_name" type="text" class="form-control" value="{{old('last_name')}}">
                            @error('last_name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" value="{{old('email')}}">
                            @error('email')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input name="phone_number" type="string" class="form-control">
                            @error('phone_number')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company</label>
                            <select class="form-select" name="company_id" id="company_id">
                                @foreach($companies as $company)
                                <option value="{{$company->id}}" @selected($company->id == $company_id)>
                                    {{$company->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-section>
@endsection
