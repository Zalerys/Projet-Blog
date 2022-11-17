<?php

namespace entities;

use interfaces\PasswordProtected;



class User extends Model implements PasswordProtected
{
    private string $role_id;
    private string $name;
    private string $email;
    private string $password;
    private ?string $datetime;
    private ?string $profile_picture;
    private ?string $birthdate;


    public function getRoleId(): string
    {
        return $this->role_id;
    }

    public function setRoleId(string $role_id): User
    {
        $this->role_id = $role_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

        public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function setDatetime(string $datetime): User
    {
        $this->datetime = $datetime;
        return $this;
    }   
    
    public function getProfilePicture(): string
    {
        return $this->profile_picture;
    }

    public function setProfilePicture(string $profile_picture): User
    {
        $this->profile_picture = $profile_picture;
        return $this;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): User
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getHashedPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT); 
        return $this;
    }

    public function matchPassword($password , $hash): bool
    {
        if (password_verify($password,$hash)){
            return true;
        }else {
            return false;
        }
    }
}