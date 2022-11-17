<?php

namespace interfaces;

interface Database
{
    public function getPostgresPDO(): \PDO;
}
