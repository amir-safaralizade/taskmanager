@extends('layouts.front')

@section('title' , 'Admin Dashbord')

@section('content')
    <div class="container">
        <div class="alert alert-success mt-5 text-xl-center shadow">
            Welcme {{auth()->user()->name}}
        </div>
    </div>
@endsection
