@extends('layouts.appnn')
    
@section('content')

@if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

    <div class="container">
        <h1>Latest Posts</h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2><br>
                    <p>{{ $post->content }}</p><br>
                    <p>{{ $post->created_at->format('Y-m-d H:i:s') }}</p><hr>
                </li>
            @endforeach
        </ul>
    </div>
@endsection