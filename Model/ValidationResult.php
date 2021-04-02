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
     * @var bool
     */
    private bool $isValid = true;

    /**
     * @var array
     */
    private array $validationResults = [];

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * Invalidate result
     */
    public function invalidate() {
        $this->isValid = false;
    }

    /**
     * @param $validationResult
     */
    public function setValidationResults($validationResult)
    {
        $this->validationResults[] = $validationResult;
    }

    /**
     * @return array
     */
    public function getValidationResults(): array
    {
        return $this->validationResults;
    }
}
