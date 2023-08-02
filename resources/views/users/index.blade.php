@extends('layouts.app')

@section('content')
    <h1>All Users</h1><br><hr>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a><br><hr>

    @if($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a><br>
                </li>
            @endforeach
        </ul>
    @endif
@endsection