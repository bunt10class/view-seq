<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Shared\Repositories\BaseDBRepository;
use Illuminate\Database\Eloquent\Builder;
use Shared\ValueObjects\Paginator;
use ViewSeq\Models\Universe;

/**
 * @property Universe $model
 */
class UniverseRepository extends BaseDBRepository
{
    public function getCollectionWithSearchAndPagination(string $search, ?Paginator $paginator): Collection
    {
        $query = $this->createQuery();

        if ($search) {
            $query = $this->queryByNameFragments($query, $search);
        }

        $query = $this->queryByPaginator($query, $paginator);

        return $query->get();
    }

    protected function queryByNameFragments(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query
                ->where('en_name', 'like', '%' . $search . '%')
                ->orWhere('ru_name', 'like', '%' . $search . '%')
                ->orWhere('creator', 'like', '%' . $search . '%');
        });
    }
}
