@extends('layouts.front')

@section('title' , 'Task Manager')

@section('content')
    <div class="container">

        <div class="create-cart-form mt-5">
            <h2 class="big-title">Register</h2>
            <form action="{{route('register')}}" method="post" class="m-auto" >
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="Your Name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror " id="email" name="email" placeholder="youremail@gmail.com" value="{{ old('email') }}"  autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"  autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="password Confirmation"  autocomplete="new-password">
                </div>

                <div class="mb-3">
                    <button class="btn btn-success btn-sm w-100">Register</button>
                </div>

            </form>
        </div>

    </div>
@endsection

