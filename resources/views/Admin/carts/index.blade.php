@extends('layouts.front')

@section('title' , 'all Carts');

@section('content')

    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success mt-5 text-xl-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <h2 class="big-title">Carts</h2>
        <div class="carts-partination mt-5">
            @foreach($carts as $cart)
                <div class="cart">
                    <h1>{{$cart->title}}</h1>
                    <div class="cart-admin-controller">
                        <a href="{{ route('carts.edit' , $cart->id) }}" class="btn btn-primary btn-sm shadow">Edit Cart</a>
                        <form action="{{route('carts.destroy' , $cart->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm shadow">Delete Cart</button>
                        </form>
                        <button href="#" class="btn btn-dark btn-sm shadow">user : {{$cart->user->name}}</button>
                    </div>
                    <div class="tasks">
                        @foreach($cart->tasks as $task)
                        <div class="task-row">
                            <div class="task-head">
                                <div class="task-title">
                                    @if($task->status == 'done')
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    @else
                                    <ion-icon name="radio-button-off-outline"></ion-icon>
                                    @endif
                                    <p>{{$task->title}} </p>
                                </div>
                                <div class="task-btns">
                                    @if($task->status == 'undone')
                                        <button type="submit" class="btn btn-danger btn-sm">undone</button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-sm">done</button>
                                    @endif
                                        <a href="{{ route('tasks.edit' , $task->id) }}" class="btn btn-primary btn-sm">Edit Task</a>
                                        <form action="{{ route('tasks.destroy' , $task->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete Task</button>
                                        </form>
                                </div>

                            </div>

                            <div class="text">
                                <p class="task-content">{{$task->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
