<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private int $id;
    private string $title;
    private string $content;
    private int $author_id;
    private $datetime;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setPostId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */

    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    public function setPostAuthor(int $author_id): Post
    {
        $this->author = $author_id;
        return $this;
    }

    public function getPostAuthor(): int
    {
        return $this->author_id;
    }

    public function setPostTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getPostTitle(): string
    {
        return $this->title;
    }


    public function getPostDate()
    {
        return $this->datetime;
    }


}
