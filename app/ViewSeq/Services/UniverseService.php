<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Shared\Dto\SearchPaginationDto;
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

    public function index(SearchPaginationDto $searchPaginationDto): Collection
    {
        $search = $searchPaginationDto->getSearch() ?? '';
        $paginator = new Paginator($searchPaginationDto->getPage(), $searchPaginationDto->getPerPage());

        return $this->universeRepository->getCollectionWithSearchAndPagination($search, $paginator);
    }

    public function show(int $universeId): Model
    {
        return $this->universeRepository->getById($universeId);
    }

    public function store(UniverseDto $universeDto): Model
    {
        $attributes = [
            'en_name' => $universeDto->getEnName(),
            'ru_name' => $universeDto->getRuName(),
            'creator' => $universeDto->getCreator(),
            'meta' => [
                'description' => $universeDto->getDescription(),
                'birth_date' => $universeDto->getBirthDate(),
                'wiki_link' => $universeDto->getWikiLink(),
            ],
        ];
        return $this->universeRepository->save($attributes);
}

    public function update(int $universeId, UniverseDto $universeDto): Model
    {
        $attributes = [
            'en_name' => $universeDto->getEnName(),
            'ru_name' => $universeDto->getRuName(),
            'creator' => $universeDto->getCreator(),
            'meta' => [
                'description' => $universeDto->getDescription(),
                'birth_date' => $universeDto->getBirthDate(),
                'wiki_link' => $universeDto->getWikiLink(),
            ],
        ];
        return $this->universeRepository->update($universeId, $attributes);
    }

    public function destroy(int $universeId): void
    {
        $this->universeRepository->delete($universeId);
    }
}
