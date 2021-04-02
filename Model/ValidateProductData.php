<?php

namespace Model;

use Api\ValidateProductDataInterface;

/**
 * Class ValidateProductData
 * @package Model
 */
class ValidateProductData implements ValidateProductDataInterface
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * ValidateProductData constructor.
     * @param ValidationResult $validationResult
     */
    public function __construct(ValidationResult $validationResult)
    {
        $this->validationResult = $validationResult;
    }

    /**
     * @param $sku
     */
    private function validateSku($sku)
    {
        if(mb_strlen($sku) < 3) {
            $this->validationResult->invalidate();
            $this->validationResult
                ->setValidationResults('SKU field length  must be greater or equal than 3');
        }
    }

    /**
     * @param $name
     */
    public function validateNameNotEmpty($name)
    {
        if(empty($name)) {
            $this->validationResult->invalidate();
            $this->validationResult
                ->setValidationResults('Name field can not be empty');
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function execute($data): ValidationResult
    {
        $this->validateSku($data[0]);
        $this->validateNameNotEmpty($data[1]);
        return $this->validationResult;
    }
}
