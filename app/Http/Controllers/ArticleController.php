<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('articles.index', [
            'articles' => Article::with('category')->filter()->paginate(15)
        ]);
    }

    public function show(Article $article) {
        return view('articles.show', [
            'article' => $article
        ]);
    }
}
