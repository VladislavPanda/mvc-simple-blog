<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use Core\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        $categories = Category::all();
        $currentCategory = '';

        foreach ($categories as $category) {
            if ($category['id'] == $this->request->get('id')) {
                $currentCategory = $category;
            }
        }

        $currentCategory['articles'] = Article::select('*')->where('category_id', '=', $currentCategory['id'])->get();

        return $this->view->make('category', [
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ])->render();
    }
}