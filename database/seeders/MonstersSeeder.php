<?php

namespace Database\Seeders;

use App\Models\Monster;
use Illuminate\Database\Seeder;

class MonstersSeeder extends Seeder
{
    private $data = [
        ['lv' => '1', 'power' => 1000, 'reward' => [1 => 100, 2 => 200]],
        ['lv' => '2', 'power' => 2000, 'reward' => [1 => 100, 2 => 200]],
        ['lv' => '3', 'power' => 3000, 'reward' => [1 => 100, 2 => 200]],
        ['lv' => '4', 'power' => 4000, 'reward' => [1 => 100, 2 => 200]],
        ['lv' => '5', 'power' => 5000, 'reward' => [1 => 100, 2 => 200]],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $datum) {
            $datum['reward'] = json_encode($datum['reward']);
            $monster = new Monster();
            $monster->fill($datum);
            $monster->save();
        }
    }
}
