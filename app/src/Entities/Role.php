<?php

namespace App\Entities;

class Role extends BaseEntity
{
    private string $name;

    /**
     * Get the name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the name.
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Role
    {
        $this->name = $name;
        return $this;
    }
}
