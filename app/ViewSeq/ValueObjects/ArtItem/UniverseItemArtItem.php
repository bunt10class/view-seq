<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects\ArtItem;

class UniverseItemArtItem extends ArtItem
{
    public static function make(
        string $name,
        ?string $type,
        ?string $year,
        ?string $genre,
        ?string $description,
        ?string $releasedAt,
        array $participants,
        array $links,
    ): self {
        $info = ArtItemInfo::make($year, $genre, $description, $releasedAt);

        return new self($name, $type, $info, $participants, $links);
    }

    public function toArrayForUpdate(): array
    {
        return [
            'name' => $this->getName(),
            'released_at' => $this->getInfo()->getReleasedAt(),
            'meta' => [
                'year' => $this->getInfo()->getYear(),
                'genre' => $this->getInfo()->getGenre(),
                'description' => $this->getInfo()->getDescription(),
                'participants' => $this->getParticipants(),
                'links' => $this->getLinks(),
            ],
        ];
    }

    public function toArrayForStore(): array
    {
        $attributes = $this->toArrayForUpdate();
        $attributes['art_item_type'] = $this->getType();
        return $attributes;
    }
}
