<?php

declare(strict_types=1);

namespace ViewSeq\Repositories\ArtItem;

use ViewSeq\Models\ArtItem;

/**
 * @property $model
 */
interface ArtItemRepository
{
    public function getCollectionByNameFragment(string $nameFragment): array;

    public function getById(string $artItemId): ArtItem;
}
