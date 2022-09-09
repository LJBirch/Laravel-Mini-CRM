@extends('components.app')

@section('content')
    <x-section>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/users/authenticate" class="form">
                            @csrf
                            <h3 class="text-center mb-3">Login</h3>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input name="email" type="email" class="form-control" value="{{old('email')}}">
                                @error('email')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control"">
                                @error('password')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
@endsection
