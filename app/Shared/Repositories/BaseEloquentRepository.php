<?php

declare(strict_types=1);

namespace Shared\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Exceptions\ObjectNotFoundException;
use Shared\ValueObjects\Paginator;

abstract class BaseEloquentRepository
{
    protected const CURRENT_PAGE = 1;
    protected const PER_PAGE = 20;

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Model
     * @throws ObjectNotFoundException
     */
    public function getById(int $id): Model
    {
        /** @var Model|null $model */
        $model = $this->createQuery()->find($id);

        if (is_null($model)) {
            throw new ObjectNotFoundException(get_class($model));
        }

        return $model;
    }

    public function save(array $attributes): Model
    {
        $model = $this->model::create($attributes);
        $model->save();

        return $model;
    }

    /**
     * @param int $modelId
     * @param array $attributes
     * @return Model
     * @throws ObjectNotFoundException
     */
    public function update(int $modelId, array $attributes): Model
    {
        $model = $this->getById($modelId);
        $model->update($attributes);

        return $model;
    }

    /**
     * @param int $modelId
     * @throws ObjectNotFoundException
     * @throws Exception
     */
    public function delete(int $modelId): void
    {
        $model = $this->getById($modelId);
        $model->delete();
    }

    protected function createQuery(): Builder
    {
        return $this->model->select('*');
    }

    protected function getWithPaginate(Builder $query, ?Paginator $paginator): LengthAwarePaginator
    {
        return $query->paginate($paginator->getPerPage(), $columns = ['*'], $pageName = 'page', $paginator->getPage());
    }
}
