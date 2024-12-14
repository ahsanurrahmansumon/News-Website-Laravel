@extends('layouts.visitor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="card-title">{{ $news->headline }}</h1>
                    <p class="card-text">
                        <small class="text-muted">
                            Published on {{ $news->published_at ? $news->published_at->format('F j, Y \a\t h:i A') : 'N/A' }}
                        </small>
                    </p>
                </div>
                @if ($news->photo)
                    <img src="{{ asset('storage/' . $news->photo) }}" class="card-img-top img-fluid" alt="{{ $news->headline }}">
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $news->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Today News</h2>
        <div class="row">
            @foreach($recentPosts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 h-100">
                    <a href="{{ route('news.show', $post->id) }}">
                        @if ($post->photo)
                            <img src="{{ asset('storage/' . $post->photo) }}" class="card-img-top img-fluid" alt="{{ $post->headline }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->headline }}</h5>
                            <p class="card-text">{{ Str::limit($post->description, 100) }}   Read More </p>
                            </a>
                            <p class="card-text">
                                <small class="text-muted">Published on {{ $post->published_at ? $post->published_at->format('F j, Y \a\t h:i A') : 'N/A' }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
