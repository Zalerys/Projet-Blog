<?

namespace entities;

class Article extends model
{
    private string  $id;
    private string $author_id;
    private string $title;
    private string $content;
    private ?string $datetime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    public function getAuthorid(): int
    {
        return $this->id;
    }

    public function setAuthorid(int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): int
    {
        return $this->id;
    }

    public function setTitle(int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): int
    {
        return $this->id;
    }

    public function setContent(int $id): Article
    {
        $this->id = $id;
        return $this;
    }
    
    public function getDatetime(): int
    {
        return $this->id;
    }

    public function setDatetime(int $id): Article
    {
        $this->id = $id;
        return $this;
    }
}




