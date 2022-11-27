<?php

namespace App\Manager;

use App\Entity\ResponseToComment;

class ArticleManager extends BaseManager
{
    /**
     * @return ResponseToComment[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from articles");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new ResponseToComment($data);
        }
        var_dump($users);
        return $users;
    }
}
