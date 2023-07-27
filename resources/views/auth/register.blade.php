@extends('layouts.app')
@section('title', 'Register')
@section('content')
{{-- Register --}}
<main>
    <form action="" method="post">
        @csrf
        <h1>Register</h1>
        {{-- Name --}}
        <input type="text" placeholder="Name" name="name">
        @error('name')
        <p>* {{$message}}</p>
        @enderror

        {{-- Last Name --}}
        <input type="text" placeholder="Last Name" name="lastname">
        @error('lastname')
        <p>* {{$message}}</p>
        @enderror

        {{-- Gender --}}
        <label>Gender:</label>
        <label>Male:</label>
        <input type="radio" name="gender" value="male">
        <label>Female:</label>
        <input type="radio" name="gender" value="female">
        <label>Other:</label>
        <input type="radio" name="gender" value="Other">
        @error('message')
        <p>* {{$message}}</p>
        @enderror

        {{-- User Name --}}
        <input type="text" placeholder="username" name="username">
        @error('username')
        <p>* {{$message}}</p>
        @enderror

        {{-- Email --}}
        <input type="email" placeholder="email" name="email">
        @error('email')
        <p>* {{$message}}</p>
        @enderror

        {{-- Password --}}
        <input type="password" placeholder="Password" name="password">
        @error('password')
        <p>* {{$message}}</p>
        @enderror

        {{-- Password Verification --}}
        <input type="password" placeholder="Password Confirmation" name="password_confirmation">
        @error('password_confirmation')
        <p>* {{$message}}</p>
        @enderror

        {{-- Send --}}
        <input type="submit" value="Send">
    </form>

    <a href="{{route('login.index')}}">You have an account?</a>
</main>
@endsection