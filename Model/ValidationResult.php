<?php

namespace Model;

use Api\ValidationResultInterface;

/**
 * Class ValidationResult
 * @package Model
 */
class ValidationResult implements ValidationResultInterface
{
    /**
     * @var array
     */
    private array $errors;

    /**
     * @param array $errors
     */
    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
