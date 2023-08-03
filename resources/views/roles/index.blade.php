@extends('layouts.app')

@section('content')
    <h1>All Roles</h1><br><hr>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create New Role</a><br><hr>

    @if($roles->isEmpty())
        <p>No roles found.</p>
    @else
        <ul>
            @foreach($roles as $role)
                <li>
                    <a href="{{ route('roles.show', $role->id) }}">{{ $role->name }}</a><br>
                </li>
            @endforeach
        </ul>
    @endif
@endsection