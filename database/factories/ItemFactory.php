<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['link', 'video', 'music', 'article', 'ebook']),
            'description' => $this->faker->text(500),
            'tagline' => $this->faker->text(200),
        ];
    }
}
