<?php

namespace App\Controller;

use App\Route\Route;
use App\Manager\UserManager;
use App\Factory\PDOFactory;

class LoginController extends AbstractController
{
    #[Route("/login", name: "login", methods: ["GET"])]
    public function login()
    {
        if (isset($_SESSION)) {
            session_destroy();
        }
        $this->render("login.php", [], "Connexion");
    }

    #[Route("/login", name: "login", methods: ["POST"])]
    public function executeLogin()
    {
        $manager = new UserManager(new PDOFactory());
        $user = $manager->getUserByEmail($_POST['email']);
        if (password_verify($_POST['password'], $user->getPassword()))
        {
            session_start();
            $_SESSION['User'] = $user->getId();
            header("Location: /home");
        } else {
            echo 'le mot de passe n\'est pas correct';
        }
    }
}
