<?php

namespace Api;

/**
 * Interface ValidateProductDataInterface
 * @package Api
 */
interface ValidateProductDataInterface
{
    /**
     * @param ProductInterface $product
     * @return ValidationResultInterface
     */
    public function execute(array $product): ValidationResultInterface;
}
