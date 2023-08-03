@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $role->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
@endsection