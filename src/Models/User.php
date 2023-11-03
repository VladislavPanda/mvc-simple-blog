<?php

namespace App\Models;

class User
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