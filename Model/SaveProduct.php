<?php

namespace Model;

use Api\Exception\CouldNotSaveEntityException;
use Api\Exception\ValidationException;
use Api\ProductInterface;
use Api\SaveProductInterface;

/**
 * Class SaveProduct
 * @package Model
 */
class SaveProduct implements SaveProductInterface
{
    /**
     * @var ValidateProductData
     */
    private $productValidator;

    /**
     * @var ExtractProductData
     */
    private $extractor;

    /**
     * @var ResourceModel\Product
     */
    private ResourceModel\Product $productResource;

    /**
     * @param $productValidator
     * @param $extractor
     * @param ResourceModel\Product $productResource
     */
    public function __construct(
        \Api\ValidateProductDataInterface  $productValidator,
        \Api\ExtractProductData $extractor,
        \Model\ResourceModel\Product $productResource
    ) {
        $this->productValidator = $productValidator;
        $this->extractor = $extractor;
        $this->productResource = $productResource;
    }

    /**
     * Converts array into string
     * @param array $array
     * @return string
     */
    public function convertArrayToString(array $array): string
    {
        return implode('; ', $array);
    }

    /**
     * @inheritdoc
     */
    public function execute(ProductInterface $product): void
    {
        $productData = $this->extractor->execute($product);
        $result = $this->productValidator->execute($productData);

        if (!$result->isValid()) {
            $errors = $this->convertArrayToString($result->getValidationResults());
            throw new ValidationException($errors);
        }

        try {
            $this->productResource->save($productData);
        } catch (\Exception $e) {
            throw new CouldNotSaveEntityException($e->getMessage());
        }
    }
}
