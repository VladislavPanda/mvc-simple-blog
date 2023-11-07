<?php

declare(strict_types=1);

namespace Core\Validating;

use Core\Contracts\Validation\ValidatorInterface;

class Validator implements ValidatorInterface
{
    public function __construct(
        private readonly array $postData,
        private readonly array $rules
    ) {
    }

    /**
     * @return array
     */
    public function process(): array
    {
        $errors = [];
        foreach ($this->rules as $field => $ruleSet) {
            $ruleSetExploded = explode('|', $ruleSet);

            foreach ($ruleSetExploded as $rule) {
                $errors = $this->validateField($field, $rule, $errors);
            }
        }

        return $errors;
    }

    /**
     * @param string $field
     * @param string $rule
     * @param array $errors
     * @return array
     */
    private function validateField(string $field, string $rule, array $errors): array
    {
        if (str_contains($rule, ':')) {
            list($ruleParam, $ruleValue) = explode(':', $rule);
        } else {
            $ruleParam = '=';
            $ruleValue = substr($rule, 1);
        }

        switch ($ruleParam)
        {
            case 'min':
                if (strlen($this->postData[$field]) < $ruleValue) {
                    $errors[] = "Длина поля $field должна быть не менее $ruleValue символов";
                }
            break;

            case 'max':
                if (strlen($this->postData[$field]) > $ruleValue) {
                    $errors[] = "Длина поля $field должна быть не более $ruleValue символов";
                }
            break;

            case '=':
                if ($this->postData[$field] != $this->postData[$ruleValue]) {
                    $errors[] = "Пароли не совпадают";
                }
            break;
        }

        return $errors;
    }
}