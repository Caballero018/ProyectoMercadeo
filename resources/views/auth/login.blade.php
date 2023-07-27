@extends('layouts.app')
@section('title', 'Login')
@section('content')
{{-- Login --}}
<main>
    <form action="#" method="post">
        @csrf
        <h1>Login</h1>
        {{-- Username or E-mail --}}
        <input type="text" name="email" placeholder="Username or E-mail">

        {{-- Password --}}
        <input type="password" name="password" placeholder="Password">

        @error('message')
        <p>* {{$message}}</p>
        @enderror
        {{-- Send --}}
        <input type="submit" value="Send">
    </form>
    <a href="{{route('register.index')}}">
        <p>Don't have an account?</p>
    </a>
</main>
@endsection