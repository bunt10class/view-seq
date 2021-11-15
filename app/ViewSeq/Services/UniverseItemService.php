<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Dto\SearchPaginationDto;
use Shared\ValueObjects\Paginator;
use ViewSeq\Repositories\UniverseItemRepository;
use ViewSeq\ValueObjects\ArtItem\UniverseItemArtItem;

class UniverseItemService
{
    protected UniverseItemRepository $universeItemRepository;

    public function __construct(UniverseItemRepository $universeItemRepository)
    {
        $this->universeItemRepository = $universeItemRepository;
    }

    public function index(int $universeId, SearchPaginationDto $searchPaginationDto): LengthAwarePaginator
    {
        $search = $searchPaginationDto->getSearch() ?? '';
        $paginator = new Paginator($searchPaginationDto->getPage(), $searchPaginationDto->getPerPage());

        return $this->universeItemRepository->getUniverseItemsOrderByReleasedAtWithSearchAndPagination(
            $universeId,
            $search,
            $paginator
        );
    }

    public function show(int $universeItemId): Model
    {
        return $this->universeItemRepository->getById($universeItemId);
    }

    public function store(int $universeId, UniverseItemArtItem $universeItemArtItem): Model
    {
        $attributes = $universeItemArtItem->toArrayForStore();
        $attributes['universe_id'] = $universeId;
        return $this->universeItemRepository->save($attributes);
}

    public function update(int $universeId, UniverseItemArtItem $universeItemArtItem): Model
    {
        $attributes = $universeItemArtItem->toArrayForUpdate();
        $attributes['universe_id'] = $universeId;
        return $this->universeItemRepository->update($universeId, $attributes);
    }

    public function destroy(int $universeId): void
    {
        $this->universeItemRepository->delete($universeId);
    }
}
