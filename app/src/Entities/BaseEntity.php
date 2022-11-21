<?php

namespace App\Entities;

use App\Traits\Hydrator;

abstract class BaseEntity
{
    use Hydrator;

    protected string $id;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

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
