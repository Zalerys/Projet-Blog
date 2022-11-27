<?php

namespace App\Entity;

class Comment extends BaseEntity
{
    private string $id;
    private string $content;
    private string $author_id;
    private string $article_id;
    private string $datetime;

    /**
     * @return string
     */
    public function getArticleId(): string
    {
        return $this->article_id;
    }

    /**
     * @param string $article_id
     * @return Comment
     */
    public function setArticleId(string $article_id): Comment
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Comment
     */
    public function setId(string $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * @param string $author_id
     * @return Comment
     */
    public function setAuthorId(string $author_id): Comment
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     */
    public function setDatetime($datetime): Comment
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }
}