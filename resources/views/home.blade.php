@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Button to create a new post -->
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">
                        Create New Post
                    </a>

                    <!-- Display the list of blog posts -->
                    @if ($posts->count())
                        <h3 class="mt-4">Your Blog Posts</h3>
                        <ul class="list-group mt-2">
                            @foreach ($posts as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-4">You have no blog posts yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
