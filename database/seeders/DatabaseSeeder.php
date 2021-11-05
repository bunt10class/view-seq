<?php

namespace Database\Seeders;

use App\ViewSeq\Models\Universe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Universe::factory(10)->create();
    }
}
