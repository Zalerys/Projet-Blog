<?php

namespace App\Entity;

class ResponseToComment extends BaseEntity
{
    private int $id;
    private string $content;
    private int $comment_id;
    private int $author_id;
    private string $datetime;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ResponseToComment
     */
    public function setId(int $id): ResponseToComment
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
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->comment_id;
    }

    /**
     * @param int $comment_id
     * @return ResponseToComment
     */
    public function setCommentId(int $comment_id): ResponseToComment
    {
        $this->comment_id = $comment_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author_id
     * @return ResponseToComment
     */
    public function setAuthorId(int $author_id): ResponseToComment
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