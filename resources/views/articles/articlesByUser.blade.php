@extends('layouts.app')

@section('title', 'Articles by ' . $user->name)

@section('content')
<div class="container">
    <h1>Articles by {{ $user->name }}</h1>

    @if($articles->isEmpty())
        <p class="no-articles">No articles found.</p>
    @else
        <ul class="article-list">
            @foreach($articles as $article)
                <li class="article-item">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    
                    <div>
                        <!-- Delete Button -->
                        @if(auth()->id() === $article->user_id)
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Delete</button>
                        </form>
                        @endif

                        <!-- Edit Button -->
                        @if(auth()->id() === $article->user_id)
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Edit</button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Create Article Button -->
    <div class="text-center mt-4">
        <a href="{{ route('articles.create') }}" class="btn btn-success btn-lg">Create New Article</a>
    </div>

    <a href="{{ url('/') }}" class="btn btn-success mt-4">Back to Main</a>
</div>
@endsection

@section('styles')
<style>
    /* Additional Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
        color: #333;
    }

    .container {
        width: 80%;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .article-list {
        list-style-type: none;
        padding: 0;
    }

    .article-item {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        margin-bottom: 15px;
        background-color: #f9f9f9;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .article-item:hover {
        background-color: #f1f1f1;
    }

    .article-item a {
        font-size: 1.2em;
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    }

    .article-item a:hover {
        text-decoration: underline;
    }

    .article-item p {
        color: #555;
        font-size: 1em;
        margin-top: 10px;
    }

    .btn-danger {
        font-size: 1em;
        padding: 8px 15px;
        color: white;
        background-color: #dc3545;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .no-articles {
        text-align: center;
        font-size: 1.2em;
        color: #888;
    }
</style>
@endsection
