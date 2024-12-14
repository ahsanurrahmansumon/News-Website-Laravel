@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage News</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Add News</a>
    <div class="row">
        @foreach($news as $newsItem)
            <div class="col-md-4">
                <div class="card mb-4 h-100">
                    @if ($newsItem->photo)
                        <img src="{{ asset('storage/' . $newsItem->photo) }}" class="card-img-top img-fluid" alt="{{ $newsItem->headline }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $newsItem->headline }}</h5>
                        <p class="card-text">{{ Str::limit($newsItem->description, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Category: {{ $newsItem->category }}</small></p>
                        <div class="mt-auto">
                            <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
