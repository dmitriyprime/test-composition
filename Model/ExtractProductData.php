<?php

namespace Model;

use Api\ExtractProductDataInterface;
use Api\ProductInterface;

/**
 */
class ExtractProductData implements ExtractProductDataInterface
{
    /**
     * @inheritDoc
     */
    public function execute(ProductInterface $product): array
    {
        return [
            ProductInterface::SKU => $product->getSku(),
            ProductInterface::NAME => $product->getName(),
            ProductInterface::PRICE => $product->getPrice(),
            ProductInterface::EXTENSION_ATTRIBUTES => $product->getExtensionAttributes(),
        ];
    }
}
