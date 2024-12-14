@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Manage News</a>
</div>
@endsection
