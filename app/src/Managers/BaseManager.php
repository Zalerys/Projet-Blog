<?php

use App\Interfaces\Database;

abstract class BaseManager
{
    protected \PDO $pdo;
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getPostgresPDO();
    }
}