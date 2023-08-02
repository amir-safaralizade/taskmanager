@extends('layouts.front')

@section('title' , 'Task Manager')

@section('content')
    <div class="container">
        
        <div class="create-cart-form mt-5">
            <h2 class="big-title">Login</h2>
            <form action="{{route('login')}}" method="post" class="m-auto" >
                @csrf
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror " id="email" name="email" placeholder="youremail@gmail.com" value="{{ old('email') }}"  autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password"  autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <button class="btn btn-success btn-sm w-100">Login</button>
                </div>
                <div>
                    <a href="{{ route('register') }}">register</a>
                </div>

            </form>
        </div>

    </div>
@endsection
