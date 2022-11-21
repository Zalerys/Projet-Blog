<?php

namespace App\Entities;

class Article extends BaseEntity
{
    private string $author_id;
    private string $title;
    private string $content;
    private string $datetime;

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
    public function setAuthorId(string $author_id): Article
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * Get the title.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the title.
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
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
    public function setContent(string $content): Article
    {
        $this->content = $content;
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
    public function setDatetime(string $datetime): Article
    {
        $this->datetime = $datetime;
        return $this;
    }
}
