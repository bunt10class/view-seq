<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects;

class UniverseMeta
{
    protected ?string $creator;
    protected ?string $description;
    protected ?string $year;
    protected array $links;

    public function __construct(?string $creator, ?string $description, ?string $year, array $links)
    {
        $this->creator = $creator;
        $this->description = $description;
        $this->year = $year;
        $this->links = $links;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function toArray(): array
    {
        return [
            'creator' => $this->getCreator(),
            'year' => $this->getYear(),
            'description' => $this->getDescription(),
            'links' => $this->getLinks(),
        ];
    }
}
