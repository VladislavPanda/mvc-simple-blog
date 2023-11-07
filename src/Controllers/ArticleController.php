<?php

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * @property $categoryService
 * @property $articleService
 * @property $userService
 */
class ArticleController extends Controller
{
    public function show()
    {
        $article = $this->articleService->getOne($this->request->get('id'));
        $article['author'] = $this->userService->getFullArticleAuthor($article);
        $article['category'] = $this->categoryService->getItemInfoForFullArticle($article);

        return $this->view->make('single', [
            'categories' => $this->categoryService->getAll(),
            'article' => $article,
            'popularArticles' => $this->articleService->getPopularItems()
        ])->render();
    }

    public function search()
    {
        $title = $this->request->post('title');

        echo $title;
    }
}