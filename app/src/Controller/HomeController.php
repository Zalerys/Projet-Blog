<?php

namespace App\Controller;

use App\Entity\Article;
use App\Factory\PDOFactory;
use App\Manager\ArticleManager;
use App\Route\Route;
use App\Manager\UserManager;

class HomeController extends AbstractController
{
    #[Route('/home', name: "homepage", methods: ["GET"])]
    public function home()
    {
        session_start();
        if (isset($_SESSION["User"])) {
            $manager = new ArticleManager(new PDOFactory());
            $posts = $manager->getAllArticles();
            $allUser = new UserManager(new PDOFactory());
            $users = $allUser->getAllUsers();
            $this->render("home.php", [
                "posts" => $posts,
                "users" => $users
            ], "connecté");
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home", name: "posting", methods: ["POST"])]
    public function posting()
    {
        session_start();
        $newarticle = new Article();

        var_dump($_SESSION["User"]["userId"]);
        $userId = $_SESSION["User"]["userId"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $newarticle->setAuthorId($userId);
        $newarticle->setTitle($title);
        $newarticle->setContent($content);
        var_dump($title, $content);
        $manager = new ArticleManager(new PDOFactory());
        $manager->postArticle($newarticle);
        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->getAllArticles();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $this->render("home.php", ["posts" => $articles, "users" => $users], "Page d'accueil");
    }
    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */

}
