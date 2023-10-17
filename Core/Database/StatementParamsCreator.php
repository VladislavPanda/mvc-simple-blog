<?php

declare(strict_types=1);

namespace Core\Database;

class StatementParamsCreator
{
    public function __construct(
        private readonly array $conditions,
        private readonly string $queryString
    ) {
    }

    /**
     * @return array
     */
    public function process(): array
    {
        $params = [];

        foreach ($this->conditions as $condition) {
            $conditionExploded = explode(' = ', $condition);
            $paramSegment = str_replace($conditionExploded[1], ":$conditionExploded[0]", $condition);

            if (str_contains($this->queryString, $paramSegment)) {
                $params[$conditionExploded[0]] = $conditionExploded[1];
            }
        }

        return $params;
    }
}