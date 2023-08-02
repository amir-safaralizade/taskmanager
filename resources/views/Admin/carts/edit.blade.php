@extends('layouts.front')

@section('title' , 'Edit Cart')

@section('content')
    <div class="container">

        <div class="create-cart-form mt-5">
            <h2 class="big-title">Edit Cart / {{$cart->title}}</h2>
            <form action="{{ route('carts.update' , $cart->id) }}" class="m-auto" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">title of cart</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title of Cart" name="title" value="{{ $cart->title }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="userid" class="form-label">which user?</label>
                    <select  id="userid" class="form-select @error('user_id') is-invalid @enderror" aria-label="Default select example" name="user_id">
                        @foreach ($users as $user)
                            <option  @if($cart->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
