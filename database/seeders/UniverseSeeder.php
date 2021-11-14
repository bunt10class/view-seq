<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use ViewSeq\Models\Universe;

class UniverseSeeder extends MainSeeder
{
    protected function getEntityEloquentClass(): Model
    {
        return new Universe();
    }

    protected function seedOneItem(): void
    {
        Universe::factory()->create();
    }

    protected function getRequiredItemsNumber(): int
    {
        return 6;
    }
}
