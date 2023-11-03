<?php

namespace App\Models;

use Core\Database\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected string $table = 'users';

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'id',
        'login',
        'password',
        'first_name',
        'second_name',
        'last_name',
        'avatar_path',
        'created_at',
        'updated_at'
    ];
}