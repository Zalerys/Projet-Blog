<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\ArticleManager;
use App\Manager\UserManager;
use App\Route\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        session_start();
         if (isset($_SESSION["User"])){
            session_destroy();
         }else {
            echo "ok";
            header("Location: /login");
         }

        $manger = new ArticleManager(new PDOFactory());
        $posts = $manger->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "test",
            "machin" => 42
        ], "Tous les posts");
    }

    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/post/{id}/{truc}/{machin}', name: "francis", methods: ["GET"])]
    public function showOne($id, $truc, $machin)
    {
        var_dump($id, $truc);
    }
}
