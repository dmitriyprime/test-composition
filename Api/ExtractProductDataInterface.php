<?php

namespace Api;

/**
 * Extract product data interface
 */
interface ExtractProductDataInterface
{
    /**
     * Convert product data into array.
     *
     * @param ProductInterface $product
     * @return array
     */
    public function execute(ProductInterface $product): array;
}
