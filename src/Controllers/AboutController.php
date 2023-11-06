<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Category;
use Core\Controllers\Controller;

/**
 * @property $categoryService
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->view->make('about', [
            'categories' => $this->categoryService->getAll()
        ])->render();
    }
}