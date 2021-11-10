<?php

declare(strict_types=1);

namespace ViewSeq\Services;

use ViewSeq\Models\ArtItem;
use ViewSeq\Repositories\ArtItemRepository;

class ArtItemService
{
    protected ArtItemRepository $artItemRepository;

//    public functiontion __construct(UniverseRepository $universeRepository)
//    {
//        $this->universeRepository = $universeRepository;
//    }

    public function index(string $nameFragment)
    {
        $ar =  $this->artItemRepository->getCollectionByNameFragment($nameFragment);

        return $ar;
    }

    public function show(string $artItemId): ArtItem
    {
        return $this->artItemRepository->getById($artItemId);
    }
}
