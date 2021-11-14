<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Shared\Dto\SearchPaginationDto;
use Shared\ValueObjects\Paginator;
use ViewSeq\Dto\UniverseItemStoreDto;
use ViewSeq\Dto\UniverseItemUpdateDto;
use ViewSeq\Repositories\UniverseItemRepository;

class UniverseItemService
{
    protected UniverseItemRepository $universeItemRepository;

    public function __construct(UniverseItemRepository $universeItemRepository)
    {
        $this->universeItemRepository = $universeItemRepository;
    }

    public function index(int $universeId, SearchPaginationDto $searchPaginationDto): Collection
    {
        $search = $searchPaginationDto->getSearch() ?? '';
        $paginator = new Paginator($searchPaginationDto->getPage(), $searchPaginationDto->getPerPage());

        return $this->universeItemRepository->getUniverseItemsOrderByReleaseDateWithSearchAndPagination(
            $universeId,
            $search,
            $paginator
        );
    }

    public function show(int $universeItemId): Model
    {
        return $this->universeItemRepository->getById($universeItemId);
    }

    public function store(int $universeId, UniverseItemStoreDto $universeItemDto): Model
    {
        $attributes = [
            'universe_id' => $universeId,
            'en_name' => $universeItemDto->getEnName(),
            'ru_name' => $universeItemDto->getRuName(),
            'art_item_type' => $universeItemDto->getArtItemType(),
            'released_at' => $universeItemDto->getReleasedAt(),
            'next_item_id' => $universeItemDto->getNextItemId(),
            'meta' => [
                'genre' => $universeItemDto->getGenre(),
                'links' => $universeItemDto->getLinks(),
                'info' => $universeItemDto->getInfo(),
            ],
        ];
        return $this->universeItemRepository->save($attributes);
}

    public function update(int $universeId, UniverseItemUpdateDto $universeItemDto): Model
    {
        $attributes = [
            'en_name' => $universeItemDto->getEnName(),
            'ru_name' => $universeItemDto->getRuName(),
            'released_at' => $universeItemDto->getReleasedAt(),
            'next_item_id' => $universeItemDto->getNextItemId(),
            'meta' => [
                'genre' => $universeItemDto->getGenre(),
                'links' => $universeItemDto->getLinks(),
                'info' => $universeItemDto->getInfo(),
            ],
        ];
        return $this->universeItemRepository->update($universeId, $attributes);
    }

    public function destroy(int $universeId): void
    {
        $this->universeItemRepository->delete($universeId);
    }
}
