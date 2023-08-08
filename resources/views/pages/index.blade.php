@extends('layouts.app')

@section('content')
    <h1>All Pages</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Create New Page</a>

    @if($pages->isEmpty())
        <p>No pages found.</p>
    @else
        <ul>
            @foreach($pages as $page)
                <li>
                    <a href="{{ route('pages.show', ['slug' => $page->slug]) }}">{{ $page->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection