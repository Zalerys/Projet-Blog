<?php

namespace App\Manager;

use App\Entity\Article;

class ArticleManager extends BaseManager
{
    /**
     * @return ResponseToComment[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("SELECT * FROM articles");

        $article = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $article[] = new Article($data);
        }
        var_dump($article);
        return $article;
    }
}
