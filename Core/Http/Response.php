<?php

declare(strict_types=1);

namespace Core\Http;

class Response
{
    public function send(string $body)
    {
        echo $body;
    }
}