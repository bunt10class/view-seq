<?php

declare(strict_types=1);

namespace ViewSeq\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ViewSeq\Models\Universe;
use ViewSeq\Models\UniverseItem;

class UniverseItemResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var UniverseItem $universeItem */
        $universeItem = $this->resource;

        return [
            'en_name' => $universeItem->en_name,
            'ru_name' => $universeItem->ru_name,
            'universe_id' => $universeItem->universe_id,
            'universe' => $this->getUniverse($universeItem->universe),
            'art_item_type' => $universeItem->art_item_type,
            'released_at' => $universeItem->released_at->toDateString(),
            'next_item_id' => $universeItem->next_item_id,
            'genre' => $universeItem->meta->getGenre(),
            'links' => $universeItem->meta->getLinks(),
            'info' => $universeItem->meta->getInfo(),
            'created_at' => $universeItem->created_at->toDateTimeString(),
            'updated_at' => $universeItem->updated_at->toDateTimeString(),
        ];
    }

    protected function getUniverse(Universe $universe): array
    {
        return [
            'en_name' => $universe->en_name,
            'ru_name' => $universe->ru_name,
            'creator' => $universe->creator,
            'description' => $universe->meta->getDescription(),
            'birth_date' => $universe->meta->getBirthDate()->toDateString(),
            'wiki_link' => $universe->meta->getWikiLink(),
            'created_at' => $universe->created_at->toDateTimeString(),
            'updated_at' => $universe->updated_at->toDateTimeString(),
        ];
    }
}
