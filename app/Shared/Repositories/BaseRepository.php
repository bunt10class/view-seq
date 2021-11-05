<?php

declare(strict_types=1);

namespace Shared\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Shared\Exceptions\ObjectNotFoundException;
use Shared\ValueObjects\Paginator;

class BaseRepository
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
    public function show(int $id): Model
    {
        /** @var Model|null $model */
        $model = $this->createQuery()->find($id);

        if (is_null($model)) {
            throw new ObjectNotFoundException(get_class($model));
        }

        return $model;
    }

    public function store(array $attributes): Model
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
        $model = $this->show($modelId);
        $model->update($attributes);

        return $model;
    }

    /**
     * @param int $modelId
     * @throws ObjectNotFoundException
     * @throws Exception
     */
    public function destroy(int $modelId): void
    {
        $model = $this->show($modelId);
        $model->delete();
    }

    protected function createQuery(): Builder
    {
        return $this->model->select('*');
    }

    protected function queryByPaginator(Builder $query, ?Paginator $paginator): Builder
    {
        return $query->forPage($paginator->getPage(), $paginator->getPerPage());
    }
}
