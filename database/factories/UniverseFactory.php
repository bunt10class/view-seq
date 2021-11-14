<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use ViewSeq\Models\Universe;

class UniverseFactory extends Factory
{
    protected $model = Universe::class;

    public function definition(): array
    {
        $ruFaker = Faker::create('ru_RU');
        return [
            'en_name' => $this->faker->company,
            'ru_name' => $ruFaker->company,
            'creator' => $ruFaker->name,
            'meta' => [
                'description' => $ruFaker->text(300),
                'birth_date' => $this->faker->date(),
                'links' => [
                    'wikipedia' => $this->faker->url,
                ],
            ],
        ];
    }
}
