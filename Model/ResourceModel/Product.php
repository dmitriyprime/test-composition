<?php

namespace Model\ResourceModel;

/**
 * Save product data to db resource.
 */
class Product
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    /**
     * @param \PDO $connect
     */
    public function __construct(\PDO $connect )
    {
        $this->pdo = $connect;
    }

    /**
     * Save product data into DB
     * @param array $data
     */
    public function save(array $data)
    {
        $sql = "INSERT INTO `product` (`entity_id`, `sku`, `name`, `price`) VALUES (NULL, ?, ?, ?);";
        $sth = $this->pdo->prepare($sql);
        $sth->execute($data);
    }
}
