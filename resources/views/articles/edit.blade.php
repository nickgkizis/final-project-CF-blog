<!-- resources/views/articles/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container">
    <h1>Edit Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This tells Laravel that it's an update request -->

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Article</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-4">Back to Articles</a>
</div>
@endsection
