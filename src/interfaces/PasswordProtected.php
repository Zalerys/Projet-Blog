<?php

namespace interfaces;

interface PasswordProtected 
{
    public function getHashedPassword(string $password);


    //public function matchPassword():bool;
}