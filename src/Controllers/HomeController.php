<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Core\Controllers\Controller;

/**
 * @property $categoryService
 */
class HomeController extends Controller
{
    public function index()
    {
        echo '<pre>';
        var_dump($this->categoryService->getAll());
        echo '</pre>';

        $categories = Category::all();
        $articles = Article::select('*')->limit(3)->get();

        foreach ($articles as $key => $article) {
            $category = Category::select('title')->where('id', '=', $article['category_id'])->get();
            $articles[$key]['category'] = $category['title'];

            $user = User::select(['first_name', 'second_name'])->where('id', '=', $article['user_id'])->get();
            $articles[$key]['author'] = $user['first_name'] . ' ' . $user['second_name'];
        }

        foreach ($categories as $key => $category) {
            $categoriesArticles = Article::select(['id', 'title', 'content', 'image_path', 'created_at'])
                ->where('category_id', '=', $category['id'])->get();
            $categories[$key]['articles'] = $categoriesArticles;
        }

        return $this->view->make('welcome', [
            'categories' => $categories,
            'articles' => $articles
        ])->render();
    }
}