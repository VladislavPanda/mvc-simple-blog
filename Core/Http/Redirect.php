<?php

declare(strict_types=1);

namespace Core\Http;

class Redirect
{
    /**
     * @param string $url
     * @return void
     */
    public function to(string $url): void
    {
        header("Location: /$url");
        exit;
    }
}