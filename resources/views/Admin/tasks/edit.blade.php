@extends('layouts.front')

@section('title' , 'Create a new Cart')

@section('content')
    <div class="container">

        <div class="create-cart-form mt-5">
            <h2 class="big-title">Edit task / {{ $task->title }}</h2>
            <form action="{{ route('tasks.update' , $task->id) }}" class="m-auto" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">title of task</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title of task" name="title" value="{{ $task->title }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-control w-100 @error('content') is-invalid @enderror" id="Description" rows="3" name="content">{{$task->content}}</textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cart_id" class="form-label">which cart?</label>
                    <select  id="cart_id" class="form-select @error('user_id') is-invalid @enderror" aria-label="Default select example" name="cart_id">
                        @foreach ($carts as $cart)
                            <option  @if($task->cart_id == $cart->id) selected @endif value="{{ $cart->id }}">{{ $cart->title }}</option>
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
