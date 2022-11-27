<?php

namespace App\Manager;

use App\Entity\Article;

/**
 *
 */
class ArticleManager extends BaseManager
{
    public function postArticle(Article $article): void
    {
        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO articles (author_id, title, content)
            VALUES (:author_id, :title, :content)
        EOT);
        $query->bindValue('author_id', $article->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('title', $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue('content', $article->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }
    
    /**
     * @return Article[]
     */
    public function getAllArticles(): array
    {
        $query = $this->pdo->query('SELECT * FROM articles');

        $article = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $article[] = new Article($data);
        }

        return $article;
    }

    /**
     * @param string $id
     * @return Article
     */
    public function getArticleById(string $id): Article
    {
        $query = $this->pdo->prepare('SELECT * FROM articles WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return new Article($data);
    }

    /**
     * @param Article $article
     * @return void
     */
    public function editArticle(Article $article): void
    {
        $query = $this->pdo->prepare(<<<EOT
            UPDATE articles
            SET title = :title,
                content = :content
            WHERE id = :id;
        EOT);
        $query->bindValue('title', $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue('content', $article->getContent(), \PDO::PARAM_STR);
        $query->bindValue('id', $article->getId(), \PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * @param string $id
     * @return void
     */
    public function deleteArticle(string $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->execute();
    }
}
