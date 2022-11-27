<?php

namespace App\Controller;

use App\Entities\Article;
use App\Factory\PDOFactory;
use App\Manager\ArticleManager;
use App\Manager\UserManager;
use App\Route\Route;

class ArticleController extends AbstractController
{
  #[Route("/home/post/{id}", name: "post", methods: ["GET"])]
    public function post(int $id)
    {
        session_start();
        if (isset($_SESSION["User"])) {
            $allUser = new UserManager(new PDOFactory());
            $users = $allUser->getAllUsers();
            $manager = new ArticleManager(new PDOFactory());
            $onePost = $manager->getArticle($id);
            $this->render("post.php", ["post" => $onePost, "users" => $users]);
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home/post/{id}", name: "modify", methods: ["POST"])]
    public function modifyP(int $id)
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $postModify = new Article();
        $postModify->setTitle($title);
        $postModify->setContent($content);
        $postModify->setId($id);
        $article= new ArticleManager(new PDOFactory());
        $article->modifyPost($postModify);
        header("Location: /home/post/${id}");
    }

    #[Route('/home/delete', name: "delete", methods: ["POST"])]
    public function deletePost()
    {
        $postId = $_POST["postId"];
        $deleteManager = new ArticleManager(new PDOFactory());
        $postDelete = new Article();
        $deleteManager->deletePost($postDelete->setPostId($postId));
        header("Location: /home");
    }
}
