@extends('layouts.app')
@section('title', '')
@section('content')
    <h1>Hola Admin</h1>
    <a href="{{route('admin.users')}}">Users</a>
    
    <a href="{{route('login.destroy')}}">Logout</a>
@endsection