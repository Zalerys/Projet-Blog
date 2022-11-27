<?php

namespace App\Manager;

use App\Entity\ResponseToComment;

class ResponseToCommentManager extends BaseManager {

    /**
     * @param ResponseToComment $response_to_comment
     * @return void
     */
    public function postResponseToComment(ResponseToComment $response_to_comment): void
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO responses_to_comment (author_id, comment_id, content)
            VALUES (:author_id, :comment_id, :content)
        EOT);
        $query->bindValue('author_id', $response_to_comment->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('comment_id', $response_to_comment->getArticleId(), \PDO::PARAM_STR);
        $query->bindValue('content', $response_to_comment->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * @param string $comment_id
     * @return array
     */
    public function getResponseToCommentByCommentId(string $comment_id): array
    {
        $query = $this->pdo->prepare(<<<EOT
            SELECT * FROM responses_to_comment 
            WHERE comment_id = :comment_id
            ORDER BY datetime ASC
        EOT);
        $query->bindValue('comment_id', $comment_id, \PDO::PARAM_STR);
        $query->execute();

        $responses_to_comment = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC))
        {
            $responses_to_comment[] = new ResponseToComment($data);
        }

        return $responses_to_comment;
    }

    /**
     * @param ResponseToComment $response_to_comment
     * @return void
     */
    public function editResponseToComment(ResponseToComment $response_to_comment): void
    {
        $query = $this->pdo->prepare(<<<EOT
            UPDATE responses_to_comment
            SET content = :content
            WHERE id = :id
        EOT);
        $query->bindValue('content', $response_to_comment->getContent(),\PDO::PARAM_STR);
        $query->bindValue('id', $response_to_comment->getId(), \PDO::PARAM_STR);
    }

    /**
     * @param string $id
     * @return void
     */
    public function deleteResponseToComment(string $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM responses_to_comment WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
