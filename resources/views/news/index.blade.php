@extends('layouts.visitor')

@section('content')

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



<div class="container">
    <h1 class="mb-4">All News</h1>
    @if(isset($category))
        <h2 class="mb-4">Category: {{ ucfirst($category) }}</h2>
    @endif
    <div class="row">
        @foreach($news as $newsItem)
            <div class="col-md-4">
                <div class="card mb-4 h-100">
                <a href="{{ route('news.show', $newsItem->id) }}">
                    @if ($newsItem->photo)
                        <img src="{{ asset('storage/' . $newsItem->photo) }}" class="card-img-top img-fluid" alt="{{ $newsItem->headline }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $newsItem->headline }}</h5>
                        <p class="card-text">{{ Str::limit($newsItem->description, 100) }}</p>
                        </a>
                        <p class="card-text">
                            <small class="text-muted">Category: {{ $newsItem->category }}</small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Published on {{ $newsItem->published_at ? $newsItem->published_at->format('F j, Y \a\t h:i A') : 'N/A' }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $news->links() }} <!-- Pagination links if needed -->
    </div>
</div>
@endsection
