<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UniverseFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        $ruFaker = \Faker\Factory::create('ru_RU');
        return [
            'en_name' => $this->faker->company,
            'ru_name' => $ruFaker->company,
            'description' => $this->faker->text(100),
        ];
    }
}
