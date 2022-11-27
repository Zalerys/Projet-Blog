<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager {

    /**
     * @param Comment $comment
     * @return void
     */
    public function postComment(Comment $comment): void
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO comments (author_id, article_id, content)
            VALUES (:author_id, :article_id, :content)
        EOT);
        $query->bindValue('author_id', $comment->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('article_id', $comment->getArticleId(), \PDO::PARAM_STR);
        $query->bindValue('content', $comment->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * @param string $article_id
     * @return array
     */
    public function getCommentByArticleId(string $article_id): array
    {
        $query = $this->pdo->prepare(<<<EOT
            SELECT * FROM comments 
            WHERE article_id = :article_id
            ORDER BY datetime ASC
        EOT);
        $query->bindValue('article_id', $article_id, \PDO::PARAM_STR);
        $query->execute();

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function editComment(Comment $comment): void
    {
        $query = $this->pdo->prepare(<<<EOT
            UPDATE comments
            SET content = :content
            WHERE id = :id
        EOT);
        $query->bindValue('content', $comment->getContent(),\PDO::PARAM_STR);
        $query->bindValue('id', $comment->getId(), \PDO::PARAM_STR);
    }

    /**
     * @param string $id
     * @return void
     */
    public function deleteComment(string $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
