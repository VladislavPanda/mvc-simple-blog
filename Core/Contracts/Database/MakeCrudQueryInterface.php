<?php

declare(strict_types=1);

namespace Core\Contracts\Database;

interface MakeCrudQueryInterface
{
    /**
     * @return string
     */
    public function makeSelect(): string;

    /**
     * @return string
     */
    public function makeInsert(): string;

    /**
     * @return string
     */
    public function makeUpdate(): string;

    /**
     * @return string
     */
    public function makeDelete(): string;
}