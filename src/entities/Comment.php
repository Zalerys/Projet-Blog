<?php

namespace entities;

class Comment extends Model 
{
    private string $author_id;
    private string $article_id; 
    private string $datetime;
    private string $content;

    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    public function setAuthorId(string $author_id): Comment
    {
        $this->author_id = $author_id;
        return $this;
    }

    public function getArticleId(): string
    {
        return $this->article_id;
    }

    public function setArticleId(string $article_id): Comment
    {
        $this->article_id = $article_id;
        return $this;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function setDatetime(string $datetime): Comment
    {
        $this->datetime = $datetime;
        return $this;
    }
    
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }
}

