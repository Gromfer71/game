<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class base_monsters extends Seeder
{
    private $data = [
        ['lv' => '1', 'power' => 1000, 'reward' => 1],
        ['lv' => '2', 'power' => 2000, 'reward' => 3],
        ['lv' => '3', 'power' => 3000, 'reward' => 5],
        ['lv' => '4', 'power' => 4000, 'reward' => 7],
        ['lv' => '5', 'power' => 5000, 'reward' => 8],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $datum) {
            DB::table('base_monsters')->insert(
                [
                    'lv'    => $datum['lv'],
                    'power' => $datum['power'],
                    'reward' => $datum['reward'],
                ]
            );
        }
    }
}
