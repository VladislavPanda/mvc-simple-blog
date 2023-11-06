<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param array $articles
     * @return array
     */
    public function getArticleAuthor(array $articles): array
    {
        foreach ($articles as $key => $article) {
            $user = User::select(['first_name', 'second_name'])->where('id', '=', $article['user_id'])->get();
            $articles[$key]['author'] = $user[0]['first_name'] . ' ' . $user[0]['second_name'];
        }

        return $articles;
    }

    /**
     * @param array $article
     * @return array
     */
    public function getFullArticleAuthor(array $article): array
    {
        return User::select(['id', 'first_name', 'second_name', 'avatar_path'])
            ->where('id', '=', $article['user_id'])
            ->get()[0];
    }
}