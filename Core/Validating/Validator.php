<?php

declare(strict_types=1);

namespace Core\Validating;

use Core\Contracts\Validation\ValidatorInterface;

class Validator implements ValidatorInterface
{
    public function __construct(
        private readonly array $postData,
        private readonly array $rules,
        private array $fields = []
    ) {
    }

    /**
     * @return array
     */
    public function process(): array
    {
        $errors = [];
        $this->setFields(array_keys($this->rules));

        foreach ($this->rules as $field => $ruleSet) {
            $ruleSetExploded = explode('|', $ruleSet);

            list($originalFieldName, $customizedFieldName) = str_contains($field, '|')
                ? explode('|', $field)
                : [$field, $field];

            foreach ($ruleSetExploded as $rule) {
                $errors = $this->validateField($originalFieldName, $customizedFieldName, $rule, $errors);
            }
        }

        return $errors;
    }

    /**
     * @param string $originalFieldName
     * @param string $customizedFieldName
     * @param string $rule
     * @param array $errors
     * @return array
     */
    private function validateField(
        string $originalFieldName,
        string $customizedFieldName,
        string $rule,
        array  $errors
    ): array
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
                if (strlen($this->postData[$originalFieldName]) < $ruleValue) {
                    $errors[] = "Длина поля $customizedFieldName должна быть не менее $ruleValue символов";
                }
            break;

            case 'max':
                if (strlen($this->postData[$originalFieldName]) > $ruleValue) {
                    $errors[] = "Длина поля $customizedFieldName должна быть не более $ruleValue символов";
                }
            break;

            case '=':
                if ($this->postData[$originalFieldName] != $this->postData[$ruleValue]) {
                    $comparedField = $this->fields[$ruleValue] ?? $ruleValue;
                    $errors[] = "Поля $customizedFieldName и $comparedField не совпадают";
                }
            break;
        }

        return $errors;
    }

    /**
     * @param array $fields
     * @return void
     */
    private function setFields(array $fields): void
    {
        foreach ($fields as $field) {
            if (str_contains($field, '|')) {
                $fieldSetExploded = explode('|', $field);
                $this->fields[$fieldSetExploded[0]] = $fieldSetExploded[1];
            } else {
                $this->fields[] = $field;
            }
        }
    }
}