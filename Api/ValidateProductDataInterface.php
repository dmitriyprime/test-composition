<?php

namespace Api;

/**
 * Interface ValidateProductDataInterface
 * @package Api
 */
interface ValidateProductDataInterface
{
    /**
     * @param array $productData
     * @return ValidationResultInterface
     */
    public function execute(array $productData): ValidationResultInterface;
}
