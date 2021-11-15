<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Repositories\BaseEloquentRepository;
use Illuminate\Database\Eloquent\Builder;
use Shared\ValueObjects\Paginator;
use ViewSeq\Models\Universe;

/**
 * @property Universe $model
 */
class UniverseRepository extends BaseEloquentRepository
{
    public function getCollectionWithSearchAndPagination(string $search, ?Paginator $paginator): LengthAwarePaginator
    {
        $query = $this->createQuery();

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
