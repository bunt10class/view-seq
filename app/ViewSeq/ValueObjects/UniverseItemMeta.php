<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects;

class UniverseItemMeta
{
    protected string $genre;
    protected array $links;
    protected array $info;

    public function __construct(string $genre, array $links, array $info)
    {
        $this->genre = $genre;
        $this->links = $links;
        $this->info = $info;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function getInfo(): array
    {
        return $this->info;
    }

    public function toArray(): array
    {
        return [
            'genre' => $this->getGenre(),
            'links' => $this->getLinks(),
            'info' => $this->getInfo(),
        ];
    }
}
