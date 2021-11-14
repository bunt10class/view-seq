<?php

declare(strict_types=1);

namespace ViewSeq\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Shared\Http\Requests\IndexRequest;
use Shared\Http\Resources\PaginationResource;
use Shared\Http\Responses\MessageResponse;
use ViewSeq\Http\Requests\UniverseItemStoreRequest;
use ViewSeq\Http\Requests\UniverseItemUpdateRequest;
use ViewSeq\Http\Resources\UniverseItemResource;
use ViewSeq\Services\UniverseItemService;

class UniverseItemController
{
    protected UniverseItemService $universeItemService;

    public function __construct(UniverseItemService $universeItemService)
    {
        $this->universeItemService = $universeItemService;
    }

    public function index(IndexRequest $request, int $universeId): PaginationResource
    {
        $result = $this->universeItemService->index($universeId, $request->getSearchPaginationDto());

        return PaginationResource::make($result, UniverseItemResource::class);
    }

    public function show(int $universeId, int $universeItemId): UniverseItemResource
    {
        $result = $this->universeItemService->show($universeItemId);

        return UniverseItemResource::make($result);
    }

    public function store(UniverseItemStoreRequest $request, int $universeId): UniverseItemResource
    {
        $result = $this->universeItemService->store($universeId, $request->getUniverseItemDto());

        return UniverseItemResource::make($result);
    }

    public function update(UniverseItemUpdateRequest $request, int $universeId, int $universeItemId): UniverseItemResource
    {
        $result = $this->universeItemService->update($universeId, $request->getUniverseItemUpdateDto());

        return UniverseItemResource::make($result);
    }

    public function destroy(int $universeId, int $universeItemId): JsonResponse
    {
        $this->universeItemService->destroy($universeItemId);

        return MessageResponse::makeOkResponse('Universe item destroyed');
    }
}
