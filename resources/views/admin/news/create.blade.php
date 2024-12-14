@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add News</h1>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="headline">Headline:</label>
            <input type="text" name="headline" id="headline" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>
@endsection
