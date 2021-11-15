<?php

declare(strict_types=1);

namespace ViewSeq\Casts;

use Illuminate\Support\Arr;
use Shared\Casts\MetaCast;
use ViewSeq\ValueObjects\ArtItem\ArtItemInfo;
use ViewSeq\ValueObjects\ArtItem\ArtItemParticipants;
use ViewSeq\ValueObjects\UniverseItemMeta;

class UniverseItemMetaCast extends MetaCast
{
    public function get($model, string $key, $value, array $attributes)
    {
        $value = (array)json_decode($value);

        $info = ArtItemInfo::make(
            Arr::get($value, 'year'),
            Arr::get($value, 'genre'),
            Arr::get($value, 'description'),
            null,
        );

        return new UniverseItemMeta(
            $info,
            (array)Arr::get($value, 'participants'),
            (array)Arr::get($value, 'links'),
        );
    }
}
