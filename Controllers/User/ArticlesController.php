<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('user_articles', compact('articles'));
    }

    public function show($MaBaiViet)
    {
        $article = Article::with('comments.user')->findOrFail($MaBaiViet);
        return view('user_article_show', compact('article'));
    }
}