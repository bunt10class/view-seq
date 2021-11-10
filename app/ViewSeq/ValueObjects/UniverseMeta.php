<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects;

use Shared\ValueObjects\Datetime;

class UniverseMeta
{
    protected string $description;
    protected Datetime $birthDate;
    protected string $wikiLink;

    public function __construct(string $description, Datetime $birthDate, string $wikiLink)
    {
        $this->description = $description;
        $this->birthDate = $birthDate;
        $this->wikiLink = $wikiLink;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBirthDate(): Datetime
    {
        return $this->birthDate;
    }

    public function getWikiLink(): string
    {
        return $this->wikiLink;
    }

    public function toArray(): array
    {
        return [
            'description' => $this->getDescription(),
            'birth_date' => $this->getBirthDate(),
            'wiki_link' => $this->getWikiLink(),
        ];
    }
}
