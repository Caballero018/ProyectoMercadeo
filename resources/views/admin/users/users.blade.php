@extends('layouts.app')
@section('title', 'users')
@section('content')
    <main>
        @forelse ($users as $user)
            <div style="padding: 20px; margin: 10px;">
                <h2>{{$user->username}}</h2>
                <p>{{$user->name}} {{$user->lastname ?? ''}}</p>
                <p>{{$user->gender}}</p>
                <p>{{$user->email}}</p>
                <a href="{{route('admin.users.edit', $user->id)}}">User edit</a>
            </div>
        @empty
            <h2>No existe ningun usuario</h2>
        @endforelse
    </main>
@endsection