@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($user->role_id === $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection