@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News</h1>
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="headline">Headline:</label>
            <input type="text" name="headline" id="headline" class="form-control" value="{{ $news->headline }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $news->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $news->category }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if ($news->photo)
                <img src="{{ asset('storage/' . $news->photo) }}" alt="Current Photo" class="img-fluid mt-2" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
