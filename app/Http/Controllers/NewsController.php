<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */

    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->headline = $request->headline;
        $news->description = $request->description;
        $news->category = $request->category;
        if ($request->hasFile('photo')) {
            $news->photo = $request->file('photo')->store('photos', 'public');
        }
        $news->published_at = $request->published_at ?? now();
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified news article.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, News $news)
    {
        $news->headline = $request->headline;
        $news->description = $request->description;
        $news->category = $request->category;
        if ($request->hasFile('photo')) {
            $news->photo = $request->file('photo')->store('photos', 'public');
        }
        $news->published_at = $request->published_at ?? now();
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
