<?php

namespace App\Manager;

use App\Entities\Role;

class RolesManager extends BaseManager
{
    /**
     * Return all role from roles table.
     * @return array
     */
    public function getAllRoles(): array
    {
        $query = $this->pdo->query('SELECT * FROM roles');
        $roles = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) $roles[] = new Role($data);

        return $roles;
    }

    /**
     * Return an role with his id.
     * @param string $id
     * @return Role|null
     */
    public function getRoleById(string $id): ?Role
    {
        $query = $this->pdo->prepare('SELECT * FROM roles WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data)
        {
            return new Role($data);
        }

        return null;
    }

    public function postRole(Role $role)
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO roles (name) 
            VALUES (:name)
        EOT);
        $query->bindValue('name', $role->getName(), \PDO::PARAM_STR);
        $query->execute();
    }
}