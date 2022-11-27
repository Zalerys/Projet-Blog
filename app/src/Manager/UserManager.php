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

    /**
     * @param string $name
     * @return User[]
     */
    public function getUserByName(string $name): array
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE name = :name");
        $query->bindValue("name", $name, \PDO::PARAM_STR);
        $query->execute();

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    /**
     * @param string $id
     * @return User
     */
    public function getUserById(string $id): User
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return new User($data);
    }

    /**
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email): User
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue('email', $email, \PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return new User($data);
    }

    /**
     * @param User $user
     * @return void
     */
    public function postUser(User $user): void
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
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function checkUser(User $user): ?User
    {
        $checking = $this->pdo->prepare("SELECT * FROM users WHERE email = :email and password = :password");

        $checking->bindValue("email", $user->getEmail(), PDO::PARAM_STR);
        $checking->bindValue("password", $user->getPassword(), PDO::PARAM_STR);
        $checking->execute();
        $userFetch = $checking->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;

        if ($userFetch) {
            return $user;
        }
        return null;
    }
}
