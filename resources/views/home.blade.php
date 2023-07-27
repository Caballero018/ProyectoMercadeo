@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <main>
        @auth
        <h1>Welcome {{auth()->user()->name}}</h1>

        <a href="{{route('login.destroy')}}">Logout</a>
        
        @endauth
        @guest
        <h2>Welcome to *!</h2>
        <nav>
            <a href="{{route('register.index')}}">Sign in</a>
            <a href="{{route('login.index')}}">Login</a>
        </nav>
        @endguest
    </main>
@endsection