<?

namespace entities;

class Article extends model
{
    private string  $id;
    private string $author_id;
    private string $title;
    private string $content;
    private ?string $datetime;
}