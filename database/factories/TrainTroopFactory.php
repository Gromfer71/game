<?php

namespace Database\Factories;

use App\Models\TrainTroop;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainTroopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainTroop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \Auth::id(),
        ];
    }
}
