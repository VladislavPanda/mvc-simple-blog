<?php

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * @property $categoryService
 * @property $articleService
 * @property $userService
 */
class HomeController extends Controller
{
    public function index()
    {
        $categories = $this->categoryService->getAll();
        $articles = $this->articleService->getMainPageItems();

        $articles = $this->categoryService->getItemTitleForArticles($articles);
        $articles = $this->userService->getArticleAuthor($articles);

        $categories = $this->articleService->getItemsForCategories($categories);

        return $this->view->make('welcome', [
            'categories' => $categories,
            'articles' => $articles
        ])->render();
    }
}