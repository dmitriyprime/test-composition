<?php

namespace Model;

use Api\ProductInterface;

/**
 * @inheritdoc
 */
class Product implements ProductInterface
{
    /**
     * @var string
     */
    private string $sku;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $price;

    /**
     * @var array|null
     */
    private $extensionAttributes;

    /**
     * @param string $sku
     * @param string $name
     * @param float $price
     * @param array|null $extensionAttributes
     */
    public function __construct(string $sku, string $name, float $price, array $extensionAttributes = null)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @inheritdoc
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return array
     */
    public function getExtensionAttribute(): array
    {
        return $this->extensionAttributes ?: [];
    }
}
