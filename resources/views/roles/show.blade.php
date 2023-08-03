@extends('layouts.app')

@section('content')
    <h1>{{ $role->name }}</h1>
    <p>Description: {{ $role->description }}</p>

    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
    </form>
@endsection