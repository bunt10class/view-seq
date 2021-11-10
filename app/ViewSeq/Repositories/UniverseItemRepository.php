<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Shared\Repositories\BaseDBRepository;
use Shared\ValueObjects\Paginator;

/**
 * @property $model
 */
class UniverseItemRepository extends BaseDBRepository
{
    public function getUniverseItemsOrderByReleaseDateWithPagination(int $universeId, ?Paginator $paginator = null): Collection
    {
        $query = $this->createQuery()->where('universe_id', $universeId)->orderBy('released_at');

        $query = $this->queryByPaginator($query, $paginator);

        return $query->get();
    }
}
