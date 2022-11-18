<?php

namespace App\Interfaces;

interface Database
{
    public function getPostgresPDO(): \PDO;
}
