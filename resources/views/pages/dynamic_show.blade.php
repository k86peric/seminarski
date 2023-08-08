@extends('layouts.app')

@section('content')
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->text_content }}</p>

    @if ($page->featured_image)
        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="img-fluid">
    @endif
@endsection