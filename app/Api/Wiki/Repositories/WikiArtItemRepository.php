<?php

declare(strict_types=1);

namespace App\Api\Wiki\Repositories;

use App\Api\Wiki\WikiClient;
use ViewSeq\Models\ArtItem;
use ViewSeq\Repositories\ArtItemRepository;

class WikiArtItemRepository implements ArtItemRepository
{
    protected WikiClient $wikiClient;

    public function __construct(WikiClient $wikiClient)
    {
        $this->wikiClient = $wikiClient;
    }

    public function getCollectionByNameFragment(string $nameFragment): array
    {
        $data = $this->wikiClient->getByNameFragment($nameFragment);

        return [];
    }

    public function getById(string $artItemId): ArtItem
    {
        $data = $this->wikiClient->getById($artItemId);

        return new ArtItem();
    }
}
