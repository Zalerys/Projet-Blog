<?php

namespace App\Interfaces;

interface PasswordProtected 
{
    public function getHashedPassword(string $password);


    public function matchPassword(string $password, string $hash):bool;
}