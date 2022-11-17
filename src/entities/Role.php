<?php

namespace entities;

class Role extends Model
{
    private string $name;
    
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Role
    {
        $this->name = $name;
        return $this;
    }
}