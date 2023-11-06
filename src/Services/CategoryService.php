<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        return Category::all();
    }

    /**
     * @param array $articles
     * @return array
     */
    public function getItemTitleForArticles(array $articles): array
    {
        foreach ($articles as $key => $article) {
            $category = Category::select('title')->where('id', '=', $article['category_id'])->get();
            $articles[$key]['category'] = $category['title'];
        }

        return $articles;
    }

    public function getItemInfoForFullArticle(array $article): array
    {
        return Category::select(['id', 'title'])->where('id', '=', $article['category_id'])->get()[0];
    }
}