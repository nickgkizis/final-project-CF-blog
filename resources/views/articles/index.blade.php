@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
<div class="container">
    @if($query)
        <h1>Articles by: {{ $query }}</h3>
        @else
        <h1>Articles</h1>
    @endif
    
    <!-- Search Form -->
    <form method="GET" action="{{ route('articles.index') }}" class="mb-4">
    <input type="text" name="search" class="form-control" placeholder="Search by username..." value="{{ $query ?? '' }}">
    <button type="submit" class="btn btn-primary mt-2">Search by user</button>
    @if($query)
        <a href="{{ route('articles.index') }}" class="btn btn-primary mt-2 ml-2">All articles</a>
    @endif
    
</form>

    @if($query)
        <h3>Articles by: {{ $query }}</h3>
    @endif

    
    @if($articles->isEmpty())
        <p class="no-articles">No articles found.</p>
    @else
        <ul class="article-list">
            @foreach($articles as $article)
                <li class="article-item">
                    <a class="articles" href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    <!-- <p>{{ $article->content }}</p> -->
                    
                    <div>
                        <!-- Delete Button -->
                        @if(auth()->id() === $article->user_id)
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        @else
                            <button class="btn btn-secondary" disabled>Delete</button>
                        </form>
                        @endif

                        <!-- Edit Button -->
                        @if(auth()->id() === $article->user_id)
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                        @else
                            <button class="btn btn-secondary" disabled>Edit</button>
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

    <!-- <a href="{{ url('/') }}" class="btn btn-success mt-4">Back to Main</a> -->
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

    .article-item .articles {
        font-size: 1.2em;
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    } 

    .article-item .articles:hover {
        text-decoration: underline;
    }

    .article-item p {
        color: #555;
        font-size: 1em;
        margin-top: 10px;
    }

    /* General Button Styling */
    .btn {
        font-size: 1em;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Disabled Button Styling */
    button.btn[disabled] {
        background-color: #f0f0f0; /* Light gray */
        color: #888; /* Gray text */
        cursor: not-allowed;
        border: 1px solid #ccc; /* Lighter border */
    }

    /* Regular Enabled Button Styling */
    button.btn.btn-primary {
        background-color: #007bff;
        color: white;
    }

    button.btn.btn-primary:hover {
        background-color: #0056b3;
    }

    button.btn.btn-danger {
        background-color: #dc3545;
        color: white;
    }

    button.btn.btn-danger:hover {
        background-color: #c82333;
    }

    /* Ensure all buttons (disabled and enabled) have the same size */
    button.btn, button.btn[disabled] {
        height: auto;
        line-height: 1.5;
        padding: 8px 15px;
        font-size: 1em;
    }

</style>
@endsection
