<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Core\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::select('*')->limit(3)->get();

        foreach ($articles as $key => $article) {
            $category = Category::select('title')->where('id', '=', $article['category_id'])->get();
            $articles[$key]['category'] = $category[0]['title'];

            $user = User::select(['first_name', 'second_name'])->where('id', '=', $article['user_id'])->get();
            $articles[$key]['author'] = $user[0]['first_name'] . ' ' . $user[0]['second_name'];
        }

        foreach ($categories as $key => $category) {
            $categoriesArticles = Article::select(['id', 'title', 'content', 'image_path', 'created_at'])
                ->where('category_id', '=', $category['id'])->get();
            $categories[$key]['articles'] = $categoriesArticles;
        }

        //$categories = Category::select('title')->where('id', '=', 2)->where('title', '=', 'Категория2')->get();

        return $this->view->make('welcome', [
            'categories' => $categories,
            'articles' => $articles
        ])->render();
    }
}