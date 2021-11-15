<?php

declare(strict_types=1);

namespace ViewSeq\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ViewSeq\Models\Universe;

class UniverseResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Universe $universe */
        $universe = $this->resource;

        $birthDate = $universe->meta->getBirthDate();

        return [
            'universe_id' => $universe->universe_id,
            'en_name' => $universe->en_name,
            'ru_name' => $universe->ru_name,
            'creator' => $universe->creator,
            'description' => $universe->meta->getDescription(),
            'birth_date' => $birthDate ? $birthDate->toDateString() : null,
            'links' => $universe->meta->getLinks(),
            'created_at' => $universe->created_at->toDateTimeString(),
            'updated_at' => $universe->updated_at->toDateTimeString(),
        ];
    }
}
