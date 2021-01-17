<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/** */
class base_troops extends Seeder
{
    private $data;

    public function __construct()
    {
        $this->data = [
            ['category'   => 'warrior',
             'lv'         => 1,
             'train_time' => 10,
             'char'       => json_encode(['atk' => 10, 'def' => 5]),
             'cost'       => json_encode(['food' => 500, 'wood' => 200, 'iron' => 0, 'mithril' => 0]),
            ],
            ['category'   => 'warrior',
             'lv'         => 2,
             'train_time' => 15,
             'char'       => json_encode(['atk' => 15, 'def' => 7]),
             'cost'       => json_encode(['food' => 800, 'wood' => 300, 'iron' => 0, 'mithril' => 0]),
            ],
        ];
    }

    public function run()
    {
        foreach ($this->data as $datum) {
            DB::table('base_troops')->insert(
                [
                    'category'   => $datum['category'],
                    'lv'         => $datum['lv'],
                    'train_time' => $datum['train_time'],
                    'char'       => $datum['char'],
                    'cost'       => $datum['cost'],
                ]
            );
        }
    }
}
