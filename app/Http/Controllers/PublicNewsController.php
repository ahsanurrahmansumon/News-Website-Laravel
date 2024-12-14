<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PublicNewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $news = News::paginate(9); // Adjust the number of items per page as needed
        $recentPosts = News::orderBy('published_at', 'desc')->take(3)->get(); // Fetch the 3 most recent posts
        return view('news.index', compact('news', 'recentPosts'));
    }

    /**
     * Display the specified news article.
     */
    public function show(News $news)
    {
        $recentPosts = News::orderBy('published_at', 'desc')->take(3)->get(); // Fetch the 3 most recent posts
        return view('news.show', compact('news', 'recentPosts'));
    }

    /**
     * Display a listing of the news filtered by category.
     */
    public function category($category)
    {
        $news = News::where('category', $category)->paginate(9); // Adjust the number of items per page as needed
        $recentPosts = News::orderBy('published_at', 'desc')->take(3)->get(); // Fetch the 3 most recent posts
        return view('news.index', compact('news', 'recentPosts'))->with('category', $category);
    }
}
