<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class base_itemsSeeder extends Seeder
{
    /** @var array[]  */
    private const DATA = [
        ['name' => 'food_chest', 'quality' => 1000, 'can_use' => true],
        ['name' => 'wood_chest', 'quality' => 1000, 'can_use' => true],
        ['name' => 'iron_chest', 'quality' => 1000, 'can_use' => true],
        ['name' => 'mithril_chest', 'quality' => 1000, 'can_use' => true],
        ['name' => 'food_chest', 'quality' => 10000, 'can_use' => true],
        ['name' => 'wood_chest', 'quality' => 10000, 'can_use' => true],
        ['name' => 'iron_chest', 'quality' => 10000, 'can_use' => true],
        ['name' => 'mithril_chest', 'quality' => 10000, 'can_use' => true],
    ];

    public static function getCount()
    {
        return count (self::DATA);
    }


    public function run()
    {
        foreach (self::DATA as $datum) {
            DB::table('base_items')->insert(
                [
                    'name'    => $datum['name'],
                    'quality' => $datum['quality'],
                    'can_use' => $datum['can_use'],
                ]
            );
        }
    }
}
