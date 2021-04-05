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
     * @param array $data
     * @return ValidationResult
     */
    public function execute(array $data): ValidationResult
    {
        $errors = [];
        $sku = $data['sku'] ?: '';
        if (mb_strlen($sku) < 3) {
            $errors[] = 'SKU field length  must be greater or equal than 3';
        }

        $name = $data['name'] ?: '';

        if (!$name) {
            $errors[] = 'Name field can not be empty';
        }

        return new ValidationResult($errors);
    }
}
