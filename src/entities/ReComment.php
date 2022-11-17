<?php

namespace entities;


Class ReComment extends Model
{
    private string $author_id;
    private string $comment_id;
    private string $datetime;
    private string $content;

    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    public function setAuthorId(string $author_id): ReComment
    {
        $this->author_id = $author_id;
        return $this;
    }

    public function getCommentId(): string
    {
        return $this->comment_id;
    }

    public function setComentId(string $comment_id): ReComment
    {
        $this->comment_id = $comment_id;
        return $this;
    }


    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function setDatetime(string $datetime): Recomment
    {
        $this->datetime = $datetime;
        return $this;
    }
    
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Recomment
    {
        $this->content = $content;
        return $this;
    }

}