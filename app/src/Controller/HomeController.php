<?php

namespace App\Controller;

use App\Entity\Article;
use App\Factory\PdoFactory;
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
        $newpost = new Article();

        var_dump($_SESSION["User"]["userId"]);
        $userId = $_SESSION["User"]["userId"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $newpost->setAuthorId($userId);
        $newpost->setTitle($title);
        $newpost->setContent($content);
        var_dump($title, $content);
        $manager = new ArticleManager(new PDOFactory());
        $manager->postArticles($newpost);
        $postManager = new Article(new PDOFactory());
        $posts = $postManager->getAllArticles();
        $allUser = new UserManager(new PDOFactory());
        $users = $allUser->getAllUsers();
        $this->render("home.php", ["posts" => $posts, "users" => $users], "Page d'accueil");
    }
    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */

}
