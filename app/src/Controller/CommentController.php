<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\CommentManager;
use App\Route\Route;
use App\Entities\Comment;
use App\Manager\UserManager;

class CommentsController extends AbstractController
{

    #[Route("/home/post/{id}", name: "post", methods: ["GET"])]
    public function comments(int $id)
    {

        session_start();
        if (isset($_SESSION["User"])) {
            $allUser = new UserManager(new PDOFactory());
            $users = $allUser->getAllUsers();
            $manager = new CommentManager(new PDOFactory());
            $onComment = $manager->getCommentByArticleId($id);
            $this->render("Comment.php", ["comment" => $onComment, "users" => $users]);
        } else {
            header("Location: /login");
        }
    }

    #[Route("/home/post/comment/{id}", name: "modify", methods: ["POST"])]
    public function modifyComment(int $id)
    {
        $content = $_POST["content"];
        $commentModify = new Comment();
        $commentModify->setContent($content);
        $commentModify->setId($id);
        $comment = new CommentManager(new PDOFactory());
        $comment->editComment($commentModify);
    }

    #[Route('/home/post/comment/delete', name: "delete", methods: ["POST"])]
    public function deleteComments()
    {
        $postId = $_POST["postId"];
        $deleteManager = new CommentManager(new PDOFactory());
        $commentDelete = new Comment();
        $deleteManager->deleteComment($commentDelete->setId($postId));
    }
}
