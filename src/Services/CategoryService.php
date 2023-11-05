<?php

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

    public function getItemByArticle()
    {

    }
}