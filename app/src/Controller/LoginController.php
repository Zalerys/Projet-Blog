<?php

namespace App\Controller;

use App\Route\Route;
use App\Manager\UserManager;
use App\Factory\PDOFactory;
use App\Entity\User;

class LoginController extends AbstractController
{
    #[Route("/login", name: "login", methods: ["GET"])]
    public function login()
    {
        session_start();
        if (isset($_SESSION)) {
            echo 'destroy';
            session_destroy();
        }
        $this->render("login.php", [], "Connexion");
    }

    #[Route("/login", name: "login", methods: ["POST"])]
    public function executeLogin()
    {
        session_start();
        $oneUser = new User();
        $username = $_POST["username"];
        $password = hash("sha1", $_POST["password"]);
        $oneUser->setname($username);
        $oneUser->setPassword($password);
        $manager = new UserManager(new PDOFactory());

        $user = $manager->checkUser($oneUser);
        if (!$user) {
            $this->render("login.php", ['error' => 'le nom d\'utilisateur ou le mot de passe est incorrect'], "mdp or user invalide");
            exit;
        }
        header("Location: /home");
    }
}
