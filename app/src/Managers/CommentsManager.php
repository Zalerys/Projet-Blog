<?php

namespace App\Manager;

use App\Entities\Comment;

class CommentsManager extends BaseManager
{
    /**
     * Return all comment from comments table.
     * @return array
     */
    public function getAllComments(): array
    {
        $query = $this->pdo->query('SELECT * FROM comments');
        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) $comments[] = new Comment($data);

        return $comments;
    }

    /**
     * Return an comment with his id.
     * @param string $id
     * @return Comment|null
     */
    public function getCommentById(string $id): ?Comment
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data)
        {
            return new Comment($data);
        }

        return null;
    }

    public function postComment(Comment $comment)
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO reponses_to_comment (author_id, article_id, datetime, content) 
            VALUES (:author_id, :article_id :title, :datetime, :content)
        EOT);
        $query->bindValue('author_id', $comment->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('article_id', $comment->getArticleId(), \PDO::PARAM_STR);
        $query->bindValue('datetime', $comment->getDatetime(), \PDO::PARAM_STR);
        $query->bindValue('content', $comment->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }
}