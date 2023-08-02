@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    
    @if($user->role)
        <p>Role: {{ $user->role->name }}</p>
    @else
        <p>Role: Not specified</p>
    @endif

    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
    </form>
@endsection