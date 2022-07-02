<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gate>
 */
class GateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contract_address' => $this->faker->randomElement(['0xf7F8DCf8962872421373FF5cf2C4bB06357b7133', '0x0517417C1f98a61c8d3b1dF1748dEc84Acda21e7']),
            'blockchain' => $this->faker->randomElement(['mainnet', 'rinkeby', 'dai', 'bsc', 'polygon']),
            'token_standard' => $this->faker->randomElement(['ERC1155', 'ERC721']),
            'creator' => $this->faker->randomElement(['0xf7F8DCf8962872421373FF5cf2C4bB06357b7133', '0x0517417C1f98a61c8d3b1dF1748dEc84Acda21e7']),
        ];
    }
}
