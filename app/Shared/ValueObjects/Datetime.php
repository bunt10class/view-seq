<?php

declare(strict_types=1);

namespace Shared\ValueObjects;

use Carbon\Carbon;

class Datetime
{
    private Carbon $value;

    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }

    public function value(): Carbon
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }

    public function toDateTimeString(): string
    {
        return $this->value()->toDateTimeString();
    }

    public function toDateString(): string
    {
        return $this->value()->toDateString();
    }
}
