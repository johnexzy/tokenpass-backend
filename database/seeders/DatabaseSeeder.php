<?php

namespace Database\Seeders;

use App\Models\Creator;
use App\Models\Gate;
use App\Models\Item;
use App\Models\TokenRequirement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Item::factory(10)->has(Gate::factory())->create();
        Creator::factory()->count(2)->has(Item::factory(4)->has(Gate::factory(3)->has(TokenRequirement::factory(2))))->create();
        // Creator::factory(3)->create();

    }
}
