<?php

namespace App\Entities;

class Comment extends BaseEntity
{
    private string $author_id;
    private string $article_id; 
    private string $datetime;
    private string $content;

    /**
     * Get the author id.
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * Set the author id.
     * @param string $author_id
     * @return $this
     */
    public function setAuthorId(string $author_id): Comment
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * Get the article id.
     * @return string
     */
    public function getArticleId(): string
    {
        return $this->article_id;
    }

    /**
     * Set the article id.
     * @param string $article_id
     * @return $this
     */
    public function setArticleId(string $article_id): Comment
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * Get the datetime.
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * Set the datetime.
     * @param string $datetime
     * @return $this
     */
    public function setDatetime(string $datetime): Comment
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * Get content.
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set content.
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }
}

