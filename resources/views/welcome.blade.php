@extends('layouts.front')

@section('title' , 'Task Manager')

@section('content')
    <div class="container">
        @if(auth()->user()->role == 'admin')
            <div class="alert alert-success mt-5 text-xl-center shadow">
                Welcme {{auth()->user()->name}}
            </div>
        @else
            <h2 class="big-title">Your Carts & Tasks</h2>
            <div class="carts-partination mt-5">
                @foreach($user->carts as $cart)
                    <div class="cart">
                        <h1>{{$cart->title}}</h1>
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
                                            <p>{{$task->title}}</p>
                                        </div>
                                        <form action="{{route('changetaskstatus' , $task->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            @if($task->status == 'done')
                                                <button type="submit" class="btn btn-success btn-sm">its done</button>
                                            @else
                                                <button type="submit" class="btn btn-primary btn-sm">i do it</button>
                                            @endif
                                        </form>
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
        @endif


    </div>
@endsection
