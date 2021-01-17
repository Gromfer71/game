<?php
namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastleSeeder extends Seeder
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
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '2'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '3'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '4'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '5'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ], '6'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ], '7'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ], '8'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '9'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
            '10'  => [
                'food_up'     => 100,
                'wood_up'     => 100,
                'iron_up'     => 0,
                'mithril_up'  => 0,
                'food_income' => 100,
                'wood_income' => 100,
                'power'      => 1000,
                'time_up'     => 10 * $m,
            ],
        ];
    }

    public function run()
    {
        foreach ($this->data as $key => $build) {
            DB::table('castle')->insert([
                'lv'         => $key,
                'food_up'     => $build['food_up'],
                'wood_up'     => $build['wood_up'],
                'iron_up'     => $build['iron_up'],
                'mithril_up'  => $build['mithril_up'],
                'food_income' => $build['food_income'],
                'wood_income' => $build['wood_income'],
                'power'      => $build['power'],
                'time_up'     => $build['time_up'],

            ]);
        }
    }
}
