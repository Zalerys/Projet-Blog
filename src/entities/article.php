<?php

namespace entities;

class Article extends model
{
    private string  $id;
    private string $author_id;
    private string $title;
    private string $content;
    private ?string $datetime;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Article
    {
        $this->id = $id;
        return $this;
    }

    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    public function setAuthorId(string $author_id): Article
    {
        $this->author_id = $author_id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }
    
    public function getDateTime(): string
    {
        return $this->datetime;
    }

    public function setDateTime(string $datetime): Article
    {
        $this->datetime = $datetime;
        return $this;
    }
}




