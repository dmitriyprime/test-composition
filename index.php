<?php

use Model\ExtractProductData;
use Model\Product as Product;
use Model\SaveProduct;
use Model\ValidateProductData;
use Model\ValidationResult;

/**
 * Create functionality for saving product
 * Create DTO Product
 * Create Resource model for saving data into DB
 * Create service which will save product using Resource model
 */

require_once './Api/Exception/CouldNotSaveEntityException.php';
require_once './Api/Exception/ValidationException.php';
require_once './Api/Exception/CouldNotSaveEntityException.php';
require_once './Api/ProductInterface.php';
require_once './Api/SaveProductInterface.php';
require_once './Model/SaveProduct.php';
require_once './Model/Product.php';
require_once './Model/ResourceModel/Product.php';
require_once './Api/ExtractProductDataInterface.php';
require_once './Model/ExtractProductData.php';
require_once './Api/ValidationResultInterface.php';
require_once './Model/ValidationResult.php';
require_once './Api/ValidateProductDataInterface.php';
require_once './Model/ValidateProductData.php';

$db_config = require_once 'etc/db_config.php';

$product = new Product('005', 'Simple product 1', 25.15);

$pdo = new \PDO($db_config['dsn'] , $db_config['db_user'], $db_config['db_password'] );

$resource = new \Model\ResourceModel\Product($pdo);

$productSave = new SaveProduct(
    new ValidateProductData(),
    new ExtractProductData(),
    $resource
);

$productSave->execute($product);
