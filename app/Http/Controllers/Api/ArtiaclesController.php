<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    // indexアクションを定義（indexメソッドの定義と同義)


    public function index()
    {
        $articles = Article::all();
        return $articles;
    }
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return redirect('api/articles');
    }
    public function show($id)
    {
        $article = Article::find($id);
        return $article;
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('api/articles');
    }

}
