<?php

namespace Database\Seeders;

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
        $this->call(base_itemsSeeder::class);
        $this->call(base_monstersSeeder::class);
        $this->call(base_troopsSeeder::class);
        $this->call(BuildingSeeder::class);
    }
}
