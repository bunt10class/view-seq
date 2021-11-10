<?php

declare(strict_types=1);

namespace ViewSeq\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Shared\Http\Resources\PaginationResource;
use Shared\Http\Responses\MessageResponse;
use ViewSeq\Http\Requests\Universe\UniverseIndexRequest;
use ViewSeq\Http\Requests\Universe\UniverseStoreRequest;
use ViewSeq\Http\Resources\UniverseResource;
use ViewSeq\Services\UniverseService;

class UniverseController
{
    protected UniverseService $universeService;

    public function __construct(UniverseService $universeService)
    {
        $this->universeService = $universeService;
    }

    public function index(UniverseIndexRequest $request): PaginationResource
    {
        $result = $this->universeService->index($request->getSearchPaginationDto());

        return PaginationResource::make($result, UniverseResource::class);
    }

    public function show(int $universeId): UniverseResource
    {
        $result = $this->universeService->show($universeId);

        return UniverseResource::make($result);
    }

    public function store(UniverseStoreRequest $request): UniverseResource
    {
        $result = $this->universeService->store($request->getUniverseDto());

        return UniverseResource::make($result);
    }

    public function update(UniverseStoreRequest $request, int $universeId): UniverseResource
    {
        $result = $this->universeService->update($universeId, $request->getUniverseDto());

        return UniverseResource::make($result);
    }

    public function destroy(int $universeId): JsonResponse
    {
        $this->universeService->destroy($universeId);

        return MessageResponse::makeOkResponse('Universe destroyed');
    }
}
