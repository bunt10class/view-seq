<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Shared\ValueObjects\Paginator;
use ViewSeq\Models\Universe;
use ViewSeq\Repositories\UniverseRepository;

class UniverseService
{
    protected UniverseRepository $universeRepository;

    public function __construct(UniverseRepository $universeRepository)
    {
        $this->universeRepository = $universeRepository;
    }

    public function index(Paginator $paginator, string $nameFragment): Collection
    {
        return $this->universeRepository->index($paginator, $nameFragment);
    }

    public function show(int $universeId): Model
    {
        return $this->universeRepository->show($universeId);
    }

    public function store(array $attributes): Model
    {
        return $this->universeRepository->store($attributes);
    }

    public function update(int $universeId, array $attributes): Model
    {
        return $this->universeRepository->update($universeId, $attributes);
    }

    public function destroy(int $universeId): void
    {
        $this->universeRepository->destroy($universeId);
    }
}
