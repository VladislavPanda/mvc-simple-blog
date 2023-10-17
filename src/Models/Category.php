<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database\Model;

class Category extends Model
{
    /**
     * @var string
     */
    protected string $table = 'categories';

    /**
     * @var array|string[] 
     */
    protected array $fields = [
        'id',
        'title',
        'articles_num',
        'created_at',
        'updated_at'
    ];
}