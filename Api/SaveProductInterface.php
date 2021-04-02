<?php

declare(strict_types=1);

namespace Api;

use Api\Exception\CouldNotSaveEntityException;
use Api\Exception\ValidationException;

/**
 * Product save interface
 */
interface SaveProductInterface
{
    /**
     * @param ProductInterface $product
     * @return void
     * @throws CouldNotSaveEntityException
     * @throws ValidationException
     */
    public function execute(ProductInterface $product): void;
}
