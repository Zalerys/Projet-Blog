<?php

namespace App\Entities;

Class ResponseToComment extends BaseEntity
{
    private string $author_id;
    private string $comment_id;
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
    public function setAuthorId(string $author_id): ResponseToComment
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * Get the comment id.
     * @return string
     */
    public function getCommentId(): string
    {
        return $this->comment_id;
    }

    /**
     * Set the comment id.
     * @param string $comment_id
     * @return $this
     */
    public function setCommentId(string $comment_id): ResponseToComment
    {
        $this->comment_id = $comment_id;
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
    public function setDatetime(string $datetime): ResponseToComment
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
    public function setContent(string $content): ResponseToComment
    {
        $this->content = $content;
        return $this;
    }
}
