<?php

declare(strict_types=1);

namespace ViewSeq\Repositories\ArtItem;

use ViewSeq\Models\ArtItem;
use Wikipedia\Client;

class WikipediaArtItemRepository implements ArtItemRepository
{
    protected Client $wikiClient;

    public function __construct(Client $wikiClient)
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
        // TODO: Implement getById() method.
    }
}
