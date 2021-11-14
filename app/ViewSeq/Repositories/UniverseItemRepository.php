<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Shared\Repositories\BaseEloquentRepository;
use Shared\ValueObjects\Paginator;

/**
 * @property $model
 */
class UniverseItemRepository extends BaseEloquentRepository
{
    public function getUniverseItemsOrderByReleaseDateWithSearchAndPagination(
        int $universeId,
        string $search = '',
        ?Paginator $paginator = null
    ): Collection {
        $query = $this->createQuery()->where('universe_id', $universeId)->orderBy('released_at');

        if ($search) {
            $query = $this->queryByString($query, $search);
        }

        $query = $this->getWithPaginate($query, $paginator);

        return $query->get();
    }

    protected function queryByString(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query
                ->where('en_name', 'like', '%' . $search . '%')
                ->orWhere('ru_name', 'like', '%' . $search . '%');
        });
    }
}
