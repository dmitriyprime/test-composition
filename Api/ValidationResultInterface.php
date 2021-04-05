<?php

namespace Api;

/**
 *
 */
interface ValidationResultInterface
{
    /**
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     *
     * @return array
     */
    public function getErrors(): array;
}
