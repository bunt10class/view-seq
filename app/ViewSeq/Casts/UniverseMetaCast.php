<?php

declare(strict_types=1);

namespace ViewSeq\Casts;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Shared\Casts\MetaCast;
use Shared\ValueObjects\Datetime;
use ViewSeq\ValueObjects\UniverseMeta;

class UniverseMetaCast extends MetaCast
{
    public function get($model, string $key, $value, array $attributes)
    {
        $value = (array)json_decode($value);

        return new UniverseMeta(
            Arr::get($value, 'description'),
            $this->getBirthDate(Arr::get($value, 'birth_date')),
            (array)Arr::get($value, 'links'),
        );
    }

    /**
     * @param mixed $birthDate
     * @return Datetime|null
     */
    protected function getBirthDate($birthDate): ?Datetime
    {
        if (is_null($birthDate)) {
            $birthDate = null;
        } else {
            $birthDate = new Datetime(new Carbon($birthDate));
        }

        return $birthDate;
    }
}
