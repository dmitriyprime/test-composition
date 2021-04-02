<?php

declare(strict_types=1);

namespace Api;

/**
 * Product interface
 */
interface ProductInterface
{
    /**
     * @return string
     */
    public function getSku(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @return array
     */
    public function getExtensionAttribute(): array;
}
