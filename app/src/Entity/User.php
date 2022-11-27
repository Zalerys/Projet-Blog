<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private string $id;
    private string $name;
    private string $password;
    private string $email;
    private string $role_id;
    private string $datetime;
    private ?string $profile_picture;
    private ?string $birthdate;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleId(): string
    {
        return $this->role_id;
    }

    /**
     * @param string $role_id
     * @return User
     */
    public function setRoleId(string $role_id): User
    {
        $this->role_id = $role_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     * @return User
     */
    public function setDatetime(string $datetime): User
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfilePicture(): ?string
    {
        return $this->profile_picture;
    }

    /**
     * @param string|null $profile_picture
     * @return User
     */
    public function setProfilePicture(?string $profile_picture): User
    {
        $this->profile_picture = $profile_picture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    /**
     * @param string|null $birthdate
     * @return User
     */
    public function setBirthdate(?string $birthdate): User
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
