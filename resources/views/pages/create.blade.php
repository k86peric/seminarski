@extends('layouts.app')

@section('content')
    <h1>Create New Page</h1>

    <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="slug">SLUG</label>
            <textarea name="slug" id="slug" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="text_content">Text Content</label>
            <textarea name="text_content" id="text_content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="featured_image">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Create Page</button>
    </form>
@endsection