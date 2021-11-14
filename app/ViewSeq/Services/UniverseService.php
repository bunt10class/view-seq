<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Shared\Dto\SearchPaginationDto;
use Shared\Factories\PaginatorFactory;
use Shared\ValueObjects\Paginator;
use ViewSeq\Dto\UniverseDto;
use ViewSeq\Repositories\UniverseRepository;

class UniverseService
{
    protected UniverseRepository $universeRepository;

    public function __construct(UniverseRepository $universeRepository)
    {
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

    public function store(UniverseDto $universeDto): Model
    {
        return $this->universeRepository->save($this->collectUniverseAttributes($universeDto));
}

    public function update(int $universeId, UniverseDto $universeDto): Model
    {
        return $this->universeRepository->update($universeId, $this->collectUniverseAttributes($universeDto));
    }

    protected function collectUniverseAttributes(UniverseDto $universeDto): array
    {
        return [
            'en_name' => $universeDto->getEnName(),
            'ru_name' => $universeDto->getRuName(),
            'creator' => $universeDto->getCreator(),
            'meta' => [
                'description' => $universeDto->getDescription(),
                'birth_date' => $universeDto->getBirthDate(),
                'links' => $universeDto->getLinks(),
            ],
        ];
    }

    public function destroy(int $universeId): void
    {
        $this->universeRepository->delete($universeId);
    }
}
