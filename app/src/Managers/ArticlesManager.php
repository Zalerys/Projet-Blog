<?php

use App\Entities\Article;

class ArticlesManager extends BaseManager
{
    /**
     * Return all article from articles table.
     * @return array
     */
    public function getAllArticles(): array
    {
        $query = $this->db->query('SELECT * FROM articles');
        $articles = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) $articles[] = new Article($data);

        return $articles;
    }

    /**
     * Return an article with his id.
     * @param string $id
     * @return Article|null
     */
    public function getArticleById(string $id): ?Article
    {
        $query = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query-execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data)
        {
            return new Article($data);
        }

        return null;
    }

    public function postArticle(Article $article)
    {
        $query = $this->db->prepare(<<<EOT
            INSERT INTO articles (author_id, title, datetime, content) 
            VALUES (:author_id, :title, :datetime, :content)
        EOT);
        $query->bindValue('author_id', $article->getAuthorId(), \PDO::PARAM_STR);
        $query->bindValue('title', $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue('datetime', $article->getDatetime(), \PDO::PARAM_STR);
        $query->bindValue('content', $article->getContent(), \PDO::PARAM_STR);
        $query->execute();
    }
}