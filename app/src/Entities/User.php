<?php

include './BaseEntity.php';
include '../Interfaces/PasswordProtected.php';

class User extends BaseEntity
{
    private string $role_id;
    private string $name;
    private string $email;
    private string $password;
    private string $datetime;
    private ?string $profile_picture;
    private ?string $birthdate;

    /**
     * Get the role id.
     * @return string
     */
    public function getRoleId(): string
    {
        return $this->role_id;
    }

    /**
     * Set the role id.
     * @param string $role_id
     * @return $this
     */
    public function setRoleId(string $role_id): User
    {
        $this->role_id = $role_id;
        return $this;
    }

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
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the email adress.
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the email adress.
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the password.
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the password.
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the datetime.
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * Set the datetime.
     * @param string $datetime
     * @return $this
     */
    public function setDatetime(string $datetime): User
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * Get the profile picture url.
     * @return string
     */
    public function getProfilePicture(): string
    {
        return $this->profile_picture;
    }

    /**
     * Set the profile picture url.
     * @param string $profile_picture
     * @return $this
     */
    public function setProfilePicture(string $profile_picture): User
    {
        $this->profile_picture = $profile_picture;
        return $this;
    }

    /**
     * Get the user's birthdate.
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * Set the user's birthdate.
     * @param string $birthdate
     * @return $this
     */
    public function setBirthdate(string $birthdate): User
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * Generate hash for password.
     * @param string $password
     * @return $this
     */
    public function getHashedPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT); 
        return $this;
    }

    /**
     * Check if user's password match with the hash.
     * @param $password
     * @param $hash
     * @return bool
     */
    public function matchPassword($password , $hash): bool
    {
        if (password_verify($password,$hash)){
            return true;
        }else {
            return false;
        }
    }
}
