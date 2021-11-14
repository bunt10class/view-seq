<?php

declare(strict_types=1);

namespace ViewSeq\Dto;

class UniverseItemUpdateDto
{
    protected ?string $enName;
    protected ?string $ruName;
    protected ?string $releasedAt;
    protected ?string $genre;
    protected ?array $links;
    protected ?array $info;

    public function __construct(
        ?string $enName,
        ?string $ruName,
        ?string $releasedAt,
        ?string $genre,
        ?array $links,
        ?array $info
    ) {
        $this->enName = $enName;
        $this->ruName = $ruName;
        $this->releasedAt = $releasedAt;
        $this->genre = $genre;
        $this->links = $links;
        $this->info = $info;
    }

    public function getEnName(): ?string
    {
        return $this->enName;
    }

    public function getRuName(): ?string
    {
        return $this->ruName;
    }

    public function getReleasedAt(): ?string
    {
        return $this->releasedAt;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function getInfo(): ?array
    {
        return $this->info;
    }
}
