<?php

namespace App\Manager;

use App\Interfaces\Database;

abstract class BaseManager
{
    /**
     * @var \PDO
     */
    protected \PDO $pdo;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->pdo = $database->getPostgresPDO();
    }
}
