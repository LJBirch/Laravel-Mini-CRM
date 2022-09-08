@extends('components.app')

@section('content')
<x-section>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/companies" class="form" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center mb-3">Create Company</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input name="name" type="text" class="form-control" value="{{old('name')}}">
                            @error('name')
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
                            <label for="website" class="form-label">Website</label>
                            <input name="website" type="url" class="form-control" value="{{old('website')}}">
                            @error('website')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Company Logo</label>
                            <input name="logo" type="file" class="form-control">
                            @error('logo')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
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
