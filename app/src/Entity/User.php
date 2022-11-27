<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $name;
    private string $password;
    private string $email;
    private array $roles = [];
    private string $datetime;
    private ?string $profile_picture;
    private ?string $birthdate;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setUserId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

        /**
     * @return int
     */
    public function getUserPassword(): string
    {
        return $this->password;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setUserPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->name;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setUserEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = "ROLE_USER";
        return $roles;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    public function getUserDate(): string
    {
        return $this->datetime;
    }

    public function setUserDate(string $datetime): User
    {
        $this->datetime = $datetime;
        return $this;
    }

    public function getUserProfilPicture(): string
    {
        return $this->profile_picture;
    }

    public function setUserProfilPicutre(string $profile_picture): User
    {
        $this->profile_picture = $profile_picture;
        return $this;
    }

    public function getUserBirthdate(): string
    {
        return $this->birthdate;
    }

    public function setUserBirthdate(string $birthdate): User
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getHashedPassword(): string
    {
        return 'coucou';
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return true;
    }
}
