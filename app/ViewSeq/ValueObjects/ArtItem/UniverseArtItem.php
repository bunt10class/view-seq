<?php

declare(strict_types=1);

namespace ViewSeq\ValueObjects\ArtItem;

use Illuminate\Support\Arr;
use ViewSeq\Helpers\ArtItemHelper;

class UniverseArtItem extends ArtItem
{
    public function __construct(
        string $name,
        ?string $creators = null,
        ?string $year = null,
        ?string $description = null,
        array $links = []
    ) {
        $info = new ArtItemInfo();
        $info->setYear($year);
        $info->setDescription($description);

        $participants = [$creators];

        parent::__construct($name, ArtItemHelper::TYPE_UNIVERSE, $info, $participants, $links);
    }

    public function toArrayForEloquent(): array
    {
        return [
            'name' => $this->getName(),
            'meta' => [
                'creators' => Arr::get($this->getParticipants(), 'creators'),
                'year' => $this->getInfo()->getYear(),
                'description' => $this->getInfo()->getDescription(),
                'links' => $this->getLinks(),
            ],
        ];
    }
}
