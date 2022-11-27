<?php

namespace App\Manager;

use App\Entity\User;
use PDO;

class UserManager extends BaseManager
{

    /**
     * @return User[]
     */
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("SELECT * FROM users");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function getByUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE name = :name");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function postUser(User $user): ?User
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO users (role_id, email, name, password, profile_picture, birthdate) 
            VALUES (:role_id, :email, :name, :password, :profile_picture, :birthdate)
        EOT);
        session_start();
        $query->bindValue('role_id', $user->getRoleId(), \PDO::PARAM_STR);
        $query->bindValue('email', $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue('name', $user->getName(), \PDO::PARAM_STR);
        $query->bindValue('password', $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue('profile_picture', $user->getProfilePicture(), \PDO::PARAM_STR);
        $query->bindValue('birthdate', $user->getBirthdate(), \PDO::PARAM_STR);
        $query->execute();

        $userFetch = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;

        if ($userFetch) {
            return $user;
        }
        return null;
    }

    public function checkUser(User $user): ?User
    {
        $checking = $this->pdo->prepare("SELECT * FROM users WHERE name = :name and password = :password");

        $checking->bindValue("username", $user->getName(), PDO::PARAM_STR);
        $checking->bindValue("password", $user->getPassword(), PDO::PARAM_STR);
        $checking->execute();
        $userFetch = $checking->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;

        if ($userFetch) {
            return $user;
        }
        return null;
    }
// Commentaire useless
}
