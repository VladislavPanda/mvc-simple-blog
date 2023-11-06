<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use Core\Controllers\Controller;

/**
 * @property $categoryService
 * @property $articleService
 */
class CategoryController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        $categories = $this->categoryService->getAll();
        $currentCategory = [];

        foreach ($categories as $category) {
            if ($category['id'] == $this->request->get('id')) {
                $currentCategory = $category;
            }
        }

        $currentCategory['articles'] = $this->articleService->getItemsForSingleCategory($currentCategory['id']);

        return $this->view->make('category', [
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'popularArticles' => $this->articleService->getPopularItems()
        ])->render();
    }
}