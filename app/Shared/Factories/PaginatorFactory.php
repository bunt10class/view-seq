<?php

declare(strict_types=1);

namespace Shared\Factories;

use Shared\ValueObjects\Paginator;

class PaginatorFactory
{
    public static function makePaginator($page, $perPage): Paginator
    {
        if (is_int($page) && is_int($perPage)) {
            $paginator = new Paginator($page, $perPage);
        } else {
            $paginator = new Paginator();
        }

        return $paginator;
    }
}
