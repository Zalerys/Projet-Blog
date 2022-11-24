<?php

namespace App\Manager;

use App\Entities\User;

class UsersManager extends BaseManager
{
    /**
     * Return all user from users table.
     * @return array
     */
    public function getAllUsers(): array
    {
        $query = $this->pdo->query('SELECT * FROM users');
        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) $users[] = new User($data);

        return $users;
    }

    /**
     * Return an user with his id.
     * @param string $id
     * @return User|null
     */
    public function getUserById(string $id): ?User
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data)
        {
            return new User($data);
        }

        return null;
    }

    public function postUser(User $user)
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO users (role_id, email, name, password, datetime, content, profil_picture, birthdate) 
            VALUES (:role_id, :email, :name, :password, :datetime, profil_picture, :birthdate)
        EOT);
        $query->bindValue('role_id', $user->getRoleId(), \PDO::PARAM_STR);
        $query->bindValue('email', $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue('name', $user->getName(), \PDO::PARAM_STR);
        $query->bindValue('password', $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue('datetime', $user->getDatetime(), \PDO::PARAM_STR);
        $query->bindValue('profil_picture', $user->getProfilePicture(), \PDO::PARAM_STR);
        $query->bindValue('birthdate', $user->getBirthdate(), \PDO::PARAM_STR);
        $query->execute();
    }
}