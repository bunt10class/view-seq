<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

abstract class MainSeeder extends Seeder
{
    abstract protected function getEntityEloquentClass(): Model;

    abstract protected function seedOneItem(): void;

    public function run()
    {
        $existingItemsNumber = $this->findExistingItemsNumber();

        $itemsNumberForCreating = $this->getRequiredItemsNumber() - $existingItemsNumber;
        if ($itemsNumberForCreating < 1) {
            return;
        }

        $this->seedItems($itemsNumberForCreating);
    }

    protected function findExistingItemsNumber(): int
    {
        $existingItemsNumber = DB::table($this->getEntityEloquentClass()->getTable())->count();
        $this->command->info($existingItemsNumber . ' already exist');

        return $existingItemsNumber;
    }

    protected function getRequiredItemsNumber(): int
    {
        return 10;
    }

    protected function seedItems(int $itemsNumberForCreating): void
    {
        for ($i = 1; $i <= $itemsNumberForCreating; $i++) {
            $this->seedOneItem();
        }
        $this->command->info($itemsNumberForCreating . ' new created');
    }
}
