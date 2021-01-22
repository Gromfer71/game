<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{

    private $data;

    public function __construct()
    {
        $m = 60;
        $h = 60 * 60;
        $d = 60 * 60 * 24;
        $w = 60 * 60 * 24 * 7;
        $this->data = [
            '1'  => [
                'lv' =>'1',
                'category'   => 'castle',
                'food_up'    => 100,
                'wood_up'    => 100,
                'iron_up'    => 0,
                'mithril_up' => 0,
                'properties' => [
                    'food_income' => 1000,
                    'wood_income' => 1000,
                ],
                'power'      => 1000,
                'time_up'    => 10 * $m,
            ],
            '2'  => [
                'lv' => '2',
                'category'   => 'castle',
                'food_up'    => 100,
                'wood_up'    => 100,
                'iron_up'    => 0,
                'mithril_up' => 0,
                'properties' => [
                    'food_income' => 1000,
                    'wood_income' => 1000,
                ],
                'power'      => 1000,
                'time_up'    => 10 * $m,
            ],
            '3'  => [
                'lv' => 1,
                'category'   => 'platz',
                'food_up'    => 100,
                'wood_up'    => 100,
                'iron_up'    => 0,
                'mithril_up' => 0,
                'properties' => [
                    'march_size' => 1000,
                ],
                'power'      => 1000,
                'time_up'    => 10 * $m,
            ],
        ];
    }

    public function run()
    {
        foreach ($this->data as $key => $build) {
            DB::table('buildings')->insert(
                [
                    'category' => $build['category'],
                    'lv'          => $key,
                    'food_up'     => $build['food_up'],
                    'wood_up'     => $build['wood_up'],
                    'iron_up'     => $build['iron_up'],
                    'mithril_up'  => $build['mithril_up'],
                    'properties' => json_encode($build['properties']),
                    'power'       => $build['power'],
                    'time_up'     => $build['time_up'],
                ]
            );
        }
    }
}
