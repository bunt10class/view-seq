<?php

declare(strict_types=1);

namespace Shared\Casts;

use Shared\ValueObjects\Datetime;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class DateTimeCast implements CastsAttributes
{
    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return Datetime|null
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (!isset($attributes[$key])) {
            return null;
        }

        if (is_null($attributes[$key])) {
            return null;
        }

        return new Datetime(new Carbon($attributes[$key]));
    }

    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return [
            $key => $value
        ];
    }
}
