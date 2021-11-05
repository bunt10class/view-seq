<?php

declare(strict_types=1);

namespace ViewSeq\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Shared\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Shared\ValueObjects\Paginator;
use ViewSeq\Models\Universe;

/**
 * @property Universe $model
 */
class UniverseRepository extends BaseRepository
{
    public function index(?Paginator $paginator = null, string $nameFragment = ''): Collection
    {
        $query = $this->createQuery();

        if ($nameFragment) {
            $query = $this->queryByNameFragments($query, $nameFragment);
        }

        $query = $this->queryByPaginator($query, $paginator);

        return $query->get();
    }

    protected function queryByNameFragments(Builder $query, string $nameFragment): Builder
    {
        return $query->where(function ($query) use ($nameFragment) {
            $query
                ->where('en_name', 'like', '%' . $nameFragment . '%')
                ->orWhere('ru_name', 'like', '%' . $nameFragment . '%');
        });
    }
}
