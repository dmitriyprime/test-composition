<?php

namespace Model;

use Api\ProductInterface;

/**
 * Class ExtractProductData
 * @package Model
 */
class ExtractProductData implements \Api\ExtractProductData
{
    /**
     * @inheritDoc
     */
    public function execute(ProductInterface $product): array
    {
        $arrayFields = [$product->getSku(), $product->getName(), $product->getPrice()];
        return $arrayFields;
    }
}