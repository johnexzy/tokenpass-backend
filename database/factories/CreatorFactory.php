<?php

namespace Database\Factories;

use App\Models\Creator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Creator>
 */
class CreatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address' => $this->faker->randomElement(['0xf7F8DCf8962872421373FF5cf2C4bB06357b7133', '0x0517417C1f98a61c8d3b1dF1748dEc84Acda21e7'])
        ];
    }
}
