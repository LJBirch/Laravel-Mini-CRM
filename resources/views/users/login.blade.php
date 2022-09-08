@extends('components.app')

@section('content')
    <x-section>
{{--        --}}{{--  #TODO add CSRF token to header of HTML document.  --}}
{{--        --}}{{--  #TODO add validation error messages  --}}
{{--        <form method="POST" action="/users/authenticate">--}}
{{--            @csrf--}}
{{--            <label for="email">Email:</label>--}}
{{--            <input name="email" type="text">--}}

{{--            <label for="password">Password:</label>--}}
{{--            <input name="password" type="password">--}}
{{--            <button type="submit">Login</button>--}}
{{--        </form>--}}

        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form class="form">
                            <h3 class="text-center mb-3">Login</h3>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                <div class="form-text">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                                @error('password')
                                <div class="form-text">{{$message}}</div>
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
