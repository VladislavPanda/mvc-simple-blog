<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database\Model;

class Article extends Model
{
    /**
     * @var string
     */
    protected string $table = 'articles';

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'id',
        'user_id',
        'category_id',
        'title',
        'content',
        'likes',
        'image_path',
        'created_at',
        'updated_at'
    ];
}