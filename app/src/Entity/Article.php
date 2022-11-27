<?php

namespace App\Entity;

class Article extends BaseEntity
{
    private ?string $id;
    private string $title;
    private string $content;
    private string $author_id;
    private ?string $datetime;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Article
     */
    public function setId(string $id): Article
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
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
     * @return Article
     */
    public function setContent(string $content): Article
    {
        $this->content = $content;
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
     * @return Article
     */
    public function setAuthorId(string $author_id): Article
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     * @return Article
     */
    public function setDatetime(string $datetime): Article
    {
        $this->datetime = $datetime;
        return $this;
    }
}
