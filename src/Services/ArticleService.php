<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    /**
     * @param int $id
     * @return array
     */
    public function getOne(int $id): array
    {
        return Article::find($id);
    }

    /**
     * @return array|false
     */
    public function getMainPageItems(): array|false
    {
        return Article::select('*')->limit(3)->get();
    }

    /**
     * @param array $categories
     * @return array
     */
    public function getItemsForCategories(array $categories): array
    {
        foreach ($categories as $key => $category) {
            $categoriesArticles = Article::select(['id', 'title', 'content', 'image_path', 'created_at'])
                ->where('category_id', '=', $category['id'])->get();
            $categories[$key]['articles'] = $categoriesArticles;
        }

        return $categories;
    }

    /**
     * @param int $categoryId
     * @return array|false
     */
    public function getItemsForSingleCategory(int $categoryId): array|false
    {
        return Article::select('*')->where('category_id', '=', $categoryId)->get();
    }

    /**
     * @return array|false
     */
    public function getPopularItems(): array|false
    {
        return Article::select(['id', 'title', 'image_path', 'created_at'])->orderBy('likes', 'DESC')->get();
    }
}