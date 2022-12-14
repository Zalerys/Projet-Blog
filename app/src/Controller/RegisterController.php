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
        $newUser->setName($_POST["name"]);
        $newUser->setEmail($_POST["email"]);
        $newUser->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
        $newUser->setRoleId('f18796b3-5081-4df7-b940-c3388964f85a');
        $newUser->setProfilePicture(null);
        $newUser->setBirthdate(null);
        $manager = new UserManager(new PDOFactory());
        $manager->postUser($newUser);

        header("Location: /home");
    }
}
