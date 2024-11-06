<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
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

        .no-articles {
            text-align: center;
            font-size: 1.2em;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Articles</h1>

        @if($articles->isEmpty())
            <p class="no-articles">No articles found.</p>
        @else
            <ul class="article-list">
                @foreach($articles as $article)
                    <li class="article-item">
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        <p>{{ $article->content }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ url('/') }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; font-size: 1.1em; text-decoration: none; border-radius: 4px; text-align: center; transition: background-color 0.3s ease;">
            Back to Main
        </a>

    </div>
    


</body>
</html>
