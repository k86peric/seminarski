@extends('layouts.app')

@section('content')
    <h1>Create New Role</h1>

    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Role</button>
    </form>
@endsection