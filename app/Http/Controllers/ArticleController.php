<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function index()
    {
        // Fetch all articles
        $articles = Article::all(); // Or use other methods like paginate(), etc.

        // Pass the $articles variable to the view
        return view('articles.index', compact('articles')); // or ['articles' => $articles]
    }
    // Display the specified article
    public function show($id)
    {
        $article = Article::find($id);
        $user = auth()->user(); // Get the logged-in user
        return view('articles.show', compact('article', 'user'));
    }

    // Show the form for creating a new article
    public function create()
    {
        return view('articles.create');
    }

    // Store a newly created article in storage
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create the article and assign the logged-in user
        $article = new Article();
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->user_id = Auth::id(); // Set the user_id to the logged-in user

        // Save the article to the database
        $article->save();

        // Redirect to the articles index page with a success message
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    // Show the form for editing the specified article
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    // Update the specified article in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::find($id);
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    // Remove the specified article from storage
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
