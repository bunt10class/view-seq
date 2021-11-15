<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Dto\SearchPaginationDto;
use Shared\Factories\PaginatorFactory;
use ViewSeq\Models\Universe;
use ViewSeq\Repositories\UniverseRepository;
use ViewSeq\ValueObjects\ArtItem\UniverseArtItem;

class UniverseService
{
    protected ElasticSearchService $searchService;
    protected UniverseRepository $universeRepository;

    public function __construct(
        ElasticSearchService $searchService,
        UniverseRepository $universeRepository
    ) {
        $this->searchService = $searchService;
        $this->universeRepository = $universeRepository;
    }

    public function index(SearchPaginationDto $searchPaginationDto): LengthAwarePaginator
    {
        $search = $searchPaginationDto->getSearch() ?? '';
        $paginator = PaginatorFactory::makePaginator($searchPaginationDto->getPage(), $searchPaginationDto->getPerPage());

        return $this->universeRepository->getCollectionWithSearchAndPagination($search, $paginator);
    }

    public function show(int $universeId): Model
    {
        return $this->universeRepository->getById($universeId);
    }

    public function store(UniverseArtItem $universeArtItem): Universe
    {
        /** @var Universe $universe */
        $universe = $this->universeRepository->save($universeArtItem->toArrayForEloquent());

//        $this->searchService->create(Universe::class, [
//            'id' => $universe->universe_id,
//            'name' => $universe->name,
//            'creator' => $universe->creator,
//        ]);

        return $universe;
}

    public function update(int $universeId, UniverseArtItem $universeArtItem): Model
    {
        return $this->universeRepository->update($universeId, $universeArtItem->toArrayForEloquent());
    }

    public function destroy(int $universeId): void
    {
        $this->universeRepository->delete($universeId);
    }
}
