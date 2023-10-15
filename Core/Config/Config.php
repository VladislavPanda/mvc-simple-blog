<?php

declare(strict_types=1);

namespace Core\Config;

use Core\Exceptions\FileNotFoundException;

class Config
{
    /**
     * @param string $filename
     * @param string $key
     * @return string|array
     * @throws FileNotFoundException
     */
    public static function get(string $filename, string $key = ''): string|array
    {
        $file = __DIR__ . '/../../config/' . $filename . '.php';

        if (! file_exists($file)) {
            throw new FileNotFoundException('File ' . $file . ' was not found');
        }

        $config = require $file;

        return $key != ''
            ? $config[$key]
            : $config;
    }
}