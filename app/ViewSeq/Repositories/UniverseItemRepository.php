<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Repositories\BaseEloquentRepository;
use Shared\ValueObjects\Paginator;
use ViewSeq\Models\UniverseItem;

/**
 * @property UniverseItem $model
 */
class UniverseItemRepository extends BaseEloquentRepository
{
    public function getUniverseItemsOrderByReleasedAtWithSearchAndPagination(
        int $universeId,
        string $search = '',
        ?Paginator $paginator = null
    ): LengthAwarePaginator {
        $query = $this->createQuery()->where('universe_id', $universeId)->orderBy('released_at');

        if ($search) {
            $query = $this->queryByString($query, $search);
        }

        return $this->getWithPaginate($query, $paginator);
    }

    protected function queryByString(Builder $query, string $search): Builder
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }
}
