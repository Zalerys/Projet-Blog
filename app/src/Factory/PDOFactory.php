<?php

namespace App\Factory;

use App\Interfaces\Database;

class PdoFactory implements Database
{

    private string $host;
    private string $dbName;
    private string $userName;
    private string $password;

    public function __construct(string $host = "db", string $dbName = "blog", string $userName = "root", string $password = "password")
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getPostgresPDO(): \PDO
    {
        return new \PDO("pgsql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
    }
}
