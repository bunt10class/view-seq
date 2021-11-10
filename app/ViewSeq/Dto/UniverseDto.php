<?php

declare(strict_types=1);

namespace ViewSeq\Dto;

class UniverseDto
{
    protected ?string $enName;
    protected ?string $ruName;
    protected ?string $creator;
    protected ?string $description;
    protected ?string $birthDate;
    protected ?string $wikiLink;

    public function __construct(
        ?string $ruName,
        ?string $enName,
        ?string $creator,
        ?string $description,
        ?string $birthDate,
        ?string $wikiLink
    ) {
        $this->enName = $enName;
        $this->ruName = $ruName;
        $this->creator = $creator;
        $this->description = $description;
        $this->birthDate = $birthDate;
        $this->wikiLink = $wikiLink;
    }

    public function getEnName(): ?string
    {
        return $this->enName;
    }

    public function getRuName(): ?string
    {
        return $this->ruName;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function getWikiLink(): ?string
    {
        return $this->wikiLink;
    }
}
