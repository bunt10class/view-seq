<?php

declare(strict_types=1);

namespace ViewSeq\Dto;

class UniverseItemStoreDto extends UniverseItemUpdateDto
{
    protected string $artItemType;

    public function __construct(
        ?string $enName,
        ?string $ruName,
        string $artItemType,
        ?string $releasedAt,
        ?string $genre,
        ?array $links,
        ?array $info
    ) {
        parent::__construct($enName, $ruName, $releasedAt, $genre, $links, $info);
        $this->artItemType = $artItemType;
    }
    public function getArtItemType(): string
    {
        return $this->artItemType;
    }
}
