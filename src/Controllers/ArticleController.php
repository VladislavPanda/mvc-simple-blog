<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Core\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        $categories = Category::all();
        $article = Article::find($this->request->get('id'));

        $article['author'] = User::select(['id', 'first_name', 'second_name', 'avatar_path'])
            ->where('id', '=', $article['user_id'])
            ->get()[0];

        $article['categories'] = Category::select(['id', 'title'])
            ->where('id', '=', $article['category_id'])
            ->get();

        $popularArticles = Article::select(['id', 'title', 'image_path', 'created_at'])
            ->orderBy('likes', 'DESC')
            ->get();

        return $this->view->make('single', [
            'categories' => $categories,
            'article' => $article,
            'popularArticles' => $popularArticles
        ])->render();
    }
}