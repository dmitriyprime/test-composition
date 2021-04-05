<?php

declare(strict_types=1);

namespace Api;

/**
 * Product interface
 */
interface ProductInterface
{
    public const SKU = 'sku';
    public const NAME = 'name';
    public const PRICE = 'price';
    public const EXTENSION_ATTRIBUTES = 'extension_attributes';

    /**
     *
     * @return string
     */
    public function getSku(): string;

    /**
     *
     * @return string
     */
    public function getName(): string;

    /**
     *
     * @return float
     */
    public function getPrice(): float;

    /**
     * @return array
     */
    public function getExtensionAttributes(): array;
}
