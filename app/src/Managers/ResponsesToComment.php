<?php

namespace App\Manager;

use App\Entities\ResponseToComment;

class ResponsesToCommentManager extends BaseManager
{
    /**
     * Return all ResponsesToComment from ResponsesToComment table.
     * @return array
     */
    public function getAllResponsesToComment(): array
    {
        $query = $this->pdo->query('SELECT * FROM reponses_to_comment');
        $reponsestocomment = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) $reponsestocomments[] = new ResponseToComment($data);

        return $reponsestocomments;
    }

    /**
     * Return an ResponsesToComment with his id.
     * @param string $id
     * @return ResponsesToComment|null
     */
    public function getResponseToCommentById(string $id): ?ResponseToComment
    {
        $query = $this->pdo->prepare('SELECT * FROM reponses_to_comment WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data)
        {
            return new ResponseToComment($data);
        }

        return null;
    }

    public function postResponseToComment(ResponseToComment $reponse_to_comment)
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO reponses_to_comment(author_id, comment_id, datetime, content) 
            VALUES (:author_id, :comment_id, :title, :datetime, :content)
        EOT);
        $query->bindValue('author_id', $reponse_to_comment->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('comment_id', $reponse_to_comment->getCommentId(), \PDO::PARAM_STR);
        $query->bindValue('datetime', $reponse_to_comment->getDatetime(), \PDO::PARAM_STR);
        $query->bindValue('content', $reponse_to_comment->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }
}