<?php

declare(strict_types=1);

namespace ViewSeq\Casts;

use Illuminate\Support\Arr;
use Shared\Casts\MetaCast;
use ViewSeq\ValueObjects\UniverseMeta;

class UniverseMetaCast extends MetaCast
{
    public function get($model, string $key, $value, array $attributes)
    {
        $value = (array)json_decode($value);

        return new UniverseMeta(
            Arr::get($value, 'creator'),
            Arr::get($value, 'year'),
            Arr::get($value, 'description'),
            (array)Arr::get($value, 'links'),
        );
    }
}
