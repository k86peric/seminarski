@extends('layouts.app')

@section('content')
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->text_content }}</p>

    @if ($page->featured_image)
        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="img-fluid">
    @endif

    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('pages.destroy', $page->id) }}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
    </form>
@endsection