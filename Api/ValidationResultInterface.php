<?php

namespace Api;

/**
 * Interface ValidationResultInterface
 * @package Api
 */
interface ValidationResultInterface
{
    public function isValid(): bool;

    public function getValidationResults(): array;
}
