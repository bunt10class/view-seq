<?php

declare(strict_types=1);

namespace Shared\Http\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationResource extends ResourceCollection
{
    protected LengthAwarePaginator $paginator;

    public function __construct(LengthAwarePaginator $resource, string $resourceClass)
    {
        if (is_subclass_of($resourceClass, JsonResource::class)) {
            $this->collects = $resourceClass;
        }

        parent::__construct($resource->items());
        $this->paginator = $resource;
    }

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'pagination' => [
                'total' => $this->paginator->total(),
                'page' => $this->paginator->currentPage(),
                'perPage' => $this->paginator->perPage(),
                'lastPage' => $this->paginator->lastPage(),
            ]
        ];
    }
}
