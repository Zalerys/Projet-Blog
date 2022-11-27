<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use App\Factory\PDOFactory;
use App\Route\Route;

class RegisterController extends AbstractController
{
    #[Route("/register", name: "register", methods: ["GET"])]
    public function register()
    {
        $this->render("register.php", [], "Inscription");
    }
    #[Route("/register", name: "register", methods: ["POST"])]

    public function executeAdd()
    {
        $newUser = new User();
        $username = $_POST["name"];
        $email = $_POST["email"];
        $password = hash("sha512", $_POST["password"]);
        $newUser->setName($username);
        $newUser->setEmail($email);
        $newUser->setPassword($password);
        $newUser->setProfilePicture(null);
        $newUser->setBirthdate(null);
        $newUser->setRoleId('test');
        $manager = new UserManager(new PDOFactory());
        $manager->postUser($newUser);

        header("Location: /home");
    }
}