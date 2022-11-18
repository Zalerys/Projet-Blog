<?php

namespace App\Entities;

abstract class BaseEntity
{
    protected string $id;

    /**
     * Get the id.
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the id.
     * @param string $id
     * @return BaseEntity
     */
    public function setId(string $id): BaseEntity
    {
        $this->id = $id;
        return $this;
    }
}
