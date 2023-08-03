@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @can('isAdmin')
        <!-- For Administrators: Show all posts -->
        @if($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <ul>
                @foreach($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endcan
    @else
        <!-- For Regular Users: Show only their own posts -->
        @if($userPosts->isEmpty())
            <p>No posts found.</p>
        @else
            <ul>
                @foreach($userPosts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif

    <!-- Add a link to create a new post -->
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
@endsection