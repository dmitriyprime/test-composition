<?php

namespace Model;

use Api\Exception\CouldNotSaveEntityException;
use Api\Exception\ValidationException;
use Api\ExtractProductDataInterface;
use Api\ProductInterface;
use Api\SaveProductInterface;
use Api\ValidateProductDataInterface;

/**
 * Save product model
 */
class SaveProduct implements SaveProductInterface
{
    /**
     * @var ValidateProductDataInterface
     */
    private $productValidator;

    /**
     * @var ExtractProductDataInterface
     */
    private $extractor;

    /**
     * @var ResourceModel\Product
     */
    private ResourceModel\Product $productResource;

    /**
     * @param ValidateProductDataInterface $productValidator
     * @param ExtractProductDataInterface $extractor
     * @param ResourceModel\Product $productResource
     */
    public function __construct(
        ValidateProductDataInterface  $productValidator,
        ExtractProductDataInterface $extractor,
        \Model\ResourceModel\Product $productResource
    ) {
        $this->productValidator = $productValidator;
        $this->extractor = $extractor;
        $this->productResource = $productResource;
    }

    /**
     * @inheritdoc
     */
    public function execute(ProductInterface $product): void
    {
        $productData = $this->extractor->execute($product);
        $result = $this->productValidator->execute($productData);

        if (!$result->isValid()) {
            $errors = implode('; ', $result->getErrors());
            throw new ValidationException($errors);
        }

        try {
            $this->productResource->save($productData);
        } catch (\Exception $e) {
            throw new CouldNotSaveEntityException($e->getMessage());
        }
    }
}
