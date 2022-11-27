<?php

namespace App\Entity;

class ResponseToComment extends BaseEntity
{
    private string $id;
    private string $content;
    private string $comment_id;
    private string $author_id;
    private string $datetime;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ResponseToComment
     */
    public function setId(string $id): ResponseToComment
    {
        $this->id = $id;
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
     * @return ResponseToComment
     */
    public function setContent(string $content): ResponseToComment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentId(): string
    {
        return $this->comment_id;
    }

    /**
     * @param string $comment_id
     * @return ResponseToComment
     */
    public function setCommentId(string $comment_id): ResponseToComment
    {
        $this->comment_id = $comment_id;
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
     * @return ResponseToComment
     */
    public function setAuthorId(string $author_id): ResponseToComment
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
     * @return ResponseToComment
     */
    public function setDatetime(string $datetime): ResponseToComment
    {
        $this->datetime = $datetime;
        return $this;
    }
}
