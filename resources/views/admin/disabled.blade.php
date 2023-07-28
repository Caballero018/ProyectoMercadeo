@extends('layouts.app')
@section('title', 'Disabled')
@section('content')
    <main>
        <h1>Your account is disabled</h1>
        <a href="{{route('login.destroy')}}">Back</a>
    </main>
@endsection
